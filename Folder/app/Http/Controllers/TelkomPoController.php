<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TelkomPo;

class TelkomPoController extends Controller
{
    public function index(){
        return view('pages/telkom_add_po');
    }

    public function indexawal()
    {
        // Fetch all POs from the database
        $data = TelkomPo::all();
        
        // Pass the PO list to the view
        return view('pages.telkom_home', ['data' => $data]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'no_spk',
            'nama_projek'
        ]);

        $telkompo = new TelkomPo;
        $telkompo->no_spk = $request->no_spk;
        $telkompo->nama_projek = $request->nama_projek;
        $telkompo->save();

        return redirect()->route('telkompo.indexawal')->with('success', 'Projek baru berhasil ditambahkan.');
    }
}
