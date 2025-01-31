<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tambah;
use Illuminate\Support\Facades\Hash;

class TambahController extends Controller
{
    public function index()
    {
        $tambah = Tambah::all();
        return view('pages.tambahUser', compact('tambah'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'password' => 'required|string',
        ]);

        // Simpan data ke dalam database dengan password yang di-hash
        Tambah::create([
            'nama' => $request->nama,
            'role' => $request->role,
            'username' => $request->username,
            'password' => Hash::make($request->password), // Hash the password
        ]);

        return redirect()->route('tambah.index')->with('success', 'User berhasil ditambahkan');
    }

    public function delete($id)
    {
        // Cari data berdasarkan ID
        $tambah = Tambah::findOrFail($id);
        
        // Hapus data
        $tambah->delete();

        // Redirect kembali ke halaman sebelumnya atau halaman lain yang diinginkan
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
