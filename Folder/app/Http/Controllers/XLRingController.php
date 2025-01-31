<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\XLRing;
use App\Models\XLPo;

class XLRingController extends Controller
{
    // public function indexAlita($no_spk){
    //     return view('pages/alita_add_ring');
    // }

    // public function postNewRingAlita(Request $request)
    // {
    //     $request->validate([
    //         'nama_ring' => 'required',
    //         'no_spk' => 'required',
    //     ]);

    //     $ring_id = AlitaRing::orderBy('ring_id', 'desc')->first()->ring_id + 1; // $ring_id autoincrement accroding last value in table (kalau pake migration, dan set ke autoincrement bisa langsung otomatis)
    //     $ring = new AlitaRing;
    //     $ring->ring_id = $ring_id;
    //     $ring->nama_ring = $request->nama_ring;
    //     $ring->no_spk = $request->no_spk;
    //     $ring->save();

    //     return response()->json([
    //         'status' => 'success',
    //         'message' => 'Ring berhasil ditambahkan'
    //     ]);
    // }

    public function indexXL($no_spk){
        return view('pages/xl_add_ring', ['no_spk' => $no_spk]);
    }
    

    public function postNewRingXL(Request $request)
{
    $request->validate([
        'nama_ring' => 'required',
        'no_spk' => 'required',
    ]);

    $lastRing = XLRing::orderBy('ring_id', 'desc')->first();
    $ring_id = $lastRing ? $lastRing->ring_id + 1 : 1; // If no ring exists, set ring_id to 1
    $ring = new XLRing;
    $ring->ring_id = $ring_id;
    $ring->nama_ring = $request->nama_ring;
    $ring->no_spk = $request->no_spk;
    $ring->save();

    return response()->json([
        'status' => 'success',
        'message' => 'Ring berhasil ditambahkan'
    ]);
}


    public function indexawalXL(){
        $data = XLRing::all();
        return view('pages/xl_home')->with('data', $data);
    }

    public function storeXL(Request $request)
    {

    }

    public function showXL($no_spk)
    {
        $data = XLRing::where('no_spk', $no_spk)->get(); // Mengambil data subring berdasarkan no_spk
        return view('pages/subring', ['data' => $data, 'no_spk' => $no_spk]);
    }

   public function tambahRingXL(Request $request) {
        $no_spk = $request->query('no_spk');
        return view('pages/xl_add_ring', ['no_spk' => $no_spk]);
    }

    public function getRingsXL($no_spk) {
        $rings = XLRing::where('no_spk', $no_spk)->get();
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

