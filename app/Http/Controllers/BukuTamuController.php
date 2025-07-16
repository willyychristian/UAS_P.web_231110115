<?php

namespace App\Http\Controllers;

use App\Models\BukuTamu;
use Illuminate\Http\Request;

class BukuTamuController extends Controller
{
    public function index(Request $request)
    {
        $query = BukuTamu::query();
        
        if ($request->has('search') && $request->search) {
            $query->search($request->search);
        }
        
        $bukuTamu = $query->latest()->paginate(10);
        
        return view('buku_tamu.index', compact('bukuTamu'));
    }

    public function create()
    {
        return view('buku_tamu.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'gereja_asal' => 'nullable|string|max:255',
            'jenis_ibadah' => 'required|in:Minggu Pagi,Minggu Sore,Kebaktian Khusus,Doa Bersama',
            'keterangan' => 'nullable|string'
        ]);

        BukuTamu::create($validatedData);

        return redirect()->route('buku-tamu.index')
                        ->with('success', 'Data berhasil ditambahkan!');
    }

    public function show(BukuTamu $bukuTamu)
    {
        return view('buku_tamu.show', compact('bukuTamu'));
    }

    public function edit(BukuTamu $bukuTamu)
    {
        return view('buku_tamu.edit', compact('bukuTamu'));
    }

    public function update(Request $request, BukuTamu $bukuTamu)
    {
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'gereja_asal' => 'nullable|string|max:255',
            'jenis_ibadah' => 'required|in:Minggu Pagi,Minggu Sore,Kebaktian Khusus,Doa Bersama',
            'keterangan' => 'nullable|string'
        ]);

        $bukuTamu->update($validatedData);

        return redirect()->route('buku-tamu.index')
                        ->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy(BukuTamu $bukuTamu)
    {
        $bukuTamu->delete();

        return redirect()->route('buku-tamu.index')
                        ->with('success', 'Data berhasil dihapus!');
    }
}