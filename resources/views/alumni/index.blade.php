@extends('layouts.app')

@section('content')
    <div class="admin-heading directory-admin-heading"><div><p class="section-kicker">Indeks / 001—∞</p><h1>Data<br><em>alumni.</em></h1><p class="admin-lead">Satu direktori untuk setiap langkah, jurusan, dan cerita yang pernah dimulai dari sini.</p></div><a href="{{ route('alumni.create') }}" class="admin-button">+ Tambah alumni</a></div>
    <div class="directory-admin-panel">
                        <div class="directory-toolbar">
                            <div><span class="toolbar-label">Direktori aktif</span><strong>{{ $alumnis->total() }} <small>profil</small></strong></div>
                            <div class="toolbar-actions"><a href="{{ route('alumni.export_pdf') }}" target="_blank" class="admin-button admin-button-light">Cetak PDF ↗</a></div>
                        </div>
                        
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        
                        <form action="{{ route('alumni.index') }}" method="GET" class="directory-search"><span>⌕</span><input type="text" name="search" placeholder="Cari nama atau NISN..." value="{{ request('search') }}"><button type="submit">Cari ↗</button></form>

                                <table class="admin-table">
                                    <thead>
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
                                                @if($alumni->foto)<img src="{{ asset('storage/' . $alumni->foto) }}" class="alumni-avatar">@else<span class="alumni-avatar alumni-avatar-empty">{{ strtoupper(substr($alumni->nama_lengkap, 0, 1)) }}</span>@endif
                                            </td>
                                            <td>{{ $alumni->nisn }}</td>
                                            <td>{{ $alumni->nama_lengkap }}</td>
                                            <td>{{ $alumni->jurusan }}</td>
                                            <td>{{ $alumni->tahun_lulus }}</td>
                                            <td><span class="status-pill">{{ $alumni->status }}</span></td>
                                            <td>
                                                <form action="{{ route('alumni.destroy', $alumni->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data alumni ini?');">
                                                    <a href="{{ route('alumni.edit', $alumni->id) }}" class="table-action">Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="table-action table-action-danger">Hapus</button>
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
@endsection