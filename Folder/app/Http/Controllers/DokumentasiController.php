<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokumentasi;

class DokumentasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'keterangan' => 'required',
            'segment_id' => 'required|integer'
        ]);

        // Simpan gambar ke database
        $dokumentasi = new Dokumentasi();
        $dokumentasi->keterangan = $request->keterangan;
        $dokumentasi->segment_id = $request->segment_id;

        // Proses upload gambar
        $imageName = time().'.'.$request->gambar->extension();
        $request->gambar->move(public_path('image'), $imageName);
        $imagePath = 'image/' . $imageName;
        $dokumentasi->gambar = $imagePath;

        $dokumentasi->save();

        return redirect()->route('dokgambar', ['segment_id' => $request->segment_id])
                     ->with('success', 'Gambar berhasil diunggah.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyIforte($id)
    {
        $dokumentasi = Dokumentasi::findOrFail($id);

        if (file_exists(public_path($dokumentasi->gambar))) {
            unlink(public_path($dokumentasi->gambar));
        }

        $dokumentasi->delete();

        return redirect()->back()->with('success', 'Gambar berhasil dihapus.');
    }
}
