<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TelkomDokumen;
use Illuminate\Support\Facades\Storage;
use Redirect;
use Session;

class TelkomFileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexTelkom(Request $request)
    {
        $segment_id = $request->query('segment_id');
        if ($segment_id) {
            $data = TelkomDokumen::where('segment_id', $segment_id)->get();
        } else {
            $data = TelkomDokumen::all();
        }
        return view('pages.telkom_dokfile')->with('data', $data);
    }

    public function create()
    {
        //
    }

    public function storeTelkom(Request $request)
    {
        // Validasi input
        $request->validate([
            'dokumen' => 'mimes:pdf,xlsx,xls,doc,docx',
            'keterangan',
            'segment_id' => 'required|integer'
        ]);

        $dokumenModel = new TelkomDokumen();
       
        if ($request->hasFile('dokumen')) {
            $dokumenName = time().'_'.$request->file('dokumen')->getClientOriginalName();
            $dokumenPath = $request->file('dokumen')->storeAs('telkom_dokumen', $dokumenName, 'public');
        
            $dokumenModel->dokumen = $dokumenName;
            $dokumenModel->keterangan = $request->keterangan;
            $dokumenModel->segment_id = $request->segment_id;
            $dokumenModel->save();

            return redirect()->route('dokumen.indexTelkom', ['segment_id' => $request->segment_id])
                     ->with('success', 'File berhasil diunggah.');            
        } else {
            return redirect()->route('dokumen.indexTelkom', ['segment_id' => $request->segment_id])->with('error','File gagal diunggah');
        }
    }

    public function downloadTelkom($filename)
    {
        $file = storage_path() . "/app/public/telkom_dokumen/" . $filename;
        return response()->download($file);
    }

    public function deleteTelkom($id)
    {
        // Cari data berdasarkan ID
        $file = TelkomDokumen::findOrFail($id);

        // Path lengkap file
        $filePath = storage_path('app/public/telkom_dokumen/' . $file->dokumen);

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
