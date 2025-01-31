<?php

namespace App\Http\Controllers;

use App\Models\Iforte;
use Illuminate\Http\Request;

class IforteController extends Controller
{
    public function index()
    {
        $data = Iforte::all();
        return view("pages/iforte")->with('data', $data);
    }

    public function create()
    {
        $item = new Iforte();
        return view('pages/tambah_iforte', compact('item'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_material',
            'nama_material',
            'tipe_material',
            'pic_pengirim',
            'pic_penerima',
            'tanggal_datang'=>'date',
            'stok_masuk'=>'integer',
            'stok_terpakai'=>'integer',
            'stok_sisa'=>'integer',
            'keterangan',
        ]);

        $iforte = new Iforte;
        $iforte->kode_material = $request->kode_material;
        $iforte->nama_material = $request->nama_material;
        $iforte->tipe_material = $request->tipe_material;
        $iforte->pic_pengirim = $request->pic_pengirim;
        $iforte->pic_penerima = $request->pic_penerima;
        $iforte->tanggal_datang = $request->tanggal_datang;
        $iforte->stok_masuk = $request->stok_masuk;
        $iforte->stok_terpakai = $request->stok_terpakai;
        $iforte->stok_sisa = $request->stok_sisa;
        $iforte->keterangan = $request->keterangan;
        $iforte->save();

        return redirect()->route('iforte.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $iforte = Iforte::findOrFail($id);
        return view('iforte', compact('iforte'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_material',
            'nama_material',
            'tipe_material',
            'pic_pengirim',
            'pic_penerima',
            'tanggal_datang'=>'date',
            'stok_masuk'=>'integer',
            'stok_terpakai'=>'integer',
            'stok_sisa'=>'integer',
            'keterangan',
        ]);

        $iforte = Iforte::findOrFail($id);

        $iforte->update($request->all());

        return redirect()->route('iforte.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        //
    }
}
