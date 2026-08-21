@extends('layouts.app')

@section('content')
    <h2 class="mb-4">{{ __('Edit Data Alumni') }}</h2>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="fw-bold fs-4 m-0">Form Edit Data Alumni</h3>
                    <a href="{{ route('alumni.index') }}" class="btn btn-secondary btn-sm">&larr; Kembali</a>
                </div>

                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('alumni.update', $alumni->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label fw-semibold">NISN</label>
                        <input type="text" name="nisn" class="form-control" value="{{ old('nisn', $alumni->nisn) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" class="form-control" value="{{ old('nama_lengkap', $alumni->nama_lengkap) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Foto Alumni</label>
                        @if($alumni->foto)
                            <div class="mb-2">
                                @if(!empty($fotoExists) && $fotoExists)
                                    <img src="{{ asset('storage/' . $alumni->foto) }}" width="100" class="img-thumbnail rounded">
                                    <div class="small text-muted mt-1">File: {{ $alumni->foto }}</div>
                                    <div class="small text-muted">Exists in public/storage: yes</div>
                                @else
                                    <div class="small text-muted">File: {{ $alumni->foto }}</div>
                                    <div class="small text-danger">Exists in public/storage: no — file tidak ditemukan, karenanya tidak ditampilkan.</div>
                                @endif
                                <small class="text-muted d-block mt-1">*Foto saat ini</small>
                            </div>
                        @endif
                        <input type="file" name="foto" class="form-control" accept="image/*">
                        <small class="text-muted">Biarkan kosong jika tidak ingin mengubah foto.</small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Jurusan</label>
                        <select name="jurusan" class="form-select" required>
                            <option value="">-- Pilih Jurusan --</option>
                            <option value="Teknik Komputer dan Jaringan" {{ old('jurusan', $alumni->jurusan) == 'Teknik Komputer dan Jaringan' ? 'selected' : '' }}>Teknik Komputer dan Jaringan</option>
                            <option value="Rekayasa Perangkat Lunak" {{ old('jurusan', $alumni->jurusan) == 'Rekayasa Perangkat Lunak' ? 'selected' : '' }}>Rekayasa Perangkat Lunak</option>
                            <option value="Akuntansi" {{ old('jurusan', $alumni->jurusan) == 'Akuntansi' ? 'selected' : '' }}>Akuntansi</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tahun Lulus</label>
                        <input type="number" name="tahun_lulus" class="form-control" value="{{ old('tahun_lulus', $alumni->tahun_lulus) }}" min="1901" max="2155" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Status Saat Ini</label>
                        <select name="status" class="form-select" required>
                            <option value="">-- Pilih Status --</option>
                            <option value="Bekerja" {{ old('status', $alumni->status) == 'Bekerja' ? 'selected' : '' }}>Bekerja</option>
                            <option value="Kuliah" {{ old('status', $alumni->status) == 'Kuliah' ? 'selected' : '' }}>Kuliah</option>
                            <option value="Wirausaha" {{ old('status', $alumni->status) == 'Wirausaha' ? 'selected' : '' }}>Wirausaha</option>
                            <option value="Mencari Kerja" {{ old('status', $alumni->status) == 'Mencari Kerja' ? 'selected' : '' }}>Mencari Kerja</option>
                        </select>
                    </div>

                    <div class="d-flex gap-2 pt-2">
                        <button type="submit" class="btn btn-primary">Perbarui Data</button>
                        <a href="{{ route('alumni.index') }}" class="btn btn-light border">Batal</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection