<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AlitaRing;
use App\Models\AlitaPo;

class AlitaRingController extends Controller
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

    public function indexAlita($no_spk){
        return view('pages/alita_add_ring', ['no_spk' => $no_spk]);
    }
    

    public function postNewRingAlita(Request $request)
{
    $request->validate([
        'nama_ring' => 'required',
        'no_spk' => 'required',
    ]);

    $lastRing = AlitaRing::orderBy('ring_id', 'desc')->first();
    $ring_id = $lastRing ? $lastRing->ring_id + 1 : 1; // If no ring exists, set ring_id to 1
    $ring = new AlitaRing;
    $ring->ring_id = $ring_id;
    $ring->nama_ring = $request->nama_ring;
    $ring->no_spk = $request->no_spk;
    $ring->save();

    return response()->json([
        'status' => 'success',
        'message' => 'Ring berhasil ditambahkan'
    ]);
}


    public function indexawalAlita(){
        $data = AlitaRing::all();
        return view('pages/alita_home')->with('data', $data);
    }

    public function storeAlita(Request $request)
    {

    }

    public function showAlita($no_spk)
    {
        $data = AlitaRing::where('no_spk', $no_spk)->get(); // Mengambil data subring berdasarkan no_spk
        return view('pages/subring', ['data' => $data, 'no_spk' => $no_spk]);
    }

   public function tambahRingAlita(Request $request) {
        $no_spk = $request->query('no_spk');
        return view('pages/alita_add_ring', ['no_spk' => $no_spk]);
    }

    public function getRingsAlita($no_spk) {
        $rings = AlitaRing::where('no_spk', $no_spk)->get();
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

