<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf; 
use Illuminate\Support\Facades\Storage; // WAJIB ADA BIAR TIDAK ERROR STORAGE NOT FOUND

class AlumniController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $alumnis = Alumni::where('nama_lengkap', 'like', "%" . $search . "%")
            ->orWhere('nisn', 'like', "%" . $search . "%")
            ->latest()
            ->paginate(5);

        return view('alumni.index', compact('alumnis'));
    }

    public function create()
    {
        return view('alumni.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nisn' => 'required|unique:alumnis',
            'nama_lengkap' => 'required',
            // naikkan limit menjadi 5MB (nilai dalam kilobytes untuk Laravel rule 'max')
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            'jurusan' => 'required',
            'tahun_lulus' => 'required|integer|between:1901,2155',
            'status' => 'required',
        ], [
            'nisn.unique' => 'NISN sudah terdaftar. Gunakan NISN lain.',
            'foto.image' => 'File foto harus berupa gambar.',
            'foto.mimes' => 'Foto harus berformat JPG atau PNG.',
            'foto.max' => 'Ukuran foto maksimal 5 MB.',
            'tahun_lulus.integer' => 'Tahun lulus harus berupa angka.',
            'tahun_lulus.between' => 'Tahun lulus harus antara 1901 dan 2155.',
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            if (!$file->isValid()) {
                return back()->with('error', 'Foto gagal diunggah. Coba lagi.');
            }
            try {
                $fotoPath = $file->store('alumni', 'public');
            } catch (\Exception $e) {
                return back()->with('error', 'Foto gagal diunggah: ' . $e->getMessage());
            }
        }

        Alumni::create([
            'nisn' => $request->nisn,
            'nama_lengkap' => $request->nama_lengkap,
            'foto' => $fotoPath,
            'jurusan' => $request->jurusan,
            'tahun_lulus' => $request->tahun_lulus,
            'status' => $request->status,
        ]);

        return redirect()->route('alumni.index')->with('success', 'Data alumni berhasil ditambahkan!');
    }

    public function edit(Alumni $alumnus)
    {
        // Periksa apakah file foto ada di disk 'public'
        $fotoExists = false;
        if ($alumnus->foto) {
            $fotoPath = ltrim(str_replace('public/', '', $alumnus->foto), '/');
            $fotoExists = Storage::disk('public')->exists($fotoPath);
        }

        return view('alumni.edit', ['alumni' => $alumnus, 'fotoExists' => $fotoExists]);
    }

    public function update(Request $request, Alumni $alumnus)
    {
        $request->validate([
            'nisn' => 'required|unique:alumnis,nisn,' . $alumnus->id,
            'nama_lengkap' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            'jurusan' => 'required',
            'tahun_lulus' => 'required|integer|between:1901,2155',
            'status' => 'required',
        ], [
            'nisn.unique' => 'NISN sudah terdaftar. Gunakan NISN lain.',
            'foto.image' => 'File foto harus berupa gambar.',
            'foto.mimes' => 'Foto harus berformat JPG atau PNG.',
            'foto.max' => 'Ukuran foto maksimal 5 MB.',
            'tahun_lulus.integer' => 'Tahun lulus harus berupa angka.',
            'tahun_lulus.between' => 'Tahun lulus harus antara 1901 dan 2155.',
        ]);

        // Pertahankan foto lama secara default
        $fotoPath = $alumnus->foto;

        // Jika user memilih file foto baru saat edit
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            if (!$file->isValid()) {
                return back()->with('error', 'Foto gagal diunggah. Coba lagi.');
            }

            // Hapus foto lama jika ada
            $oldFotoPath = ltrim(str_replace('public/', '', $alumnus->foto ?? ''), '/');
            if ($oldFotoPath && Storage::disk('public')->exists($oldFotoPath)) {
                Storage::disk('public')->delete($oldFotoPath);
            }

            // Simpan foto baru dengan try/catch
            try {
                $fotoPath = $file->store('alumni', 'public');
            } catch (\Exception $e) {
                return back()->with('error', 'Foto gagal diunggah: ' . $e->getMessage());
            }
        }

        // Update data ke database
        $alumnus->update([
            'nisn' => $request->nisn,
            'nama_lengkap' => $request->nama_lengkap,
            'foto' => $fotoPath,
            'jurusan' => $request->jurusan,
            'tahun_lulus' => $request->tahun_lulus,
            'status' => $request->status,
        ]);

        return redirect()->route('alumni.index')->with('success', 'Data alumni berhasil diperbarui!');
    }

    public function destroy(Alumni $alumnus)
    {
        $fotoPath = ltrim(str_replace('public/', '', $alumnus->foto ?? ''), '/');
        if ($fotoPath && Storage::disk('public')->exists($fotoPath)) {
            Storage::disk('public')->delete($fotoPath);
        }

        $alumnus->delete();

        return redirect()->route('alumni.index')->with('success', 'Data alumni berhasil dihapus!');
    }

    public function exportPdf() 
    {
        $alumnis = Alumni::latest()->get();
        $pdf = Pdf::loadView('alumni.pdf', compact('alumnis')); 
        return $pdf->download('laporan-alumni.pdf'); 
    } 
}