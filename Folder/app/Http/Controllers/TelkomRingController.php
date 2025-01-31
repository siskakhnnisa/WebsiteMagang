<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TelkomRing;
use App\Models\TelkomPo;

class TelkomRingController extends Controller
{
    public function indexTelkom($no_spk){
        return view('pages/telkom_add_ring', ['no_spk' => $no_spk]);
    }
    

    public function postNewRingTelkom(Request $request)
{
    $request->validate([
        'nama_ring' => 'required',
        'no_spk' => 'required',
    ]);

    $lastRing = TelkomRing::orderBy('ring_id', 'desc')->first();
    $ring_id = $lastRing ? $lastRing->ring_id + 1 : 1; // If no ring exists, set ring_id to 1
    $ring = new TelkomRing;
    $ring->ring_id = $ring_id;
    $ring->nama_ring = $request->nama_ring;
    $ring->no_spk = $request->no_spk;
    $ring->save();

    return response()->json([
        'status' => 'success',
        'message' => 'Ring berhasil ditambahkan'
    ]);
}


    public function indexawalTelkom(){
        $data = TelkomRing::all();
        return view('pages/telkom_home')->with('data', $data);
    }

    public function storeTelkom(Request $request)
    {

    }

    public function showTelkom($no_spk)
    {
        $data = TelkomRing::where('no_spk', $no_spk)->get(); // Mengambil data subring berdasarkan no_spk
        return view('pages/subring', ['data' => $data, 'no_spk' => $no_spk]);
    }

   public function tambahRingTelkom(Request $request) {
        $no_spk = $request->query('no_spk');
        return view('pages/telkom_add_ring', ['no_spk' => $no_spk]);
    }

    public function getRingsTelkom($no_spk) {
        $rings = TelkomRing::where('no_spk', $no_spk)->get();
        if ($rings->isEmpty()) {
            return response()->json([
                (object) [
                    'no_spk' => (int) $no_spk
                ],
            ]);
        }

        return response()->json($rings);
    }
}

