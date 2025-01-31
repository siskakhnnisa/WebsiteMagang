<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokumen;
use Illuminate\Support\Facades\Storage;
use Redirect;
use Session;




class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $segment_id = $request->query('segment_id');
        if ($segment_id) {
            $data = Dokumen::where('segment_id', $segment_id)->get();
        } else {
            $data = Dokumen::all();
        }
        return view('pages.uploadfile')->with('data', $data);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'dokumen' => 'mimes:pdf,xlsx,xls,doc,docx',
            'keterangan',
            'segment_id' => 'required|integer'
        ]);

        $dokumenModel = new Dokumen();
       
        if ($request->hasFile('dokumen')) {
            $dokumenName = time().'_'.$request->file('dokumen')->getClientOriginalName();
            $dokumenPath = $request->file('dokumen')->storeAs('dokumen', $dokumenName, 'public');
        
            $dokumenModel->dokumen = $dokumenName;
            $dokumenModel->keterangan = $request->keterangan;
            $dokumenModel->segment_id = $request->segment_id;
            $dokumenModel->save();

            return redirect()->route('dokumen.index', ['segment_id' => $request->segment_id])
                     ->with('success', 'File berhasil diunggah.');            
        } else {
            return redirect()->route('dokumen.index', ['segment_id' => $request->segment_id])->with('error','File gagal diunggah');
        }
        
    }

    /**
     * Display the specified resource.
     */
//     public function show($id)
// {
//   $dokumen = Dokumen::findOrFail($id);

//   return view('dokumen.show', compact('dokumen'));
// }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function download($filename)
    {
        $file = storage_path() . "/app/public/dokumen/" . $filename;
        return response()->download($file);
    }

    public function deleteIforte($id)
        {
            // Cari data berdasarkan ID
            $file = Dokumen::findOrFail($id);

            // Path lengkap file
            $filePath = storage_path('app/public/dokumen/' . $file->dokumen);

            // Hapus file dari storage jika ada
            if (file_exists($filePath)) {
                unlink($filePath);
            }

            // Hapus data dari database
            $file->delete();

            // Redirect kembali ke halaman sebelumnya atau halaman lain yang diinginkan
            return redirect()->back()->with('success', 'Data berhasil dihapus');
        }
        

}
