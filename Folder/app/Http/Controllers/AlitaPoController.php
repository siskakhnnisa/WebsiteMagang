<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AlitaPo;

class AlitaPoController extends Controller
{
    public function indexAlita(){
        return view('pages/alita_add_po');
    }

    public function indexawalAlita()
    {
        $data = AlitaPo::with('rings_alita')->get();
        return view('pages/alita_home')->with('data', $data);
    }


    public function storeAlita(Request $request)
    {
        $request->validate([
            'no_spk' => 'required|unique:alita_po,no_spk',
            'nama_projek' => 'required'
        ]);

        // Check if no_spk already exists
        if (AlitaPo::where('no_spk', $request->no_spk)->exists()) {
            return redirect()->back()->with('error', 'Tambah PO gagal. Nomor SPK sudah ada.');
        }

        $alitapo = new AlitaPo;
        $alitapo->no_spk = $request->no_spk;
        $alitapo->nama_projek = $request->nama_projek;
        $alitapo->save();

        return redirect()->route('alitapo.indexawalAlita')->with('success', 'Projek baru berhasil ditambahkan.');
    }
}
