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
