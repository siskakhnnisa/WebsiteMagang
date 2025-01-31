<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MaterialAlita;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MaterialAlitaExport;
    
class MaterialAlitaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = MaterialAlita::all(); // Mengambil semua data material dari database
        return view('pages/alita_datamaterial', compact('data')); // Sesuaikan 'nama_view_anda' dengan nama file view Anda
    }

    public function addindex(){
        return view('pages/alita_add_material');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $item = new MaterialAlita();
        return view('pages/alita_add_material');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'kategori' => 'required',
            'nama_material' => 'required',
            'tanggal' => 'required|date',
            'pic_penerima' => 'required',
            'stok_masuk',
            'stok_keluar',
            'stok_sisa',
            'keterangan',
            'foto_surat_jalan' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'foto_barang_datang' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'foto_bongkar_barang' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'foto_lain_lain' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Simpan gambar ke database
        $material = new MaterialAlita();
        $material->kategori = $request->kategori;
        $material->nama_material = $request->nama_material;
        $material->tanggal = $request->tanggal;
        $material->pic_penerima = $request->pic_penerima;
        $material->stok_masuk = $request->stok_masuk;
        $material->stok_keluar = $request->stok_keluar;
        $material->stok_sisa = $request->stok_sisa;        
        $material->keterangan = $request->keterangan;

        // Proses upload gambar surat jalan
        $surat_jalan = time().'.'.$request->foto_surat_jalan->extension();
        $request->foto_surat_jalan->move(public_path('material_alita'), $surat_jalan);
        $imagePath = 'material_alita/' . $surat_jalan;
        $material->foto_surat_jalan = $imagePath;

        $barang_datang = time().'.'.$request->foto_barang_datang->extension();
        $request->foto_barang_datang->move(public_path('material_alita'), $barang_datang);
        $imagePath = 'material_alita/' . $barang_datang;
        $material->foto_barang_datang = $imagePath;

        $bongkar_barang = time().'.'.$request->foto_bongkar_barang->extension();
        $request->foto_bongkar_barang->move(public_path('material_alita'), $bongkar_barang);
        $imagePath = 'material_alita/' . $bongkar_barang;
        $material->foto_bongkar_barang = $imagePath;

        $lain_lain = time().'.'.$request->foto_lain_lain->extension();
        $request->foto_lain_lain->move(public_path('material_alita'), $lain_lain);
        $imagePath = 'material_alita/' . $lain_lain;
        $material->foto_lain_lain = $imagePath;

        $material->save();

        return redirect()->route('alita.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function delete($id)
    {
        // Cari data berdasarkan ID
        $material = MaterialAlita::findOrFail($id);
        
        // Hapus data
        $material->delete();

        // Redirect kembali ke halaman sebelumnya atau halaman lain yang diinginkan
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }

    public function showByCategory($kategori)
    {
        $data = MaterialAlita::where('kategori', $kategori)->get();
        return view('pages/alita_datamaterial', compact('data', 'kategori'));
    }


    public function filterByDate(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $kategori = $request->input('kategori'); // Assuming you retrieve kategori from the request

        // Fetch materials based on date range and kategori
        $materials = MaterialAlita::whereBetween('tanggal', [$start_date, $end_date])
                             ->where('kategori', $kategori)
                             ->get();

        return view('pages/datamaterial', compact('materials', 'kategori'));
    }

    public function export()
    {
        $kategori = $request->input('kategori'); // Provide the actual value of kategori here
        // Fetch materials based on $kategori if needed
        $materials = MaterialAlita::where('kategori', $kategori)->get();
        
        return view('pages/datamaterial', compact('materials', 'kategori'));

        return Excel::download(new MaterialAlitaExport, 'materialalita.xlsx');
    }


    public function exportToExcel($kategori)
    {
        $materials = MaterialAlita::where('kategori', $kategori)->orderBy('tanggal', 'desc')->get();

        return Excel::download(new MaterialAlitaExport($materials), 'material_alita.xlsx');
    }

    public function addshowByCategory($kategori)
    {
        //return view('pages/tambahmaterialalita', ['kategori' => $kategori]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

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
}
