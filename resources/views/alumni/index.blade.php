<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Alumni') }}
        </h2>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <div class="container-fluid p-0">
                        <h2 class="mb-4">Sistem Pendataan Alumni SMK</h2>
                        
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        
                        <div class="mb-3">
                            <a href="{{ route('alumni.create') }}" class="btn btn-primary">+ Tambah Data Alumni</a>
                            <a href="{{ route('alumni.export_pdf') }}" class="btn btn-danger" target="_blank">Cetak PDF</a>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <form action="{{ route('alumni.index') }}" method="GET">
                                    <div class="input-group">
                                        <input type="text" name="search" class="form-control" placeholder="Cari NISN atau Nama Alumni..." value="{{ request('search') }}">
                                        <button class="btn btn-secondary" type="submit">Cari</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="card shadow-sm">
                            <div class="card-body">
                                <table class="table table-bordered m-0 align-middle">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>Foto</th>
                                            <th>NISN</th>
                                            <th>Nama Lengkap</th>
                                            <th>Jurusan</th>
                                            <th>Tahun Lulus</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($alumnis as $index => $alumni)
                                        <tr>
                                            <td>{{ $alumnis->firstItem() + $index }}</td>
                                            <td class="text-center">
                                                @if($alumni->foto)
                                                    <img src="{{ asset('storage/' . $alumni->foto) }}" width="70" height="70" class="rounded-circle" style="object-fit: cover;">
                                                @else
                                                    <span class="text-muted">Tidak ada foto</span>
                                                @endif
                                            </td>
                                            <td>{{ $alumni->nisn }}</td>
                                            <td>{{ $alumni->nama_lengkap }}</td>
                                            <td>{{ $alumni->jurusan }}</td>
                                            <td>{{ $alumni->tahun_lulus }}</td>
                                            <td>{{ $alumni->status }}</td>
                                            <td>
                                                <form action="{{ route('alumni.destroy', $alumni->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data alumni ini?');">
                                                    <a href="{{ route('alumni.edit', $alumni->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="8" class="text-center">Belum ada data alumni.</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                
                                <div class="mt-3">
                                    {{ $alumnis->withQueryString()->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>