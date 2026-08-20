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
            'foto' => 'nullable|file|mimes:jpeg,png,jpg|max:5120',
            'jurusan' => 'required',
            'tahun_lulus' => 'required',
            'status' => 'required',
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            if (!$file->isValid()) {
                return back()->with('error', 'Foto gagal diunggah. Coba lagi.');
            }
            try {
                $fotoPathStored = $file->store('alumni', 'public');
                $fotoPath = str_replace('public/', '', $fotoPathStored);
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
            $fotoExists = Storage::disk('public')->exists($alumnus->foto);
        }

        return view('alumni.edit', ['alumni' => $alumnus, 'fotoExists' => $fotoExists]);
    }

    public function update(Request $request, Alumni $alumnus)
    {
        $request->validate([
            'nisn' => 'required|unique:alumnis,nisn,' . $alumnus->id,
            'nama_lengkap' => 'required',
            'foto' => 'nullable|file|mimes:jpeg,png,jpg|max:5120',
            'jurusan' => 'required',
            'tahun_lulus' => 'required',
            'status' => 'required',
        ]);

        $fotoPath = $alumnus->foto;
        $fotoPath = str_replace('public/', '', $fotoPath ?? '');

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            if (!$file->isValid()) {
                return back()->with('error', 'Foto gagal diunggah. Coba lagi.');
            }

            if ($alumnus->foto && Storage::disk('public')->exists(str_replace('public/', '', $alumnus->foto))) {
                Storage::disk('public')->delete(str_replace('public/', '', $alumnus->foto));
            }

            try {
                $newFoto = $file->store('alumni', 'public');
                $fotoPath = str_replace('public/', '', $newFoto);
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
        $fotoRelative = str_replace('public/', '', $alumnus->foto ?? '');

        if ($fotoRelative && Storage::disk('public')->exists($fotoRelative)) {
            Storage::disk('public')->delete($fotoRelative);
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