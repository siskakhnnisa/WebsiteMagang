<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IforteRing;
use App\Models\IfortePo;

class IforteRingController extends Controller
{
    public function indexbacku(){
        return view('pages/iforte_add_ring');
    }

    public function index($no_spk){
        return view('pages/iforte_add_ring');
    }

    public function postNewRing(Request $request)
    {
        $request->validate([
            'nama_ring' => 'required',
            'no_spk' => 'required',
        ]);

        $ring_id = IforteRing::orderBy('ring_id', 'desc')->first()->ring_id + 1; // $ring_id autoincrement accroding last value in table (kalau pake migration, dan set ke autoincrement bisa langsung otomatis)
        $ring = new IforteRing;
        $ring->ring_id = $ring_id;
        $ring->nama_ring = $request->nama_ring;
        $ring->no_spk = $request->no_spk;
        $ring->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Ring berhasil ditambahkan'
        ]);
    }

    public function indexawal(){
        $data = IforteRing::all();
        return view('pages/home')->with('data', $data);
    }

    public function store(Request $request)
    {

    }

    public function show($no_spk)
    {
        $data = IforteRing::where('no_spk', $no_spk)->get(); // Mengambil data subring berdasarkan no_spk
        return view('pages/subring', ['data' => $data, 'no_spk' => $no_spk]);
    }

   public function tambahRingIforte(Request $request) {
        $no_spk = $request->query('no_spk');
        return view('pages/iforte_add_ring', ['no_spk' => $no_spk]);
    }

    // public function getRings($no_spk) {
    //     $rings = IforteRing::where('no_spk', $no_spk)->get();
    //     return response()->json($rings);
    // }

    public function getRings($no_spk) {
        $rings = IforteRing::where('no_spk', $no_spk)->get();
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

