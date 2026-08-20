<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up(): void
{
 Schema::create('alumnis', function (Blueprint $table) {
 $table->id();
 $table->string('nisn')->unique();
 $table->string('nama_lengkap');
 $table->string('jurusan');
 $table->year('tahun_lulus');
 $table->string('status')->default('Bekerja'); // Bekerja, Kuliah, Wirausaha, Mencari Kerja
 $table->string('nama_instansi_atau_kampus')->nullable();
 $table->string('no_hp')->nullable();
 $table->timestamps();
 });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumnis');
    }
};
