<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\IfortePoController;
use App\Http\Controllers\IforteRingController;
use App\Http\Controllers\IforteSegmentController;
use App\Http\Controllers\DokumentasiController;
use App\Http\Controllers\MaterialIforteController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\TambahController;
use App\Http\Controllers\KaryawanController;
// use App\Http\Controllers\SessionController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', [PageController::class, 'index']);
Route::get('/dokfile', [PageController::class, 'dokfile']);
Route::get('/dashboard', [PageController::class, 'dashboard']);
Route::get('/dashboardAdmin', [PageController::class, 'dashboardAdmin']);
Route::get('/tambah', [PageController::class, 'tambah']);
Route::get('/team', [PageController::class, 'team']);

// -------------------------------------------------------------------------------------------------------------------------------
// LOGIN
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/dashboardAdmin', function () {
    return view('pages/dashboardAdmin');
})->name('dashboardAdmin')->middleware('auth');

Route::get('/dashboard', function () {
    return view('pages/dashboard');
})->name('dashboard')->middleware('auth');

// -------------------------------------------------------------------------------------------------------------------------------
//IFORTE
Route::get('/po', [PageController::class, 'po']);
Route::get('/iforte_add_material', [PageController::class, 'iforte_add_material']);
Route::get('/iforte_main_menu', [PageController::class, 'iforte_main_menu']);
Route::get('/dokgambar', [PageController::class, 'dokgambar'])->name('dokgambar');
Route::get('/datamaterial', [PageController::class, 'datamaterial']);
Route::get('/document', [FileController::class, 'index'])->name('dokumen.index');

//XL
Route::get('/xl_main_menu', [PageController::class, 'xl_main_menu']);

// PO SAMA RING SAMA SEGMENT
Route::get('/iforte_add_po', [IfortePoController::class, 'index'])->name('ifortepo.index');
// Route::get('/iforte_add_ring', [IforteRingController::class, 'index'])->name('ifortering.index');

Route::get('/po', [IfortePoController::class, 'indexawal'])->name('ifortepo.indexawal');
Route::post('/iforte_add_po', [IfortePoController::class, 'store'])->name('ifortepo.store');

Route::get('/po/{no_spk}/ring', [IforteRingController::class, 'show'])->name('ifortering.show');

Route::get('rings/{no_spk}', [IforteRingController::class, 'getRings'])->name('rings.show');
Route::get('segments/{ring_id}', [IforteSegmentController::class, 'showSegments'])->name('segments.show');
Route::get('/iforte_add_ring/{no_spk}', [IforteRingController::class, 'index'])->name('ifortering.index');
Route::post('/post_new_ring', [IforteRingController::class, 'postNewRing'])->name('ifortering.postNewRing');


// TAMBAHAN
Route::get('/iforte_add_segment/{ring_id}', [IforteSegmentController::class, 'index'])->name('ifortesegment.index');
Route::post('/post_new_segment', [IforteSegmentController::class, 'postNewSegment'])->name('ifortesegment.postNewSegment');


//laman upload dokumentasi
Route::get('/dokumentasi/create', [DokumentasiController::class, 'create'])->name('dokumentasi.create');
Route::post('/iforte-dokumentasi', [DokumentasiController::class, 'store'])->name('dokumentasi.store');
Route::delete('/iforte-dokumentasi/{id}', [DokumentasiController::class, 'destroyIforte'])->name('dokumentasi.destroyIforte');

Route::get('/iforte-material', [MaterialIforteController::class, 'index'])->name('iforte.index');
Route::get('/add-iforte-material', [MaterialIforteController::class, 'create'])->name('iforte.create');
Route::post('/iforte-material', [MaterialIforteController::class, 'store'])->name('iforte.store');
Route::delete('/iforte-delete-material/{id}', [MaterialIforteController::class, 'delete'])->name('ifortematerial.delete');
Route::get('/iforte-material/category/{kategori}', [MaterialIforteController::class, 'showByCategory'])->name('iforte.showByCategory');

Route::get('/materialiforte/{kategori}', [MaterialiforteController::class, 'showByCategory'])->name('iforte.showByCategory');
// Route::get('/add-materialiforte/{kategori}', 'App\Http\Controllers\MaterialiforteController@showByCategory')->name('iforte.addshowByCategory');
Route::get('/iforte/exportToExcel/{kategori}', [MaterialIforteController::class, 'exportToExcel'])->name('iforte.exportToExcel');
Route::get('/iforte/filter', [MaterialIforteController::class, 'filterByDate'])->name('iforte.filterByDate');
Route::get('/iforte-material/category/{kategori}', [MaterialIforteController::class, 'showByCategory'])->name('iforte.showByCategory');

//laman upload file
Route::get('/dokumen/create', [FileController::class, 'create'])->name('file.create');
Route::post('/document', [FileController::class, 'store'])->name('file.store');

//laman menampilkan dokumen
Route::get('/document/{id}', [FileController::class, 'show'])->name('document.show');
//TAMBAHAN

Route::get('/iforte-download/{filename}', [FileController::class, 'download'])->name('file.download');
Route::delete('/iforte_delete-document/{id}', [FileController::class, 'deleteIforte'])->name('document.deleteIforte');


// Laman menampilkan dokumen
// Route::get('/tambah', [TambahController::class, 'index'])->name('tambah.index');
Route::get('/tambah/{id}', [TambahController::class, 'show'])->name('tambah.show');

Route::get('/tambah', [TambahController::class, 'index'])->name('tambah.index');
Route::post('/tambah', [TambahController::class, 'store'])->name('tambah.store');
Route::delete('/delete-user/{id}', [TambahController::class, 'delete'])->name('tambah.delete');

//Print
Route::get('/print-pdf', [MaterialIforteController::class, 'generatePDF'])->name('print.pdf');

// ------------------------------------------------------------------------------------------------------------------------------
// ALITA
use App\Http\Controllers\AlitaPoController;
use App\Http\Controllers\AlitaRingController;
use App\Http\Controllers\AlitaSegmentController;
use App\Http\Controllers\MaterialAlitaController;
use App\Http\Controllers\AlitaDokumentasiController;
use App\Http\Controllers\AlitaFileController;

// MAIN MENU
Route::get('/alita_main_menu', [PageController::class, 'alita_main_menu']);
Route::get('/alita_datamaterial', [PageController::class, 'alita_datamaterial']);

// PO
Route::get('/alita_add_po', [AlitaPoController::class, 'indexAlita'])->name('alitapo.indexAlita');
Route::get('/alita_home', [AlitaPoController::class, 'indexawalAlita'])->name('alitapo.indexawalAlita');
Route::post('/alita_add_po', [AlitaPoController::class, 'storeAlita'])->name('alitapo.storeAlita');
Route::get('/alita_home/{no_spk}/ring', [AlitaRingController::class, 'showAlita'])->name('alitaring.showAlita');

// RING 
Route::get('alita_rings/{no_spk}', [AlitaRingController::class, 'getRingsAlita'])->name('rings.showAlita');
Route::get('alita_segments/{ring_id}', [AlitaSegmentController::class, 'showSegmentsAlita'])->name('segments.showAlita');
Route::get('/alita_add_ring/{no_spk}', [AlitaRingController::class, 'indexAlita'])->name('alitaring.indexAlita');
Route::post('/post_new_ring_alita', [AlitaRingController::class, 'postNewRingAlita'])->name('alitaring.postNewRingAlita');

// SEGMENT
Route::get('/alita_add_segment/{ring_id}', [AlitaSegmentController::class, 'indexAlita'])->name('alitasegment.indexAlita');
Route::post('/post_new_segment_alita', [AlitaSegmentController::class, 'postNewSegmentAlita'])->name('alitasegment.postNewSegmentAlita');

// MATERIAL
Route::get('/alita-material', [MaterialAlitaController::class, 'index'])->name('alita.index');
Route::get('/add-alita-material', [MaterialAlitaController::class, 'create'])->name('alita.create');
Route::post('/alita-material', [MaterialAlitaController::class, 'store'])->name('alita.store');
Route::delete('/alita-delete-material/{id}', [MaterialAlitaController::class, 'delete'])->name('alitamaterial.delete');
Route::get('/alita/exportToExcel/{kategori}', [MaterialAlitaController::class, 'exportToExcel'])->name('alita.exportToExcel');
Route::get('/alita/filter', [MaterialAlitaController::class, 'filterByDate'])->name('alita.filterByDate');
Route::get('/alita-material/category/{kategori}', [MaterialAlitaController::class, 'showByCategory'])->name('alita.showByCategory');

// DOKUMENTASI FILE
Route::get('/alita_dokfile', [PageController::class, 'alita_dokfile']);
Route::get('/alita_document/create', [AlitaFileController::class, 'create'])->name('file.create');
Route::post('/alita_document', [AlitaFileController::class, 'storeAlita'])->name('file.storeAlita');
Route::get('/alita_document/{id}', [AlitaFileController::class, 'showAlita'])->name('document.showAlita');
Route::get('/alita-download/{filename}', [AlitaFileController::class, 'downloadAlita'])->name('file.downloadAlita');
Route::get('/alita_document', [AlitaFileController::class, 'indexAlita'])->name('dokumen.indexAlita');
Route::delete('/alita_delete-document/{id}', [AlitaFileController::class, 'deleteAlita'])->name('document.deleteAlita');

// DOKUMENTASI GAMBAR
Route::get('/alita_dokgambar', [AlitaDokumentasiController::class, 'index'])->name('alita_dokgambar.index');
// Route::get('/dokumentasi/create', [AlitaDokumentasiController::class, 'create'])->name('dokumentasi.create');
Route::post('/alita-dokumentasi', [AlitaDokumentasiController::class, 'storeAlita'])->name('dokumentasi.storeAlita');
Route::delete('/alita-dokumentasi/{id}', [AlitaDokumentasiController::class, 'destroyAlita'])->name('dokumentasi.destroyAlita');

// ------------------------------------------------------------------------------------------------------------------------------
use App\Http\Controllers\TelkomPoController;
use App\Http\Controllers\TelkomRingController;
use App\Http\Controllers\TelkomSegmentController;
use App\Http\Controllers\TelkomMaterialController;
use App\Http\Controllers\TelkomDokumentasiController;
use App\Http\Controllers\TelkomFileController;

// mitra TELKOM 31 Mei 2024 
Route::get('telkom_main_menu', [PageController::class, 'telkom_main_menu']);
// Route::get('telkom_home', [PageController::class, 'telkom_home']);

// PO 
Route::get('/telkom_add_po', [TelkomPoController::class, 'index'])->name('telkompo.index');
Route::get('/telkom_home', [TelkomPoController::class, 'indexawal'])->name('telkompo.indexawal');
Route::post('/telkom_add_po', [TelkomPoController::class, 'store'])->name('telkompo.store');

Route::get('/telkom_home/{no_spk}/ring', [TelkomRingController::class, 'showTelkom'])->name('telkomring.showTelkom');

// RING 
Route::get('telkom_rings/{no_spk}', [TelkomRingController::class, 'getRingsTelkom'])->name('rings.showTelkom');
Route::get('telkom_segments/{ring_id}', [TelkomSegmentController::class, 'showSegmentsTelkom'])->name('segments.showTelkom');
Route::get('/telkom_add_ring/{no_spk}', [TelkomRingController::class, 'indexTelkom'])->name('telkomring.indexTelkom');
Route::post('/post_new_ring_telkom', [TelkomRingController::class, 'postNewRingTelkom'])->name('telkomring.postNewRingTelkom');

// SEGMENT
Route::get('/telkom_add_segment/{ring_id}', [TelkomSegmentController::class, 'indexTelkom'])->name('telkomsegment.indexTelkom');
Route::post('/post_new_segment_telkom', [TelkomSegmentController::class, 'postNewSegmentTelkom'])->name('telkomsegment.postNewSegmentTelkom');

// MATERIAL TELKOM
Route::get('/datamaterial-telkom', [PageController::class, 'telkom_datamaterial']);
Route::get('/telkom-material', [TelkomMaterialController::class, 'index'])->name('telkom.index');
Route::get('/add-telkom-material', [TelkomMaterialController::class, 'create'])->name('telkom.create');
Route::post('/telkom-material', [TelkomMaterialController::class, 'store'])->name('telkom.store');
Route::delete('/telkom-delete-material/{id}', [TelkomMaterialController::class, 'delete'])->name('telkommaterial.delete');
Route::get('/telkom-material/category/{kategori}', [TelkomMaterialController::class, 'showByCategory'])->name('telkom.showByCategory');
// print pdf material
Route::get('/telkom-print-pdf', [TelkomMaterialController::class, 'generatePDF'])->name('telkomprint.pdf');


// DOKUMENTASI FILE
Route::get('/telkom_dokfile', [PageController::class, 'telkom_dokfile']);
Route::get('/telkom_document/create', [TelkomFileController::class, 'create'])->name('file.create');
Route::post('/telkom_document', [TelkomFileController::class, 'storeTelkom'])->name('file.storeTelkom');
Route::get('/telkom_document/{id}', [TelkomFileController::class, 'showTelkom'])->name('document.showTelkom');
Route::get('/telkom-download/{filename}', [TelkomFileController::class, 'downloadTelkom'])->name('file.downloadTelkom');
Route::get('/telkom_document', [TelkomFileController::class, 'indexTelkom'])->name('dokumen.indexTelkom');
Route::delete('/telkom_delete-document/{id}', [TelkomFileController::class, 'deleteTelkom'])->name('document.deleteTelkom');


// DOKUMENTASI GAMBAR
Route::get('/telkom_dokgambar', [TelkomDokumentasiController::class, 'index'])->name('telkom_dokgambar.index');
Route::post('/telkom-dokumentasi', [TelkomDokumentasiController::class, 'storeTelkom'])->name('telkom-dokumentasi.store');
Route::delete('/telkom-dokumentasi/{id}', [TelkomDokumentasiController::class, 'destroyTelkom'])->name('dokumentasi.destroyTelkom');

// ------------------------------------------------------------------------------------------------------------------------------
// XL
//PO, RING, SEGMENT XL

use App\Http\Controllers\XLPoController;
use App\Http\Controllers\XLRingController;
// use App\Http\Controllers\XLSegmentController;
use App\Http\Controllers\XLSegmentController;
use App\Http\Controllers\XLFileController;
use App\Http\Controllers\MaterialXLController;
use App\Http\Controllers\XLDokumentasiController;


//AWALAN
Route::get('/xl_main_menu', [PageController::class, 'xl_main_menu']);
Route::get('/xl_datamaterial', [PageController::class, 'xl_datamaterial']);
Route::get('/xl_add_material', [PageController::class, 'xl_add_material']);
Route::get('/xl_po', [PageController::class, 'xl_po']);
Route::get('/xl_add_material', [PageController::class, 'xl_add_material']);
Route::get('/xl_dokgambar', [PageController::class, 'xl_dokgambar'])->name('xl_dokgambar');


// PO
Route::get('/xl_add_po', [XLPoController::class, 'indexXL'])->name('xlpo.indexXL');
Route::get('/xl_home', [XLPoController::class, 'indexawalXL'])->name('xlpo.indexawalXL'); 
Route::post('/xl_add_po', [XLPoController::class, 'storeXL'])->name('xlpo.storeXL');
Route::get('/xl_home/{no_spk}/ring', [XLRingController::class, 'showXL'])->name('xlring.showXL');
Route::get('xl_rings/{no_spk}', [XLRingController::class, 'getRingsXL'])->name('rings.showXL');
Route::get('xl_segments/{ring_id}', [XLSegmentController::class, 'showSegmentsXL'])->name('segments.showXL');
Route::get('/xl_add_ring/{no_spk}', [XLRingController::class, 'indexXL'])->name('xlring.indexXL');
Route::post('/post_new_ring_xl', [XLRingController::class, 'postNewRingXL'])->name('xlring.postNewRingXL');
Route::get('/xl_add_segment/{ring_id}', [XLSegmentController::class, 'indexXL'])->name('xlsegment.indexXL');
Route::post('/post_new_segment_xl', [XLSegmentController::class, 'postNewSegmentXL'])->name('xlsegment.postNewSegmentXL');

//MATERIAL
Route::get('/xl-material', [MaterialXLController::class, 'index'])->name('xl.index');
Route::get('/add-xl-material', [MaterialXLController::class, 'create'])->name('xl.create');
Route::post('/xl-material', [MaterialXLController::class, 'store'])->name('xl.store');
Route::delete('/delete-material/{id}', [MaterialXLController::class, 'delete'])->name('materialxl.delete');
Route::get('/materialxl/{kategori}', [MaterialXLController::class, 'showByCategory'])->name('xl.showByCategory');
Route::get('/xl/exportToExcel/{kategori}', [MaterialXLController::class, 'exportToExcel'])->name('xl.exportToExcel');
Route::get('/xl/filter', [MaterialXLController::class, 'filterByDate'])->name('xl.filterByDate');
Route::get('/xl-material/category/{kategori}', [MaterialXLController::class, 'showByCategory'])->name('xl.showByCategory');

//PRINT MATERIAL
Route::get('/xlprint-pdf', [MaterialXLController::class, 'generatePDF'])->name('xlprint.pdf');


//XL
// DOKUMENTASI FILE
Route::get('/xl_uploadfile', [PageController::class, 'xl_uploadfile']);
Route::get('/xl_document/create', [XLFileController::class, 'create'])->name('file.create');
Route::post('/xl_document', [XLFileController::class, 'storeXL'])->name('file.storeXL');
Route::get('/xla_document/{id}', [XLFileController::class, 'showXL'])->name('document.showXL');
Route::get('/download/{filename}', [XLFileController::class, 'downloadXL'])->name('file.downloadXL');
Route::get('/xl_document', [XLFileController::class, 'indexXL'])->name('dokumen.indexXL');
Route::delete('/xl_delete-document/{id}', [XLFileController::class, 'deleteXL'])->name('document.deleteXL');

//DOKUMENTASIGAMBAR
Route::get('/xl_dokgambar', [XLDokumentasiController::class, 'index'])->name('xl_dokgambar.index');
// Route::get('/dokumentasi/create', [AlitaDokumentasiController::class, 'create'])->name('dokumentasi.create');
Route::post('/dokumentasi', [XLDokumentasiController::class, 'storeXL'])->name('dokumentasi.storeXL');
Route::delete('/xl-dokumentasi/{id}', [XLDokumentasiController::class, 'destroyXL'])->name('dokumentasi.destroyXL');


// KARYAWAN

Route::get('/team', [KaryawanController::class, 'index'])->name('karyawan.index');
// Route untuk menampilkan form tambah karyawan
Route::get('/tambah_karyawan', [KaryawanController::class, 'create']);

// Route untuk menyimpan data karyawan baru
Route::post('/simpan_karyawan', [KaryawanController::class, 'store']);

Route::delete('/delete-karyawan/{id}', [KaryawanController::class, 'delete'])->name('karyawan.delete');