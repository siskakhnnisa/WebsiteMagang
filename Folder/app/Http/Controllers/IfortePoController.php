<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IfortePo;

class IfortePoController extends Controller
{
    public function index(){
        return view('pages/iforte_add_po');
    }

    public function indexawal()
    {
        $data = IfortePo::with('rings')->get();
        return view('pages/home')->with('data', $data);
    }


    public function store(Request $request)
    {
        $request->validate([
            'no_spk',
            'nama_projek'
        ]);

        $ifortepo = new IfortePo;
        $ifortepo->no_spk = $request->no_spk;
        $ifortepo->nama_projek = $request->nama_projek;
        $ifortepo->save();

        return redirect()->route('ifortepo.indexawal')->with('success', 'Projek baru berhasil ditambahkan.');
    }
}
