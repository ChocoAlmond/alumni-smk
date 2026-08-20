<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Data Alumni') }}
        </h2>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="fw-bold fs-4 m-0">Form Tambah Data Alumni</h3>
                    <a href="{{ route('alumni.index') }}" class="btn btn-secondary btn-sm">&larr; Kembali</a>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('alumni.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-semibold">NISN</label>
                        <input type="text" name="nisn" class="form-control" value="{{ old('nisn') }}" placeholder="Masukkan NISN" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" class="form-control" value="{{ old('nama_lengkap') }}" placeholder="Masukkan Nama Lengkap" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Foto Alumni</label>
                        <input type="file" name="foto" class="form-control" accept="image/*">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Jurusan</label>
                        <select name="jurusan" class="form-select" required>
                            <option value="">-- Pilih Jurusan --</option>
                            <option value="Teknik Komputer dan Jaringan" {{ old('jurusan') == 'Teknik Komputer dan Jaringan' ? 'selected' : '' }}>Teknik Komputer dan Jaringan</option>
                            <option value="Rekayasa Perangkat Lunak" {{ old('jurusan') == 'Rekayasa Perangkat Lunak' ? 'selected' : '' }}>Rekayasa Perangkat Lunak</option>
                            <option value="Akuntansi" {{ old('jurusan') == 'Akuntansi' ? 'selected' : '' }}>Akuntansi</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tahun Lulus</label>
                        <input type="number" name="tahun_lulus" class="form-control" value="{{ old('tahun_lulus') }}" placeholder="Contoh: 2024" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Status Saat Ini</label>
                        <select name="status" class="form-select" required>
                            <option value="">-- Pilih Status --</option>
                            <option value="Bekerja" {{ old('status') == 'Bekerja' ? 'selected' : '' }}>Bekerja</option>
                            <option value="Kuliah" {{ old('status') == 'Kuliah' ? 'selected' : '' }}>Kuliah</option>
                            <option value="Wirausaha" {{ old('status') == 'Wirausaha' ? 'selected' : '' }}>Wirausaha</option>
                            <option value="Mencari Kerja" {{ old('status') == 'Mencari Kerja' ? 'selected' : '' }}>Mencari Kerja</option>
                        </select>
                    </div>

                    <div class="d-flex gap-2 pt-2">
                        <button type="submit" class="btn btn-success">Simpan Data</button>
                        <a href="{{ route('alumni.index') }}" class="btn btn-light border">Batal</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>