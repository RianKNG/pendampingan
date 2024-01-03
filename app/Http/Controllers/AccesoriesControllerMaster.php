<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Bbn;
use App\Models\Merek;
use App\Models\Sambung;
use App\Models\DilModel;
use App\Models\Golongan;
use App\Models\Penutupan;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class AccesoriesController extends Controller
{

    public function index(Request $request)
    {


        $datarelasi = DB::table('tbl_dil as d');

        if ( $request->cari) {
          
            $datarelasi = $datarelasi->where('d.cabang','like','%'.$request->cari.'%');
          
        } 
        $datarelasi = DB::table('tbl_dil as d');
        if ($request->segel) {
            $datarelasi = $datarelasi->where('d.segel','like','%'.$request->segel.'%');
           
        
        }
        
        
        $datarelasi = $datarelasi
                ->select([
                        'd.id','d.cabang','d.status','d.no_rekening','d.nama_sekarang','d.nama_pemilik','d.alamat','d.status_milik',
                        'd.jml_jiwa_tetap','d.jml_jiwa_tidak_tetap','d.segel','d.stop_kran','d.ceck_valve','d.kopling','d.plugran',
                        'd.box','d.plugran','d.box','d.usaha','d.sumber_lain','d.no_seri','d.jenis_usaha','d.tanggal_pasang','d.tanggal_file','d.id_golongan',
                        'm.merek','g.nama_golongan','g.kode','s.nama_baru'
            ])
            ->Join('merek as m','d.id_merek','=','m.id')
            ->Join('golongan as g','d.id_golongan','=','g.id')
            ->leftJoin('bbn as s','s.id_dil','=','d.id')
            // ->where('cabang',11)
            ->get();
            // dd($datarelasi);
             $ada = DB::table('tbl_dil')->where('segel','ada')->count();
             
             $tidakada = DB::table('tbl_dil')->where('segel','tid')->count();
            //  dd($tidakada);
             $sada = DB::table('tbl_dil')->where('stop_kran','ada')->count();
            //  dd( $sada);
             $stidakada = DB::table('tbl_dil')->where('stop_kran','tidak ada')->count();
             $cada = DB::table('tbl_dil')->where('ceck_valve','ada')->count();
             $ctidakada = DB::table('tbl_dil')->where('ceck_valve','tidak ada')->count();
             $kada = DB::table('tbl_dil')->where('kopling','ada')->count();
             $ktidakada = DB::table('tbl_dil')->where('kopling','tidak ada')->count();
             $pada = DB::table('tbl_dil')->where('plugran','ada')->count();
             $ptidakada = DB::table('tbl_dil')->where('plugran','tidak ada')->count();
             $bada = DB::table('tbl_dil')->where('box','ada')->count();
             $btidakada = DB::table('tbl_dil')->where('box','tidak ada')->count();
             $rada = DB::table('tbl_dil')->where('status_milik','2')->count();
             $rtidakada = DB::table('tbl_dil')->where('status_milik','1')->count();
             $semuapelanggan = DB::table('tbl_dil')->count();
             //konsisi WM
             $wmbaik = DB::table('tbl_dil')->where('kondisi_wm','1')->count();
             $wmrusak = DB::table('tbl_dil')->where('kondisi_wm','2')->count();
             $wmburam = DB::table('tbl_dil')->where('kondisi_wm','3')->count();
             $wmhilang = DB::table('tbl_dil')->where('kondisi_wm','4')->count();
             //tamgahan
             $wmterkubur = DB::table('tbl_dil')->where('kondisi_wm','5')->count();
             $wmterkunci = DB::table('tbl_dil')->where('kondisi_wm','6')->count();
            //untuk grafik
            $grafikbaik = DB::table('tbl_dil')
            ->select(DB::raw('count(*) as jumlah, cabang'))
            ->where('kondisi_wm', '=', 1)
            ->groupBy('cabang')
            ->pluck('cabang','jumlah');
            // dd([$grafikbaik]);
           
            //   dd($grafikbaik);
            $grafikrusak = DB::table('tbl_dil')
            ->select(DB::raw('count(*) as jumlah, cabang'))
            ->where('kondisi_wm', '=', 2)
            ->groupBy('cabang')
            ->get();
            $grafikburam = DB::table('tbl_dil')
            ->select(DB::raw('count(*) as jumlah, cabang'))
            ->where('kondisi_wm', '=', 3)
            ->groupBy('cabang')
            ->get();
            
            // dd($grafikhilang);
                $grafikterkubur = DB::table('tbl_dil')
                ->select(DB::raw('count(*) as jumlah, cabang'))
                ->where('kondisi_wm', '=', 5)
                ->groupBy('cabang')
            ->get();
            $grafikterkunci = DB::table('tbl_dil')
            ->select(DB::raw('count(*) as jumlah, cabang'))
            ->where('kondisi_wm', '=', 6)
            ->groupBy('cabang')
        ->pluck('cabang');
        $grafikhilang = DB::table('tbl_dil')
            ->select(DB::raw('count(*) as jumlah, cabang'))
            ->where('kondisi_wm', '=', 4)
            ->groupBy('cabang')
        ->get();
    //  $cab = ['14','12'];
    //  if ($cab == '14') {
    //      echo "cimanggung";
    //  } elseif($cab == '02') {
    //     echo "cimanggung";
    //  }
    $tabelgrafik = DB::table('tbl_dil')
    ->select([
        'd.id','d.cabang','d.status','d.no_rekening','d.nama_sekarang','d.nama_pemilik','d.alamat','d.status_milik',
        'd.jml_jiwa_tetap','d.jml_jiwa_tidak_tetap','d.segel','d.stop_kran','d.ceck_valve','d.kopling','d.plugran',
        'd.box','d.plugran','d.box','d.usaha','d.sumber_lain','d.no_seri','d.jenis_usaha','d.tanggal_pasang','d.tanggal_file','d.id_golongan',
        'm.merek','g.nama_golongan','g.kode','s.nama_baru'
])
    ->select('cabang', DB::raw('count(*) as total'))
    ->groupBy('cabang')
    // ->groupBy('total')
    ->get();
    if($tabelgrafik == "05"){
        $tabelgrafik = 'Jatinangor';
    }elseif($tabelgrafik == "13"){
        $tabelgrafik = 'Pamulihan';
    }elseif($tabelgrafik == "06"){
        $tabelgrafik = 'Tanjungsari';   
    }elseif($tabelgrafik == "14"){
        $tabelgrafik = 'Ciamnggung'; 
    }elseif($tabelgrafik == "01"){
        $tabelgrafik = 'Sumedang Utara'; 
    }else{
        
        $tabelgrafik = 'Anda Salah Memasukan Kode';
    }
//  dd($tabelgrafik);

        $groups = DB::table('tbl_dil')
        ->select('cabang', DB::raw('count(*) as total'))
        ->groupBy('cabang')
        ->pluck('total','cabang')->all();

// Prepare the data for returning with the view
$chart = new DilModel;
       for ($i=0; $i<=count($groups); $i++) {
            $colours[] = '#' . substr(str_shuffle('ACBDEF0125436789'), 0, 6);
        }
// Prepare the data for returning with the view
$chart = new DilModel;
        $chart->labels = (array_keys($groups));
        $chart->dataset = (array_values($groups));
        $chart->colours = $colours;
//untuk merek
        $merekgrap = DB::table('tbl_dil')
        ->Join('merek','tbl_dil.id_merek','=','merek.id')
        ->select('merek', DB::raw('count(*) as total'))
        ->groupBy('merek')
        // ->groupBy('cabang')
        ->pluck('total','merek')->all();

// Prepare the data for returning with the view
$graph = new DilModel;
       for ($i=0; $i<=count($merekgrap); $i++) {
            $colours[] = '#' . substr(str_shuffle('ACBDEF0123456789'), 0, 6);
        }
// Prepare the data for returning with the view

$graph = new DilModel;
        $graph->labels = (array_keys($merekgrap));
        $graph->dataset = (array_values($merekgrap));
        $graph->colours = $colours;
        // dd($graph);

        return view('accesories.index',compact('rada','rtidakada','ada','tidakada',
        'sada','stidakada','cada','ctidakada','kada','ktidakada','pada','ptidakada',
        'bada','btidakada','semuapelanggan','datarelasi','wmbaik','wmrusak','wmburam',
        'wmhilang','wmterkubur','wmterkunci','grafikbaik','grafikrusak','grafikburam',
        'grafikterkubur','grafikterkunci','grafikhilang','chart','groups','tabelgrafik','merekgrap','graph'));
    }
    // public function datatable(Request $request){
    //     if ($request->ajax()) {
    //         $data = DilModel::all();
    //         return Datatables::of($data)->make();
    //     }        
    //     return view('xxx');
    // }
    public function datatable(Request $request)
    {
        // $data = DB::table('tbl_dil as d')->select([
        //     'd.id','d.cabang','d.status','d.no_rekening','d.nama_sekarang','d.nama_pemilik','d.alamat','d.status_milik',
        //     'd.jml_jiwa_tetap','d.jml_jiwa_tidak_tetap','d.segel','d.stop_kran','d.ceck_valve','d.kopling','d.plugran',
        //     'd.box','d.plugran','d.box','d.usaha','d.sumber_lain','d.no_seri','d.jenis_usaha','d.tanggal_pasang','d.tanggal_file','d.id_golongan',
        //     'g.nama_golongan','g.kode','s.nama_baru','p.alasan','m.merek',
        // ])
        // ->Join('merek as m','d.id_merek','=','m.id')
        // ->Join('golongan as g','d.id_golongan','=','g.id');
      
          
        //    $first_names = $customers->sortBy('cabang')->pluck('cabang')->unique();
        //    $last_names = $customers->sortBy('segel')->pluck('segel')->unique();
        //     return view('xxx',compact('customers','first_names','last_names'));
        if(request()->ajax())
     {
        // $customers = DilModel::select(['id','cabang','segel','usaha','status']);
        // $customers = DilModel::select(['id','cabang','segel','usaha','status','sumber_lain','jenis_usaha']);
        
        $customers = DB::table('tbl_dil')
      
       
        ->select(['tbl_dil.id','tbl_dil.cabang','tbl_dil.segel','tbl_dil.usaha','tbl_dil.status','tbl_dil.sumber_lain','tbl_dil.jenis_usaha','tbl_dil.nama_sekarang','tbl_dil.kondisi_wm','id_golongan','id_merek']);
        // ->Join('golongan','tbl_dil.id_golongan','=','golongan.id')
        // ->Join('merek','tbl_dil.id_merek','=','merek.id');
       
        
       
        // return DataTables::of($customers)
        //     ->addIndexColumn()
        //     ->make(true);
      return datatables()->of($customers)
      ->editColumn('cabang',function($data){
        if($data->cabang == 05){
            return 'Jatinangor';
        }elseif($data->cabang == 13){
            return 'Pamulihan';
        }elseif($data->cabang == 06){
            return 'Tanjungsari';   
        }elseif($data->cabang == 14){
            return 'Ciamnggung'; 
        }elseif($data->cabang == 01){
            return 'Sumedang Utara'; 
        }else{
            
            return 'Anda Salah Memasukan Kode';
        }
       
   
    })
    ->editColumn('id_golongan',function($data){
        if($data->id_golongan == 11){
            return 'SOSIAL UMUM';
        }elseif($data->id_golongan == 12){
            return 'BESTINISOSIAL UMUM';
        }elseif($data->id_golongan == 21){
            return 'RMH. TANGGA A';
        }elseif($data->id_golongan == 22){
            return 'RMH. TANGGA B';
        }elseif($data->id_golongan == 23){
            return 'PEMERINTAH';
        }elseif($data->id_golongan == 28){
            return 'RMH. TANGGA C';
        }elseif($data->id_golongan == 29){
            return 'RMH. TANGGA D';
        }elseif($data->id_golongan == 31){
            return 'NIAGA KECIL';
        }elseif($data->id_golongan == 32){
            return 'NIAGA SEDANG';
        }elseif($data->id_golongan == 33){
            return 'NIAGA BESAR';
        }elseif($data->id_golongan == 41){
            return 'INDUSTRI KECIL';
        }elseif($data->id_golongan == 42){
            return 'INDUSTRI BESAR';
        }elseif($data->id_golongan == 80){
            return 'KESEPAKATAN';
        }else{  
            return 'Tabel Belum Terisi';
        }
    })
    ->editColumn('id_merek',function($data){
        if($data->id_merek == 1){
            return 'LINFLOW';
        }elseif($data->id_merek == 2){
            return 'KENT';
        }elseif($data->id_merek == 3){
            return 'AQUA';
        }elseif($data->id_merek == 4){
            return 'SAE SEOUL';
        }elseif($data->id_merek == 5){
            return 'B & R';
        }elseif($data->id_merek == 6){
            return 'ASAHI';
        }elseif($data->id_merek == 7){
            return 'BOSCO';   
        }elseif($data->id_merek == 8){
            return 'KIMON';
        }elseif($data->id_merek == 9){
            return 'N B';
        }elseif($data->id_merek == 10){
            return 'I V Z';
        }elseif($data->id_merek == 11){
            return 'MAGDALENA';
        }elseif($data->id_merek == 12){
            return 'ITRON';
        }elseif($data->id_merek == 13){
            return 'BARINDO';
        }elseif($data->id_merek == 14){
            return 'BESTINI';
        }elseif($data->id_merek == 15){
            return 'A G';
        }elseif($data->id_merek == 16){
            return 'M R';
        }elseif($data->id_merek == 17){
            return 'AMICO';
        }elseif($data->id_merek == 18){
            return 'ONDA';
        }elseif($data->id_merek == 19){
            return 'HILANG';
        }elseif($data->id_merek == 20){
            return 'MULTIMAG';
        }elseif($data->id_merek == 21){
            return 'S H';
        }elseif($data->id_merek == 22){
            return 'SHINHAN';
        }elseif($data->id_merek == 23){
            return 'C S';
        }elseif($data->id_merek == 24){
            return 'AICHI TOKAI';
        }elseif($data->id_merek == 25){
            return 'AKURAT';
        }elseif($data->id_merek == 26){
            return 'PKM';
        }elseif($data->id_merek == 27){
            return 'ACTARIS';
        }elseif($data->id_merek == 28){
            return 'AIRMAS';
        }elseif($data->id_merek == 29){
            return 'LOUIS VIXTOR';
        }elseif($data->id_merek == 30){
            return 'NINGBO';
        }elseif($data->id_merek == 31){
            return 'SCHLUMBERGER';
        }elseif($data->id_merek == 32){
            return 'NULL';
        }elseif($data->id_merek == 33){
            return 'TIDAK TERVERIFIKASI';
        }elseif($data->id_merek == 222){
            return 'DATA JOSONG';

        }
        elseif($data->id_merek == 266){
            return 'TEST';

        }else{
            
            return 'MASIH PROSES INPUT MEREK';
        }
      
    })
    ->editColumn('segel',function($data){
        if($data->segel == 1){
            return 'BAIK';
        }elseif($data->segel == 2){
            return 'TIDAK ADA';
        }elseif($data->segel == 3){
            return 'RUSAK';
        }elseif($data->segel == 4){
            return 'TIDAK DIKETAHUI';
        }else{ 
        return 'DITABELNYA KOSONG';
        }
      
    })
    ->editColumn('kondisi_wm',function($data){
        if($data->kondisi_wm == 1){
            return 'BAIK';
        }elseif($data->kondisi_wm == 2){
            return 'Rusak';
        }elseif($data->kondisi_wm == 3){
            return 'Buram';
        }elseif($data->kondisi_wm == 4){
            return 'Hilang';
        }elseif($data->kondisi_wm == 5){
            return 'Rumah Terkunci';
        }else{ 
        return 'DITABELNYA KOSONG';
        }
      
    })
    ->editColumn('usaha',function($data){
        if($data->usaha == 1){
            return 'ADA';
        }elseif($data->usaha == 2){
            return 'TIDAK ADA';
        
        }else{
            
            return 'DITABELNYA KOSONG';
        }
      
    })
    
    ->addIndexColumn()
      ->make(true);
     }
    //  $mer = 
     $gol = Golongan::all();
     $customers = DilModel::all();
         $first_names = $customers->sortBy('cabang')->pluck('cabang')->unique();
           $last_names = $customers->sortBy('segel')->pluck('segel')->unique();
           $golongan = $customers->sortBy('id_golongan')->pluck('id_golongan')->unique();
           $merek = $customers->sortBy('id_merek')->pluck('id_merek')->unique();
        //    if ($last_names == 'ada') {
        //     $last_names = 'ada';
        // }else{
        //     $last_names = 'tidak';
        // }
    // dd( $golongan);
     return view('testing',compact('first_names','last_names','golongan','merek','gol'));
    }
        

    
      
       
     
      
            
            
            
            
    public function tidakada(Request $request)
    {
       
            $tsegel = DB::table('tbl_dil as a')
            ->select(DB::raw("(a.cabang)  as `cabang` "))
            ->groupBy(DB::raw("cabang"))
            ->where('segel','=','tid')
            ->pluck('cabang');
            
            $ttsegel = DB::table('tbl_dil as a')
            ->select(DB::raw("count(a.segel)  as `segel` "))
            ->groupBy(DB::raw("cabang"))
            ->where('segel','=','tid')
            ->pluck('segel');

        return view('accesories.indextidakada',compact('tsegel','ttsegel'));
    }
   
    public function ada(Request $request)
    {
       
            $tsegel1 = DB::table('tbl_dil as a')
            ->select(DB::raw("(a.cabang)  as `cabang` "))
            ->groupBy(DB::raw("cabang"))
            ->where('segel','=','ada')
            ->pluck('cabang');
            
            $ttsegel11 = DB::table('tbl_dil as a')
            ->select(DB::raw("count(a.segel)  as `segel` "))
            ->groupBy(DB::raw("cabang"))
            ->where('segel','=','ada')
            ->pluck('segel');
            // return $request->all();
            // $dil = DilModel::all();
      
            return view('accesories.indexada',compact('tsegel1','ttsegel11'));
    }
    public function stidakada(Request $request)
    {
       
            $stsegel = DB::table('tbl_dil as a')
            ->select(DB::raw("(a.cabang)  as `cabang` "))
            ->groupBy(DB::raw("cabang"))
            ->where('stop_kran','=','tidak ada')
            ->pluck('cabang');
            
            $sttsegel = DB::table('tbl_dil as a')
            ->select(DB::raw("count(a.stop_kran)  as `segel` "))
            ->groupBy(DB::raw("cabang"))
            ->where('stop_kran','=','tidak ada')
            ->pluck('segel');
            
      
        return view('accesories.indexstada',compact('stsegel','sttsegel'));
    }
    public function sada(Request $request)
    {
       
            $tsegel1 = DB::table('tbl_dil')
            ->select(DB::raw('count(*) as stop_kran, cabang'))
            ->where('stop_kran', '=', "ada")
            ->groupBy('cabang')
            ->get();
            // dd($tsegel1);
      
            return view('accesories.indexsada',compact('tsegel1'));
    }
    public function cvada(Request $request)
    {
       
            $tsegel1 = DB::table('tbl_dil as a')
            ->select(DB::raw("(a.cabang)  as `cabang` "))
            ->groupBy(DB::raw("cabang"))
            ->where('ceck_valve','=','ada')
            ->pluck('cabang');
            
            $ttsegel11 = DB::table('tbl_dil as a')
            ->select(DB::raw("count(a.segel)  as `segel` "))
            ->groupBy(DB::raw("cabang"))
            ->where('ceck_valve','=','ada')
            ->pluck('segel');
            // return $request->all();
            // $dil = DilModel::all();
      
            return view('accesories.indexcvada',compact('tsegel1','ttsegel11'));
    }
    public function cvtidakada(Request $request)
    {
       
            $stsegel = DB::table('tbl_dil as a')
            ->select(DB::raw("(a.cabang)  as `cabang` "))
            ->groupBy(DB::raw("cabang"))
            ->where('ceck_valve','=','tidak ada')
            ->pluck('cabang');
            
            $sttsegel = DB::table('tbl_dil as a')
            ->select(DB::raw("count(a.segel)  as `segel` "))
            ->groupBy(DB::raw("cabang"))
            ->where('ceck_valve','=','tidak ada')
            ->pluck('segel');
            
        return view('accesories.indexcvtada',compact('stsegel','sttsegel'));
    }
    public function kptada(Request $request)
    {
       
            $segel = DB::table('tbl_dil as a')
            ->select(DB::raw("(a.cabang)  as `cabang` "))
            ->groupBy(DB::raw("cabang"))
            ->where('kopling','=','ada')
            ->pluck('cabang');
            
            $segel1 = DB::table('tbl_dil as a')
            ->select(DB::raw("count(a.segel)  as `segel` "))
            ->groupBy(DB::raw("cabang"))
            ->where('kopling','=','ada')
            ->pluck('segel');
            // return $request->all();
            // $dil = DilModel::all();
      
            return view('accesories.indexkpada',compact('segel','segel1'));
    }
    public function kpada(Request $request)
    {
       
            $segel = DB::table('tbl_dil as a')
            ->select(DB::raw("(a.cabang)  as `cabang` "))
            ->groupBy(DB::raw("cabang"))
            ->where('kopling','=','tidak ada')
            ->pluck('cabang');
            
            $segel1 = DB::table('tbl_dil as a')
            ->select(DB::raw("count(a.segel)  as `segel` "))
            ->groupBy(DB::raw("cabang"))
            ->where('kopling','=','tidak ada')
            ->pluck('segel');
            
        return view('accesories.indexkptada',compact('segel','segel1'));
    }
    public function pkada(Request $request)
    {
       
            $segel = DB::table('tbl_dil as a')
            ->select(DB::raw("(a.cabang)  as `cabang` "))
            ->groupBy(DB::raw("cabang"))
            ->where('plugran','=','ada')
            ->pluck('cabang');
            
            $segel1 = DB::table('tbl_dil as a')
            ->select(DB::raw("count(a.segel)  as `segel` "))
            ->groupBy(DB::raw("cabang"))
            ->where('plugran','=','ada')
            ->pluck('segel');
            // return $request->all();
            // $dil = DilModel::all();
      
            return view('accesories.indexpktada',compact('segel','segel1'));
    }
    public function pktada(Request $request)
    {
       
            $segel = DB::table('tbl_dil as a')
            ->select(DB::raw("(a.cabang)  as `cabang` "))
            ->groupBy(DB::raw("cabang"))
            ->where('plugran','=','tidak ada')
            ->pluck('cabang');
            
            $segel1 = DB::table('tbl_dil as a')
            ->select(DB::raw("count(a.segel)  as `segel` "))
            ->groupBy(DB::raw("cabang"))
            ->where('plugran','=','tidak ada')
            ->pluck('segel');
            
        return view('accesories.indexpkada',compact('segel','segel1'));
    }
    public function bxtada(Request $request)
    {
       
            $segel = DB::table('tbl_dil as a')
            ->select(DB::raw("(a.cabang)  as `cabang` "))
            ->groupBy(DB::raw("cabang"))
            ->where('box','=','ada')
            ->pluck('cabang');
            
            $segel1 = DB::table('tbl_dil as a')
            ->select(DB::raw("count(a.segel)  as `segel` "))
            ->groupBy(DB::raw("cabang"))
            ->where('box','=','ada')
            ->pluck('segel');
            // return $request->all();
            // $dil = DilModel::all();
      
            return view('accesories.indexbxtada',compact('segel','segel1'));
    }
    public function bxada(Request $request)
    {
       
            $segel = DB::table('tbl_dil as a')
            ->select(DB::raw("(a.cabang)  as `cabang` "))
            ->groupBy(DB::raw("cabang"))
            ->where('box','=','tidak ada')
            ->pluck('cabang');
            
            $segel1 = DB::table('tbl_dil as a')
            ->select(DB::raw("count(a.segel)  as `segel` "))
            ->groupBy(DB::raw("cabang"))
            ->where('box','=','tidak ada')
            ->pluck('segel');
            
        return view('accesories.indexbxada',compact('segel','segel1'));
    }
    public function rada(Request $request)
    {
       
            $segel = DB::table('tbl_dil as a')
            ->select(DB::raw("(a.cabang)  as `cabang` "))
            ->groupBy(DB::raw("cabang"))
            ->where('status_milik','=','1')
            ->pluck('cabang');
            
            $segel1 = DB::table('tbl_dil as a')
            ->select(DB::raw("count(a.segel)  as `segel` "))
            ->groupBy(DB::raw("cabang"))
            ->where('status_milik','=','1')
            ->pluck('segel');
            // return $request->all();
            // $dil = DilModel::all();
      
            return view('accesories.indexrtada',compact('segel','segel1'));
    }
    public function rtada(Request $request)
    {
       
            $segel = DB::table('tbl_dil as a')
            ->select(DB::raw("(a.cabang)  as `cabang` "))
            ->groupBy(DB::raw("cabang"))
            ->where('status_milik','=','2')
            ->pluck('cabang');
            
            $segel1 = DB::table('tbl_dil as a')
            ->select(DB::raw("count(a.segel)  as `segel` "))
            ->groupBy(DB::raw("cabang"))
            ->where('status_milik','=','2')
            ->pluck('segel');
            
        return view('accesories.indexrada',compact('segel','segel1'));
    }
    public function all(Request $request)
    {
       
            $datacabang = DB::table('tbl_dil as a')
            ->select(DB::raw("(a.cabang)  as `cabang` "))
            ->groupBy(DB::raw("cabang"))
                ->where('status',1)
            ->pluck('cabang');
        //     dd($datacabang);
            $jumlahdatacabang = DB::table('tbl_dil as a')
            ->select(DB::raw("count(*)  as `all` "))
            ->groupBy(DB::raw("a.cabang"))
                ->where('status',1)
            ->pluck('all');
        //     dd($jumlahdatacabang);
        return view('accesories.all',compact('datacabang','jumlahdatacabang'));
    }
    public function jalan(){
        // $client = DB::
        // table('tbl_dil')
        // ->select(DB::raw('SUBSTRING(id, 3, 7) as value'))
        // ->groupBy('value')->pluck('value')->unique();
      
      
    //     $groupedByValue = $client->groupBy('value');

    // $dupes = $groupedByValue->filter(function (Collection $groups) {
    //     return $groups->count() > 1;
    // })->toArray();

// });
// dd($dupes);
    // return response()->json($dupes);
// dd($dupes);
$collection =  DilModel::all();
$grouped = $collection->groupBy(function ($item, $key) {
    return substr($item['id'], 0, 7);
});



$groupCount = $grouped->map(function ($item, $key) {
    return collect($item)->count();
});
// dd($groupCount);
        return view('jalan',compact('groupCount'));
        
    }



public function wmbaik(Request $request)
    {
       
         
            $querywm = DB::table('tbl_dil')
                 ->select(DB::raw('count(*) as kondisi_wm, cabang'))
                 ->where('kondisi_wm', '=', 1)
                 ->groupBy('cabang')
                 ->get();
            // dd($querywm );
            
      
        return view('accesories.wm1',compact('querywm'));
    }
    public function wmrusak(Request $request)
    {
       
         
            $querywm = DB::table('tbl_dil')
                 ->select(DB::raw('count(*) as kondisi_wm, cabang'))
                 ->where('kondisi_wm', '=', 2)
                 ->groupBy('cabang')
                 ->get();
            // dd($querywm );
            
      
        return view('accesories.wm2',compact('querywm'));
    }
    public function wmburam(Request $request)
    {
       
         
            $querywm = DB::table('tbl_dil')
                 ->select(DB::raw('count(*) as kondisi_wm, cabang'))
                 ->where('kondisi_wm', '=', 3)
                 ->groupBy('cabang')
                 ->get();
            // dd($querywm );
            
      
        return view('accesories.wm3',compact('querywm'));
    }
    public function wmhilang(Request $request)
    {
       
         
            $querywm = DB::table('tbl_dil')
                 ->select(DB::raw('count(*) as kondisi_wm, cabang'))
                 ->where('kondisi_wm', '=', 4)
                 ->groupBy('cabang')
                 ->get();
            // dd($querywm );
            
      
        return view('accesories.wm4',compact('querywm'));
    }
    public function wmterkubur(Request $request)
    {
       
         
            $querywm = DB::table('tbl_dil')
                 ->select(DB::raw('count(*) as kondisi_wm, cabang'))
                 ->where('kondisi_wm', '=', 5)
                 ->groupBy('cabang')
                 ->get();
            // dd($querywm );
            
      
        return view('accesories.wm5',compact('querywm'));
    }
    public function wmterkunci(Request $request)
    {
       
         
            $querywm = DB::table('tbl_dil')
                 ->select(DB::raw('count(*) as kondisi_wm, cabang'))
                 ->where('kondisi_wm', '=', 5)
                 ->groupBy('cabang')
                 ->get();
            // dd($querywm );
            
      
        return view('accesories.wm6',compact('querywm'));
    }
}