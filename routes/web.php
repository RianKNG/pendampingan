<?php

use Illuminate\Support\Facades\Auth;




use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WmController;
use App\Http\Controllers\BbnController;
use App\Http\Controllers\DilController;
use App\Http\Controllers\CobaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CabangController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\EvaluasiController;
use App\Http\Controllers\GolonganController;
use App\Http\Controllers\PenutupanController;
use App\Http\Controllers\AccesoriesController;
use App\Http\Controllers\PenggantianController;
use App\Http\Controllers\PenyambunganController;
// use App\Http\Controllers\PenyambunganController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware'=>['user','user:admin,user']], function () {
    Route::get('/dil', [DilController::class,'index'])->name('dil');  
    Route::get('/', [HomeController::class,'index']);
    // Route::get('/test', [HomeController::class,'test']);
    
    Route::resource('user', UserController::class);
    // Route::get('/', [HomeController::class,'index'])->name('guru');
    Route::get('/test', [AccesoriesController::class,'index']);
    Route::get('/test/ada', [AccesoriesController::class,'ada']);
    Route::get('/test/tidakada', [AccesoriesController::class,'tidakada']);
    Route::get('/test/sada', [AccesoriesController::class,'sada']);
    Route::get('/test/stidakada', [AccesoriesController::class,'stidakada']);
    Route::get('/test/cvada', [AccesoriesController::class,'cvada']);
    Route::get('/test/cvtidakada', [AccesoriesController::class,'cvtidakada']);
    Route::get('/test/kpada', [AccesoriesController::class,'kpada']);
    Route::get('/test/kptada', [AccesoriesController::class,'kptada']);
    Route::get('/test/pkada', [AccesoriesController::class,'pkada']);
    Route::get('/test/pktada', [AccesoriesController::class,'pktada']);
    Route::get('/test/bxada', [AccesoriesController::class,'bxada']);
    Route::get('/test/bxtada', [AccesoriesController::class,'bxtada']);
    Route::get('/test/rada', [AccesoriesController::class,'rada']);
    Route::get('/test/rtada', [AccesoriesController::class,'rtada']);
    Route::get('/test/all', [AccesoriesController::class,'all']);
    Route::get('/test/datatable', [AccesoriesController::class,'datatable']);
    Route::get('/test/ajax', [AccesoriesController::class,'ajax'])->name('ajax');
    Route::get('/test/jalan', [AccesoriesController::class,'jalan'])->name('jalan');
    Route::get('/test/wmbaik', [AccesoriesController::class,'wmbaik'])->name('wmbaik');
    Route::get('/test/wmrusak', [AccesoriesController::class,'wmrusak'])->name('wmrusak');
    Route::get('/test/wmburam', [AccesoriesController::class,'wmburam'])->name('wmburam');
    Route::get('/test/wmhilang', [AccesoriesController::class,'wmhilang'])->name('wmhilang');
    Route::get('/test/wmterkubur', [AccesoriesController::class,'wmterkubur'])->name('wmterkubur');
    Route::get('/test/wmterkunci', [AccesoriesController::class,'wmterkunci'])->name('wmterkunci');
    Route::get('/test/tabelnya', [AccesoriesController::class,'tabelnya'])->name('tabelnya');

 

    Route::get('/dil', [DilController::class,'index'])->name('dil');
    Route::post('/dil/add', [DilController::class,'add']);
    Route::get('/dil/add', [DilController::class,'add']);
    Route::post('/dil/insert', [DilController::class,'insert']);
    Route::get('/dil/edit/{id}', [DilController::class,'edit']);
    Route::post('/dil/update/{id}', [DilController::class,'update']);
    Route::get('/dil/hapus/{id}', [DilController::class,'hapus']);
    Route::get('/dil/status/{id}', [DilController::class,'status']);
    Route::get('/dil/statustutup/{id}', [DilController::class,'statustutup']);
    Route::get('/dil/statussambung/{id}', [DilController::class,'statussambung']);
    Route::get('/dil/jumlah', [DilController::class,'jumlah']);
    Route::get('/dil/detail/{id}', [DilController::class,'detail']);
    Route::get('/dil/cetaklaporan', [DilController::class,'cetaklaporan']);
    Route::get('/dil/cetaklaporanpenyambungan', [DilController::class,'cetaklaporanpenyambungan']);
    Route::get('/dil/cetaklaporanpenggantian', [DilController::class,'cetaklaporanpenggantian']);
    Route::get('/dil/cetaklaporansl', [DilController::class,'cetaklaporansl']);
    Route::get('/pagination/fetch_data', [DilController::class,'fetch_data']);
    Route::get('/dil/cetakperiode', [DilController::class,'cetakperiode']);
    Route::get('/dil/cetakrt', [DilController::class,'cetakrt']);
    Route::get('/exportexcel/{cabang}', [DilController::class,'exportexcel'])->name('exportexcel');
    //import
    Route::post('/importexcel', [DilController::class,'importexcel'])->name('importexcel');
    //import
    Route::get('/exportpdf', [DilController::class,'exportpdf'])->name('exportpdf');
    Route::get('/exportpdfa', [DilController::class,'exportpdfa'])->name('exportpdfa');
    Route::get('/exportpdfn', [DilController::class,'exportpdfn'])->name('exportpdfn');
    
   


    //Penutupan
    Route::get('/penutupan', [PenutupanController::class,'index'])->name('penutupan');
    Route::post('/penutupan/insert', [PenutupanController::class,'insert']);
    Route::get('/penutupan/hapus/{id}', [PenutupanController::class,'hapus']);
    Route::get('/penutupan/edit/{id}',[PenutupanController::class,'edit']);
    Route::post('/penutupan/update/{id}',[PenutupanController::class,'update']);
    Route::get('/penutupan/hitung', [PenutupanController::class,'hitung']);
    Route::get('/exportexcelp', [PenutupanController::class,'exportexcelp'])->name('exportexcelp');
    Route::post('/importexcelp', [PenutupanController::class,'importexcelp'])->name('importexcelp');

    //Penyambungan
    Route::get('/penyambungan', [PenyambunganController::class,'index'])->name('penyambungan');
    Route::get('/penyambungan/add', [PenyambunganController::class,'add']);
    Route::post('/penyambungan/insert', [PenyambunganController::class,'insert']);
    Route::get('/penyambungan/search', [PenyambunganController::class,'search']);
    Route::get('/penyambungan/hapus/{id}', [PenyambunganController::class,'hapus']);
    Route::get('/penyambungan/edit/{id}',[PenyambunganController::class,'edit']);
    Route::post('/penyambungan/update/{id}',[PenyambunganController::class,'update']);
    Route::get('/exportsambung',[PenyambunganController::class,'exportsambung'])->name('exportsambung');
    Route::post('/importsambung', [PenyambunganController::class,'importsambung'])->name('importsambung');
    // Route::post('/penutupan/update/{id}',[PenyambunganController::class,'update']);

    //bbn
    Route::get('/bbn',[BbnController::class,'index'])->name('bbn');
    Route::post('/bbn/store', [BbnController::class,'store']);
    Route::get('/bbn/add', [BbnController::class,'add']);
    Route::get('/bbn/hapus/{id}', [BbnController::class,'hapus']);
    Route::get('/bbn/edit/{id}',[BbnController::class,'edit']);
    Route::post('/bbn/update/{id}',[BbnController::class,'update']);
    Route::get('/exportbbn',[BbnController::class,'exportbbn'])->name('exportbbn');
    Route::post('/importbbn', [BbnController::class,'importbbn'])->name('importbbn');

 
    // bbn
    // Route::get('/report',[ReportController::class,'index'])->name('report');
    // Route::post('/report/search',[ReportController::class,'search'])->name('dilsearch');


    //penggantian
    Route::get('/penggantian', [PenggantianController::class,'index'])->name('penggantian');
    Route::get('/penggantian/add', [PenggantianController::class,'add']);
    Route::post('/penggantian/insert', [PenggantianController::class,'insert']);
    Route::get('/penggantian/hapus/{id}', [PenggantianController::class,'hapus']);
    Route::get('/penggantian/edit/{id}',[PenggantianController::class,'edit']);
    Route::post('/penggantian/update/{id}',[PenggantianController::class,'update']);
    Route::get('/exportganti',[PenggantianController::class,'exportganti'])->name('exportganti');
    Route::post('/importganti', [PenggantianController::class,'importganti'])->name('importganti');

    //watermeter
    Route::get('/watermeter', [WmController::class,'index'])->name('watermeter');
    Route::post('/watermeter/insert', [WmController::class,'insert']);
    Route::get('/watermeter/hapus/{id}', [WmController::class,'hapus']);


    Route::get('/layanan', [LayananController::class,'index'])->name('layanan');
    //export
    

      //Golongan
    Route::get('/golongan', [GolonganController::class,'index'])->name('golongan');
    Route::post('/golongan/insert', [GolonganController::class,'insert']);
    Route::get('/golongan/edit/{id}', [GolonganController::class,'edit']);
    Route::post('/golongan/update/{id}',[GolonganController::class,'update']);
    Route::get('/golongan/hapus/{id}', [GolonganController::class,'hapus']);

    Route::get('/evaluasi', [EvaluasiController::class,'index']);
    // Route::get('/filter',[FilterController::class,'index']);

    Route::get('laporan', [LaporanController::class,'index'])->name('laporan');
    Route::post('laporan/create', [LaporanController::class,'create'])->name('laporan.create');
    Route::post('laporan/store', [LaporanController::class,'store'])->name('laporan.store');
  //Cabang
    Route::get('/cabang', [CabangController::class,'index']);
  





});







