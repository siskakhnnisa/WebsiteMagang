<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TelkomSegment;
use App\Models\TelkomRing;

class TelkomSegmentController extends Controller
{
    public function showSegmentsTelkom($ring_id)
    {
        $segments = TelkomSegment::where('ring_id', $ring_id)->get();

        if ($segments->isEmpty()) {
            return response()->json([
                (object)[
                    'ring_id' => (int) $ring_id
                ],
            ]);
        }

        return response()->json($segments);
    }

    public function indexTelkom($ring_id)
    {
        return view('pages/telkom_add_segment', ['ring_id' => $ring_id]);
    }

    public function postNewSegmentTelkom(Request $request)
    {
        $request->validate([
            'nama_segment' => 'required',
            'ring_id' => 'required',
        ]);

        $id = TelkomSegment::orderBy('id', 'desc')->first()->id + 1;
        $segment = new TelkomSegment;
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