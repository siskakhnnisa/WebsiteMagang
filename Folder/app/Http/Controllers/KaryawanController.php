<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawans = Karyawan::all();
        return view('pages/team', compact('karyawans'));
    }

    public function create()
    {
        return view('pages/tambah_karyawan');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_karyawan' => 'required|string|max:255',
            'posisi_karyawan' => 'required|string|max:255',
            'status_karyawan' => 'required|string|max:255',
        ]);

        Karyawan::create([
            'nama_karyawan' => $request->nama_karyawan,
            'posisi_karyawan' => $request->posisi_karyawan,
            'status_karyawan' => $request->status_karyawan,
        ]);

        return redirect('/team')->with('success', 'Karyawan baru berhasil ditambahkan.');
    }

    public function delete($id)
    {
        // Cari data berdasarkan ID
        $karyawans = Karyawan::findOrFail($id);
        
        // Hapus data
        $karyawans->delete();

        // Redirect kembali ke halaman sebelumnya atau halaman lain yang diinginkan
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
