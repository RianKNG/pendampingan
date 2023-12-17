<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Sambung;
use App\Models\Penutupan;
use App\Models\Bbn;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\ElseIf_;
use Illuminate\Support\Facades\DB;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
      Penutupan::all();
      Sambung::all();
     Bbn::all();
            
      $coba = Sambung::all();
      $categories = [];
      foreach($coba as $mp){
        $categories[] = $mp->tanggal_sambung;

      }
      //data DIL baru
       $databill = DB::table('tbl_dil as a')
        // ->where('status','=',1) 
        ->whereMonth('tanggal_pasang', Carbon::now()->month)
        ->get();
        $databilling =  $databill
        ->count();
        
      //data penutupan
      $jumlahtutup = DB::table('penutupan as a')
      ->join('tbl_dil as b','a.id_dil','=','b.id')
        ->select('a.*','b.*')
        ->whereMonth('tanggal_tutup', Carbon::now()->month)
        ->get();
        $datatutupjumlah = $jumlahtutup
        ->count();
      //data Penyambungan
      $datahitungp = DB::table('sambung as t')
        ->join('tbl_dil as h','h.id','=','t.id_dil')
        ->select('t.*','h.*')
        ->whereMonth('tanggal_sambung', Carbon::now()->month)
        ->get();
      $dataz = $datahitungp
          ->count();
          
      //data Penggantian
      $datahitunganganti = DB::table('ganti as a')
      ->join('tbl_dil as b','a.id_dil','=','b.id')
       ->select('a.*','b.*')
       ->whereMonth('tanggal_ganti', Carbon::now()->month)
       ->get();
      $datatest = $datahitunganganti
          ->count();
          
      $datahitungtanggat = DB::table('penutupan as a')
        ->join('tbl_dil as b','a.id_dil','=','b.id')
        ->select('a.*','b.status','b.nama_sekarang','b.nama_pemilik','b.id_merek','b.segel','b.cabang');
      $datat = $datahitungtanggat
          ->select(DB::raw('count(b.id) as d'))
          // ->whereMonth('tanggal_tutup', Carbon::now()->month)
          ->groupBy(DB::raw("Month(tanggal_tutup)"))
          // ->where('status','=','1')
          ->pluck('d');

      //untuk BBN
      $datahitungan = DB::table('bbn as h')
        ->join('tbl_dil as t','h.id_dil','=','t.id')
        ->select('t.*','h.*')
        ->whereMonth('tanggal_bbn', Carbon::now()->month)
        ->get();
        $datat = $datahitungan
        ->count();
        
      //untuk Pelanggan Aktip
      $datajum = DB::table('tbl_dil as a')
      ->whereStatus('1')
        ->get();
          $jumlahdil = $datajum->count();
         
       //untuk Pelanggan Non Aktip
       $datanon = DB::table('tbl_dil as a')
       ->whereStatus('0')
         ->get();
           $jumlahnon = $datanon->count();

      //untuk Total Dil
       $totdil = DB::table('tbl_dil as a')
         ->get();
           $totdilcount = $totdil->count();


     
      $datahitungdil = DB::table('tbl_dil as a')
      ->join('merek as b','b.id','=','a.id_merek')
       ->select('a.*','b.*');
          $datadil = $datahitungdil
          // ->where('status','=',1) 
          ->whereMonth('a.created_at', Carbon::now()->month)
          ->count();

              $datahitung = DB::table('penutupan as a')
              ->join('tbl_dil as b','a.id_dil','=','b.id')
               ->select('a.*','b.status','b.nama_sekarang','b.nama_pemilik','b.id_merek','b.segel','b.cabang');

                  $data = $datahitung
                  ->where('b.status','=',1) 
                  ->whereMonth('tanggal_tutup', Carbon::now()->month)
                  ->count();

            //tabel penyambungan
            $datas = DB::table('sambung as a')
              ->join('tbl_dil as b','a.id_dil','=','b.id')
              //  ->select('a.stat','b.*');
              // $datas = $datahitungtanggas
              ->select(DB::raw('count(b.id) as total_sambung'))
              // ->select(DB::raw("DATE_FORMAT(tanggal_sambung,'%M %Y') as months"),)
              // ->whereMonth('tanggal_sambung', Carbon::now()->month)
              // ->groupBy(DB::raw("DATE_FORMAT(tanggal_sambung,'%M %Y')"),)
              ->groupBy(DB::raw("Month(tanggal_sambung)"))
              
              ->where('status','=','1')
              ->pluck('total_sambung');
              // ->get();
              $cobacabang = DB::table('sambung as a')
              ->join('tbl_dil as b','a.id_dil','=','b.id')
              // ->select(DB::raw("b.cabang as cabang",))
              ->select(DB::raw("(  (count(b.cabang)  ) )  as `cabang` "))
              ->groupBy(DB::raw("cabang"))
              // ->groupBy(DB::raw("MonthName(tanggal_sambung)"))
              ->pluck('cabang');
              // ->get();
              
          //  dd($cobacabang);
              

              // $monthsArray=[1,2,3,4,5,6,7,8,9,10,11,12];
              // $now = Carbon::now();
                // $cobaa = ['January','February','April'];
              // $startMonth = Carbon::now()->addMonth($now)->day(1)->format("Y-m-d");
              // dd($startMonth);
            
              
              $cobaa = DB::table('sambung as a')
              ->join('tbl_dil as b','a.id_dil','=','b.id')
              ->select(DB::raw("Month(tanggal_sambung) as bulan"))
              // ->whereIn(DB::raw('MONTH(tanggal_sambung)'), [1,2,3])
              ->groupBy([DB::raw("Month(tanggal_sambung)")])
              ->orderBy('bulan','asc')
            ->pluck('bulan');

             
              // ->get();
             
              // dd($coba);
              // ->get();
             
            //  if ( $coba == [0=>"March"]) {
            //    $coba = "3. Marert";
            //  } else {
            //    $coba ="gregreg";
            //  }
             
            // dd($coba);
      
;              // $coba=array_map(
              //   function($monthNumber){
              //        return date("F", mktime(0, 0, 0, $monthNumber));
              //        }
              //  ,$monthsArray);
            //   $coba = collect( range(1, $now->month) )->map( function($month) use ($now) {
            //     return Carbon::createFromDate($now->year, $month)->format('F');
            // })->toArray();
             
              // ->toArray($coba);
              // $games =  $coba->merge($cobaa);
          
            
              // dd($coba);
              
           
// dd($coba);
            

            //table penggantian
            $datahitunggandd = DB::table('ganti as s')
              ->join('tbl_dil as b','b.id','=','s.id_dil')
               ->select('s.*','b.*');
              $datac = $datahitunggandd
              ->select(DB::raw('count(s.id) as e'))
              // ->whereMonth('tanggal_sambung', Carbon::now()->month)
              ->groupBy(DB::raw("Month(tanggal_ganti)"))
              ->pluck('e');

               //data Grafik DIL baru
            $grafik1 = DB::table('tbl_dil')->whereMonth('tanggal_file','01')->count();
            $grafik2 = DB::table('tbl_dil')->whereMonth('tanggal_file','02')->count();
            $grafik3 = DB::table('tbl_dil')->whereMonth('tanggal_file','03')->count();
            $grafik4 = DB::table('tbl_dil')->whereMonth('tanggal_file','04')->count();
            $grafik5 = DB::table('tbl_dil')->whereMonth('tanggal_file','05')->count();
            $grafik6 = DB::table('tbl_dil')->whereMonth('tanggal_file','06')->count();
            $grafik7 = DB::table('tbl_dil')->whereMonth('tanggal_file','07')->count();
            $grafik8 = DB::table('tbl_dil')->whereMonth('tanggal_file','08')->count();
            $grafik9 = DB::table('tbl_dil')->whereMonth('tanggal_file','09')->count();
            $grafik10 = DB::table('tbl_dil')->whereMonth('tanggal_file','10')->count();
            $grafik11 = DB::table('tbl_dil')->whereMonth('tanggal_file','11')->count();
            $grafik12 = DB::table('tbl_dil')->whereMonth('tanggal_file','12')->count();

            $tutup1 = DB::table('penutupan')->whereMonth('tanggal_tutup','01')->count();
            $tutup2 = DB::table('penutupan')->whereMonth('tanggal_tutup','02')->count();
            $tutup3 = DB::table('penutupan')->whereMonth('tanggal_tutup','03')->count();
            $tutup4 = DB::table('penutupan')->whereMonth('tanggal_tutup','04')->count();
            $tutup5 = DB::table('penutupan')->whereMonth('tanggal_tutup','05')->count();
            $tutup6 = DB::table('penutupan')->whereMonth('tanggal_tutup','06')->count();
            $tutup7 = DB::table('penutupan')->whereMonth('tanggal_tutup','07')->count();
            $tutup8 = DB::table('penutupan')->whereMonth('tanggal_tutup','08')->count();
            $tutup9 = DB::table('penutupan')->whereMonth('tanggal_tutup','09')->count();
            $tutup10 = DB::table('penutupan')->whereMonth('tanggal_tutup','10')->count();
            $tutup11 = DB::table('penutupan')->whereMonth('tanggal_tutup','11')->count();
            $tutup12 = DB::table('penutupan')->whereMonth('tanggal_tutup','12')->count();

            $sambung1 = DB::table('sambung')->whereMonth('tanggal_sambung','01')->count();
            $sambung2 = DB::table('sambung')->whereMonth('tanggal_sambung','02')->count();
            $sambung3 = DB::table('sambung')->whereMonth('tanggal_sambung','03')->count();
            $sambung4 = DB::table('sambung')->whereMonth('tanggal_sambung','04')->count();
            $sambung5 = DB::table('sambung')->whereMonth('tanggal_sambung','05')->count();
            $sambung6 = DB::table('sambung')->whereMonth('tanggal_sambung','06')->count();
            $sambung7 = DB::table('sambung')->whereMonth('tanggal_sambung','07')->count();
            $sambung8 = DB::table('sambung')->whereMonth('tanggal_sambung','08')->count();
            $sambung9 = DB::table('sambung')->whereMonth('tanggal_sambung','09')->count();
            $sambung10 = DB::table('sambung')->whereMonth('tanggal_sambung','10')->count();
            $sambung11 = DB::table('sambung')->whereMonth('tanggal_sambung','11')->count();
            $sambung12 = DB::table('sambung')->whereMonth('tanggal_sambung','12')->count();

            $ganti1 = DB::table('ganti')->whereMonth('tanggal_ganti','01')->count();
            $ganti2 = DB::table('ganti')->whereMonth('tanggal_ganti','02')->count();
            $ganti3 = DB::table('ganti')->whereMonth('tanggal_ganti','03')->count();
            $ganti4 = DB::table('ganti')->whereMonth('tanggal_ganti','04')->count();
            $ganti5 = DB::table('ganti')->whereMonth('tanggal_ganti','05')->count();
            $ganti6 = DB::table('ganti')->whereMonth('tanggal_ganti','06')->count();
            $ganti7 = DB::table('ganti')->whereMonth('tanggal_ganti','07')->count();
            $ganti8 = DB::table('ganti')->whereMonth('tanggal_ganti','08')->count();
            $ganti9 = DB::table('ganti')->whereMonth('tanggal_ganti','09')->count();
            $ganti10 = DB::table('ganti')->whereMonth('tanggal_ganti','10')->count();
            $ganti11 = DB::table('ganti')->whereMonth('tanggal_ganti','11')->count();
            $ganti12 = DB::table('ganti')->whereMonth('tanggal_ganti','12')->count();
            
             
              

               return view('v_home',compact(
                 'grafik1', 'grafik2', 'grafik3','grafik4','grafik5','grafik6','grafik7','grafik8','grafik9','grafik10','grafik11','grafik12',
                 //tutup
                 'tutup1','tutup2','tutup3','tutup4','tutup5','tutup6','tutup7','tutup8','tutup9','tutup10','tutup11','tutup12',
                 //samubng
                 'sambung1','sambung2','sambung3','sambung4','sambung5','sambung6','sambung7','sambung8','sambung9','sambung10','sambung11','sambung12',
                  //ganti
                  'ganti1','ganti2','ganti3','ganti4','ganti5','ganti6','ganti7','ganti8','ganti9','ganti10','ganti11','ganti12',
                  //lainnya
                  'databill','databilling','jumlahtutup','datatutupjumlah','datahitungp','dataz','datahitunganganti','datatest',
                  'totdil','totdilcount','datanon','jumlahnon','cobaa','cobacabang','coba','datadil','data','datat','datas','datac',
                  'categories','jumlahdil','datahitungan'));
                 
                 
    }
     public function test()
     {
      $datahitungh = DB::table('sambung as t')
      ->join('tbl_dil as h','h.id','=','t.id_dil')
       ->select('t.*','h.*');
      
          $datalaporan = $datahitungh
          ->where('status','=',1) 
          ->whereMonth('tanggal_sambung', Carbon::now()->month)
          ->count();
          // ->get();
          // dd($dataz);
      return view('test',compact('datalaporan'));
    }
    
}
