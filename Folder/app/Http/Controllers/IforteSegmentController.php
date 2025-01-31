<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IforteSegment;
use App\Models\IforteRing;
 
class IforteSegmentController extends Controller
{
    public function showSegmentsBackup($ring_id)
    {
        // Mengambil data segment berdasarkan ring_id
        $segments = IforteSegment::where('ring_id', $ring_id)->get();

        // Mengirimkan data segment ke view
        return view('pages.segment', compact('segments'));
    }

    public function showSegments($ring_id)
    {
        // Mengambil data segment berdasarkan ring_id
        $segments = IforteSegment::where('ring_id', $ring_id)->get();

        if ($segments->isEmpty()) {
            return response()->json([
                // 'status' => 'error',
                // 'message' => 'Data segment tidak ditemukan'
                (object)[
                    'ring_id'=> (int) $ring_id
                ],
            ]);
        }

        return response()->json($segments);
    }


    // TAMBAHAN DARI AKU
    public function index($ring_id){
        return view('pages/iforte_add_segment');
    }
    public function postNewSegment(Request $request)
    {
        $request->validate([
            'nama_segment' => 'required',
            'ring_id' => 'required',
        ]);

        $id = IforteSegment::orderBy('id', 'desc')->first()->id + 1; // $id autoincrement accroding last value in table (kalau pake migration, dan set ke autoincrement bisa langsung otomatis)
        $segment = new IforteSegment;
        $segment->id = $id;
        $segment->nama_segment = $request->nama_segment;
        $segment->ring_id = $request->ring_id;
        $segment->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Segment berhasil ditambahkan'
        ]);
    }
}
