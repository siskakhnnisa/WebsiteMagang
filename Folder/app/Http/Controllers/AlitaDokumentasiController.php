<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AlitaDokumentasi;

class AlitaDokumentasiController extends Controller
{
    public function index(Request $request)
    {
        $segment_id = $request->segment_id;
        $data = AlitaDokumentasi::where('segment_id', $segment_id)->get();
        return view('pages/alita_dokgambar', compact('data'));
    }

    public function create()
    {
        //
    }

    public function storeAlita(Request $request)
    {
        // Validasi input
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'keterangan' => 'required',
            'segment_id' => 'required|integer'
        ]);

        // Simpan gambar ke database
        $dokumentasi = new AlitaDokumentasi();
        $dokumentasi->keterangan = $request->keterangan;
        $dokumentasi->segment_id = $request->segment_id;

        // Proses upload gambar
        $imageName = time().'.'.$request->gambar->extension();
        $request->gambar->move(public_path('image'), $imageName);
        $imagePath = 'image/' . $imageName;
        $dokumentasi->gambar = $imagePath;

        $dokumentasi->save();

        return redirect()->route('alita_dokgambar.index', ['segment_id' => $request->segment_id])
                         ->with('success', 'Gambar berhasil diunggah.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroyAlita($id)
    {
        $dokumentasi = AlitaDokumentasi::findOrFail($id);

        if (file_exists(public_path($dokumentasi->gambar))) {
            unlink(public_path($dokumentasi->gambar));
        }

        $dokumentasi->delete();

        return redirect()->back()->with('success', 'Gambar berhasil dihapus.');
    }
}
