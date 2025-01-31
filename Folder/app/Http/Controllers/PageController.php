<?php

namespace App\Http\Controllers;
use App\Models\Dokumentasi;
use App\Models\Dokumen;
use App\Models\MaterialIforte;
use App\Models\TelkomMaterial;
use Illuminate\Http\Request;
use App\Models\TelkomDokumen;
use App\Models\TelkomDokumentasi;
use App\Models\AlitaDokumen;
use App\Models\AlitaDokumentasi;
use App\Models\MaterialAlita;
use App\Models\MaterialXL;
use App\Models\XLPo;
use App\Models\XLDokumentasi;


class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages/sign_in');
    }
    public function dokfile(){
        return view('pages/dokfile');
    }
    public function dashboard(){
        return view('pages/dashboard');
    }
     public function dashboardAdmin(){
        return view('pages/dashboardAdmin');
    }
    public function tambah(){
        return view('pages/tambahUser');
    }
    public function team(){
        return view('pages/team');
    }

    //IFORTE
    public function po(){
        return view('pages/home');
    }
    public function iforte_main_menu(){
        return view('pages/iforte_main_menu');
    }
    public function dokgambar(Request $request){
        $segment_id = $request->query('segment_id');
        if ($segment_id) {
            $data = Dokumentasi::where('segment_id', $segment_id)->get();
        } else {
            $data = Dokumentasi::all();
        }
        return view('pages.dokgambar')->with('data', $data);
    }
    public function datamaterial(){
        $data = MaterialIforte::all();
        return view('pages/datamaterial')->with('data', $data);
    }
    
    //XL AXIATA
    public function xl_po(){
        $data = XLPo::all();
        return view('pages/xl_home')->with('data', $data);
    }
    public function iforte_add_material(){
        return view('pages/iforte_add_material');
    }
    public function xl_add_material(){
        return view('pages/xl_add_material');
    }
    public function xl_main_menu(){
        return view('pages/xl_main_menu');
    }
    public function xl_datamaterial(){
        $data = MaterialXL::all();
        return view('pages/xl_datamaterial')->with('data', $data);
    }
    public function xl_add_po(){
        return view('pages/xl_add_po');
    }

    public function xl_add_ring(){
        return view('pages/xl_add_ring');
    }

    public function xl_add_segment(){
        return view('pages/xl_add_segment');
    }

    public function xl_home(){
        return view('pages/xl_home');
    }
    public function xl_dokfile(){
        return view('pages/xl_dokfile');
    }
    public function xl_dokgambar(){
        return view('pages/xl_dokgambar');
    }


    // TELKOM
    public function telkom_home(){
        return view('pages/telkom_home');
    }

    public function telkom_main_menu(){
        return view('pages/telkom_main_menu');
    }

    public function telkom_datamaterial(){
        $data = TelkomMaterial::all();
        return view('pages/telkom_datamaterial')->with('data', $data);
    }

    public function telkom_dokgambar(Request $request){
        $segment_id = $request->query('segment_id');
        if ($segment_id) {
            $data = TelkomDokumentasi::where('segment_id', $segment_id)->get();
        } else {
            $data = TelkomDokumentasi::all();
        }
        return view('pages.telkom_dokgambar')->with('data', $data);
    }

    public function telkom_dokfile(){
        return view('pages/telkom_dokfile');
    }



    // SISKA PUNYA
    public function iforte_add_po(){
        return view('pages/iforte_add_po');
    }

    public function iforte_add_ring(){
        return view('pages/iforte_add_ring');
    }

    public function iforte_add_segment(){
        return view('pages/iforte_add_segment');
    }

    // ALITA
    public function alita_main_menu(){
        return view('pages/alita_main_menu');
    }

    public function alita_add_po(){
        return view('pages/alita_add_po');
    }

    public function alita_add_ring(){
        return view('pages/alita_add_ring');
    }

    public function alita_add_segment(){
        return view('pages/alita_add_segment');
    }

    public function alita_home(){
        return view('pages/alita_home');
    }

    public function alita_datamaterial(){
        $data = MaterialAlita::all();
        return view('pages/alita_datamaterial')->with('data', $data);
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
        //
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
