<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\XLPo;

class XLPoController extends Controller
{
    public function indexXL(){
        return view('pages/xl_add_po');
    }

    public function indexawalXL()
    {
        $data = XLPo::with('rings_xl')->get();
        return view('pages/xl_home')->with('data', $data);
    }


    public function storeXL(Request $request)
    {
        $request->validate([
            'no_spk' => 'required|unique:xl_po,no_spk',
            'nama_projek' => 'required'
        ]);

        // Check if no_spk already exists
        if (XLPo::where('no_spk', $request->no_spk)->exists()) {
            return redirect()->back()->with('error', 'Tambah PO gagal. Nomor SPK sudah ada.');
        }

        $xlpo = new XLPo;
        $xlpo->no_spk = $request->no_spk;
        $xlpo->nama_projek = $request->nama_projek;
        $xlpo->save();

        return redirect()->route('xlpo.indexawalXL')->with('success', 'Projek baru berhasil ditambahkan.');
    }
}
