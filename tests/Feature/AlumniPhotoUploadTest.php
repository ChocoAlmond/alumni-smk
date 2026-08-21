<?php

namespace Tests\Feature;

use App\Models\Alumni;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AlumniPhotoUploadTest extends TestCase
{
    use RefreshDatabase;

    public function test_check_nisn_reports_existing_and_available_values(): void
    {
        $user = User::factory()->create();
        Alumni::create([
            'nisn' => '1234567890',
            'nama_lengkap' => 'Alice',
            'jurusan' => 'Akuntansi',
            'tahun_lulus' => 2024,
            'status' => 'Bekerja',
        ]);

        $this->actingAs($user)
            ->getJson('/alumni/check-nisn?nisn=1234567890')
            ->assertOk()
            ->assertJson(['exists' => true]);

        $this->actingAs($user)
            ->getJson('/alumni/check-nisn?nisn=0987654321')
            ->assertOk()
            ->assertJson(['exists' => false]);
    }

    public function test_creating_alumni_rejects_duplicate_nisn_before_saving(): void
    {
        $user = User::factory()->create();
        Alumni::create([
            'nisn' => '1234567890',
            'nama_lengkap' => 'Alice',
            'jurusan' => 'Akuntansi',
            'tahun_lulus' => 2024,
            'status' => 'Bekerja',
        ]);

        $response = $this->actingAs($user)->from('/alumni/create')->post('/alumni', [
            'nisn' => '1234567890',
            'nama_lengkap' => 'Bob',
            'jurusan' => 'Akuntansi',
            'tahun_lulus' => 2024,
            'status' => 'Bekerja',
        ]);

        $response->assertRedirect('/alumni/create')
            ->assertSessionHasErrors(['nisn' => 'NISN sudah terdaftar. Gunakan NISN lain.']);
        $this->assertSame(1, Alumni::count());
    }

    public function test_creating_alumni_rejects_photo_larger_than_five_megabytes(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->from('/alumni/create')->post('/alumni', [
            'nisn' => '1234567890',
            'nama_lengkap' => 'Alice',
            'foto' => UploadedFile::fake()->create('large.jpg', 5121, 'image/jpeg'),
            'jurusan' => 'Akuntansi',
            'tahun_lulus' => 2024,
            'status' => 'Bekerja',
        ]);

        $response->assertRedirect('/alumni/create')->assertSessionHasErrors('foto');
        $this->assertDatabaseCount('alumnis', 0);
    }

    public function test_creating_alumni_rejects_year_outside_database_range(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->from('/alumni/create')->post('/alumni', [
            'nisn' => '1234567890',
            'nama_lengkap' => 'Alice',
            'jurusan' => 'Akuntansi',
            'tahun_lulus' => 101010011101,
            'status' => 'Bekerja',
        ]);

        $response->assertRedirect('/alumni/create')
            ->assertSessionHasErrors(['tahun_lulus' => 'Tahun lulus harus antara 1901 dan 2155.']);
        $this->assertDatabaseCount('alumnis', 0);
    }

    public function test_updating_alumni_replaces_old_photo_and_strips_public_prefix(): void
    {
        Storage::fake('public');

        $user = User::factory()->create();
        $alumni = Alumni::create([
            'nisn' => '1234567890',
            'nama_lengkap' => 'Alice',
            'foto' => 'public/alumni/old.jpg',
            'jurusan' => 'Teknik Komputer dan Jaringan',
            'tahun_lulus' => 2024,
            'status' => 'Bekerja',
        ]);

        Storage::disk('public')->put('alumni/old.jpg', 'old-content');

        $response = $this
            ->actingAs($user)
            ->from('/alumni/' . $alumni->id . '/edit')
            ->put('/alumni/' . $alumni->id, [
                'nisn' => '1234567890',
                'nama_lengkap' => 'Alice Updated',
                'foto' => UploadedFile::fake()->create('new.jpg', 100, 'image/jpeg'),
                'jurusan' => 'Rekayasa Perangkat Lunak',
                'tahun_lulus' => 2025,
                'status' => 'Kuliah',
            ]);

        $response->assertRedirect('/alumni');
        $this->assertFalse(Storage::disk('public')->exists('alumni/old.jpg'));
        $this->assertStringNotContainsString('public/', $alumni->fresh()->foto);
    }
}
