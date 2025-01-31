<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\XLSegment;
use App\Models\XLRing;

class XLSegmentController extends Controller
{
    public function showSegmentsXL($ring_id)
    {
        $segments = XLSegment::where('ring_id', $ring_id)->get();

        if ($segments->isEmpty()) {
            return response()->json([
                (object)[
                    'ring_id' => (int) $ring_id
                ],
            ]);
        }

        return response()->json($segments);
    }

    public function indexXL($ring_id)
    {
        return view('pages/XL_add_segment', ['ring_id' => $ring_id]);
    }

    public function postNewSegmentXL(Request $request)
    {
        $request->validate([
            'nama_segment' => 'required',
            'ring_id' => 'required',
        ]);

        $segment = new XLSegment;
        $segment->nama_segment = $request->nama_segment;
        $segment->ring_id = $request->ring_id;
        $segment->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Segment berhasil ditambahkan'
        ]);
    }
}
