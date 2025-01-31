<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AlitaDokumen;
use Illuminate\Support\Facades\Storage;
use Redirect;
use Session;

class AlitaFileController extends Controller
{
    public function indexAlita(Request $request)
    {
        $segment_id = $request->query('segment_id');
        if ($segment_id) {
            $data = AlitaDokumen::where('segment_id', $segment_id)->get();
        } else {
            $data = AlitaDokumen::all();
        }
        return view('pages.alita_dokfile')->with('data', $data);
    }

    public function create()
    {
        //
    }

    public function storeAlita(Request $request)
    {
        // Validasi input
        $request->validate([
            'dokumen' => 'mimes:pdf,xlsx,xls,doc,docx',
            'keterangan',
            'segment_id' => 'required|integer'
        ]);

        $dokumenModel = new AlitaDokumen();
       
        if ($request->hasFile('dokumen')) {
            $dokumenName = time().'_'.$request->file('dokumen')->getClientOriginalName();
            $dokumenPath = $request->file('dokumen')->storeAs('alita_dokumen', $dokumenName, 'public');
        
            $dokumenModel->dokumen = $dokumenName;
            $dokumenModel->keterangan = $request->keterangan;
            $dokumenModel->segment_id = $request->segment_id;
            $dokumenModel->save();

            return redirect()->route('dokumen.indexAlita', ['segment_id' => $request->segment_id])
                     ->with('success', 'File berhasil diunggah.');            
        } else {
            return redirect()->route('dokumen.indexAlita', ['segment_id' => $request->segment_id])->with('error','File gagal diunggah');
        }
    }

    public function downloadAlita($filename)
    {
        $file = storage_path() . "/app/public/alita_dokumen/" . $filename;
        return response()->download($file);
    }

    public function deleteAlita($id)
    {
        // Cari data berdasarkan ID
        $file = AlitaDokumen::findOrFail($id);

        // Path lengkap file
        $filePath = storage_path('app/public/alita_dokumen/' . $file->dokumen);

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
