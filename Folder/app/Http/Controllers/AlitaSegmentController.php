<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AlitaSegment;
use App\Models\AlitaRing;

class AlitaSegmentController extends Controller
{
    public function showSegmentsAlita($ring_id)
    {
        $segments = AlitaSegment::where('ring_id', $ring_id)->get();

        if ($segments->isEmpty()) {
            return response()->json([
                (object)[
                    'ring_id' => (int) $ring_id
                ],
            ]);
        }

        return response()->json($segments);
    }

    public function indexAlita($ring_id)
    {
        return view('pages/alita_add_segment', ['ring_id' => $ring_id]);
    }

    public function postNewSegmentAlita(Request $request)
    {
        $request->validate([
            'nama_segment' => 'required',
            'ring_id' => 'required',
        ]);

        $id = AlitaSegment::orderBy('id', 'desc')->first()->id + 1;
        $segment = new AlitaSegment;
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
// swswsw