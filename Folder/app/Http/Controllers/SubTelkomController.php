<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sub_iforte;


class SubIforteController extends Controller
{
    public function index()
    {
        $data = sub_iforte::all();
        return view("pages.sub_iforte", ['data' => $data]); // Sesuaikan dengan nama file blade yang sebenarnya
    }

    public function create()
    {
        $item = sub_iforte::all(); // Perbaiki variabel menjadi $ifortes agar lebih jelas
        return view('pages.tambah_sub_iforte', compact('item')); // Sesuaikan dengan nama file blade yang sebenarnya
    }

    public function store(Request $request)
    {
        $request->validate([
            'id',
            'nomor_spk',
            'kode_material',
            'nama_material',
            'tipe_material',
            'pic_pengirim',
            'pic_penerima',
            'tanggal_datang' => 'date',
            'stok_masuk' => 'integer',
            'stok_terpakai' => 'integer',
            'stok_sisa' => 'integer',
            'keterangan',
        ]);

        $sub_iforte = new sub_iforte;
        $sub_iforte->nomo_spk = $request->nomor_spk;
        $sub_iforte->kode_material = $request->kode_material;
        $sub_iforte->nama_material = $request->nama_material;
        $sub_iforte->tipe_material = $request->tipe_material;
        $sub_iforte->pic_pengirim = $request->pic_pengirim;
        $sub_iforte->pic_penerima = $request->pic_penerima;
        $sub_iforte->tanggal_datang = $request->tanggal_datang;
        $sub_iforte->stok_masuk = $request->stok_masuk;
        $sub_iforte->stok_terpakai = $request->stok_terpakai;
        $sub_iforte->stok_sisa = $request->stok_sisa;
        $sub_iforte->keterangan = $request->keterangan;
        $sub_iforte->save();

        return redirect()->route('sub_iforte.index')->with('success', 'Data berhasil ditambahkan.');
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
    public function edit($id)
    {
        $subiforte = sub_iforte::findOrFail($id);
        return view('sub_iforte', compact('subiforte'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id',
            'nomor_spk',
            'kode_material',
            'nama_material',
            'tipe_material',
            'pic_pengirim',
            'pic_penerima',
            'tanggal_datang'=>'|date',
            'stok_masuk'=>'|integer',
            'stok_terpakai'=>'|integer',
            'stok_sisa'=>'|integer',
            'keterangan',
        ]);

        $subiforte = sub_iforte::findOrFail($id);

        $sub_iforte->update($request->all());

        return redirect('sub_iforte.index')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
