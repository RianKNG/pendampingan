<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Sambung;
use App\Models\Penutupan;
use App\Models\Bbn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use App\Helpers\Helper;
// use Illuminate\Support\Facades\Validator;

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
        //untuk tabel Dil Baru
        $tdatabill = DB::table('tbl_dil as a')
        ->select(DB::raw("(a.cabang)  as `cabang` "))
        ->groupBy(DB::raw("cabang"))
        ->GroupBy(DB::raw("Month(tanggal_file)"))
        ->whereYear('tanggal_file',Carbon::now()->format('Y'))
        ->pluck('cabang');
        $ttdatabill = DB::table('tbl_dil as a')
        ->select(DB::raw("count(a.tanggal_file)  as `cabang` "))
        ->groupBy(DB::raw("cabang"))
        ->GroupBy(DB::raw("Month(tanggal_file)"))
        ->whereYear('tanggal_file',Carbon::now()->format('Y'))
        ->pluck('cabang');
        $tttdatabill = DB::table('tbl_dil')
        ->select(DB::raw("MonthName(tanggal_file) as bulan "))
        ->GroupBy(DB::raw("cabang"))
        ->GroupBy(DB::raw("MonthName(tanggal_file)"))
        ->whereYear('tanggal_file',Carbon::now()->format('Y'))
        ->pluck('bulan');

      //data penutupan
      $jumlahtutup = DB::table('penutupan as a')
      ->join('tbl_dil as b','a.id_dil','=','b.id')
        ->select('a.*','b.*')
        ->whereMonth('tanggal_tutup', Carbon::now()->month)
        ->get();
        $datatutupjumlah = $jumlahtutup
        ->count();
        //untuk tabel Penutupan
        $pdatabill = DB::table('penutupan as a')
        ->join('tbl_dil as b','a.id_dil','=','b.id')
        ->select(DB::raw("(b.cabang)  as `cabang` "))
        ->groupBy(DB::raw("cabang"))
        ->GroupBy(DB::raw("Month(tanggal_tutup)"))
        ->whereYear('tanggal_tutup',Carbon::now()->format('Y'))
        ->pluck('cabang');
       
        $ppdatabill = DB::table('penutupan as a')
        ->join('tbl_dil as b','a.id_dil','=','b.id')
        ->select(DB::raw("count(a.tanggal_tutup)  as `cabang` "))
        ->groupBy(DB::raw("cabang"))
        ->GroupBy(DB::raw("Month(tanggal_tutup)"))
        ->whereYear('tanggal_file',Carbon::now()->format('Y'))
        ->pluck('cabang');
      
        $pppdatabill =  DB::table('penutupan as a')
        ->join('tbl_dil as b','a.id_dil','=','b.id')
        ->select(DB::raw("MonthName(tanggal_tutup) as bulan "))
        ->GroupBy(DB::raw("cabang"))
        ->GroupBy(DB::raw("MonthName(tanggal_tutup)"))
        ->whereYear('tanggal_file',Carbon::now()->format('Y'))
        ->pluck('bulan');
        
      //data Penyambungan
      $datahitungp = DB::table('sambung as t')
        ->join('tbl_dil as h','h.id','=','t.id_dil')
        ->select('t.*','h.*')
        ->whereMonth('tanggal_sambung', Carbon::now()->month)
        ->get();
      $dataz = $datahitungp
          ->count();
           //untuk tabel Penyambungan
        $sdatabill = DB::table('sambung as a')
        ->join('tbl_dil as b','a.id_dil','=','b.id')
        ->select(DB::raw("(b.cabang)  as `cabang` "))
        ->groupBy(DB::raw("cabang"))
        ->GroupBy(DB::raw("Month(tanggal_sambung)"))
        ->whereYear('tanggal_sambung',Carbon::now()->format('Y'))
        ->pluck('cabang');
       
        $ssdatabill = DB::table('sambung as a')
        ->join('tbl_dil as b','a.id_dil','=','b.id')
        ->select(DB::raw("count(a.tanggal_sambung)  as `cabang` "))
        ->groupBy(DB::raw("cabang"))
        ->GroupBy(DB::raw("Month(tanggal_sambung)"))
        ->whereYear('tanggal_file',Carbon::now()->format('Y'))
        ->pluck('cabang');
      
        $sssdatabill =  DB::table('sambung as a')
        ->join('tbl_dil as b','a.id_dil','=','b.id')
        ->select(DB::raw("MonthName(tanggal_sambung) as bulan "))
        ->GroupBy(DB::raw("cabang"))
        ->GroupBy(DB::raw("MonthName(tanggal_sambung)"))
        ->whereYear('tanggal_file',Carbon::now()->format('Y'))
        ->pluck('bulan');
        
      //data Penggantian
      $datahitunganganti = DB::table('ganti as a')
      ->join('tbl_dil as b','a.id_dil','=','b.id')
       ->select('a.*','b.*')
       ->whereMonth('tanggal_ganti', Carbon::now()->month)
       ->get();
      $datatest = $datahitunganganti
          ->count();
          
      //untuk tabel Penggantian
        $gdatabill = DB::table('ganti as a')
        ->join('tbl_dil as b','a.id_dil','=','b.id')
        ->select(DB::raw("(b.cabang)  as `cabang` "))
        ->groupBy(DB::raw("cabang"))
        ->GroupBy(DB::raw("Month(tanggal_ganti)"))
        ->whereYear('tanggal_ganti',Carbon::now()->format('Y'))
        ->pluck('cabang');
       
        $ggdatabill = DB::table('ganti as a')
        ->join('tbl_dil as b','a.id_dil','=','b.id')
        ->select(DB::raw("count(a.tanggal_ganti)  as `cabang` "))
        ->groupBy(DB::raw("cabang"))
        ->GroupBy(DB::raw("Month(tanggal_ganti)"))
        ->whereYear('tanggal_file',Carbon::now()->format('Y'))
        ->pluck('cabang');
       
        $gggdatabill =  DB::table('ganti as a')
        ->join('tbl_dil as b','a.id_dil','=','b.id')
        ->select(DB::raw("MonthName(tanggal_ganti) as bulan "))
        ->GroupBy(DB::raw("cabang"))
        ->GroupBy(DB::raw("MonthName(tanggal_ganti)"))
        ->whereYear('tanggal_file',Carbon::now()->format('Y'))
        ->pluck('bulan');
        
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
       ->whereStatus('2')
         ->get();
           $jumlahnon = $datanon->count();

      //untuk Total Dil
       $totdil = DB::table('tbl_dil as a')
         ->get();
           $totdilcount = $totdil->count();
            //jumlah Jiwa Dil
       $jmlt = DB::table('tbl_dil')
       ->sum('jml_jiwa_tetap');
       $jmltt = DB::table('tbl_dil')
       ->sum('jml_jiwa_tidak_tetap');

    


               //data Grafik DIL baru
            $grafik1 = DB::table('tbl_dil')->whereMonth('tanggal_file','01')->whereYear('tanggal_file',Carbon::now()->format('Y'))->count();
            $grafik2 = DB::table('tbl_dil')->whereMonth('tanggal_file','02')->whereYear('tanggal_file',Carbon::now()->format('Y'))->count();
            $grafik3 = DB::table('tbl_dil')->whereMonth('tanggal_file','03')->whereYear('tanggal_file',Carbon::now()->format('Y'))->count();
            $grafik4 = DB::table('tbl_dil')->whereMonth('tanggal_file','04')->whereYear('tanggal_file',Carbon::now()->format('Y'))->count();
            $grafik5 = DB::table('tbl_dil')->whereMonth('tanggal_file','05')->whereYear('tanggal_file',Carbon::now()->format('Y'))->count();
            $grafik6 = DB::table('tbl_dil')->whereMonth('tanggal_file','06')->whereYear('tanggal_file',Carbon::now()->format('Y'))->count();
            $grafik7 = DB::table('tbl_dil')->whereMonth('tanggal_file','07')->whereYear('tanggal_file',Carbon::now()->format('Y'))->count();
            $grafik8 = DB::table('tbl_dil')->whereMonth('tanggal_file','08')->whereYear('tanggal_file',Carbon::now()->format('Y'))->count();
            $grafik9 = DB::table('tbl_dil')->whereMonth('tanggal_file','09')->whereYear('tanggal_file',Carbon::now()->format('Y'))->count();
            $grafik10 = DB::table('tbl_dil')->whereMonth('tanggal_file','10')->whereYear('tanggal_file',Carbon::now()->format('Y'))->count();
            $grafik11 = DB::table('tbl_dil')->whereMonth('tanggal_file','11')->whereYear('tanggal_file',Carbon::now()->format('Y'))->count();
            $grafik12 = DB::table('tbl_dil')->whereMonth('tanggal_file','12')->whereYear('tanggal_file',Carbon::now()->format('Y'))->count();

            $tutup1 = DB::table('penutupan')->whereMonth('tanggal_tutup','01')->whereYear('tanggal_tutup',Carbon::now()->format('Y'))->count();
            $tutup2 = DB::table('penutupan')->whereMonth('tanggal_tutup','02')->whereYear('tanggal_tutup',Carbon::now()->format('Y'))->count();
            $tutup3 = DB::table('penutupan')->whereMonth('tanggal_tutup','03')->whereYear('tanggal_tutup',Carbon::now()->format('Y'))->count();
            $tutup4 = DB::table('penutupan')->whereMonth('tanggal_tutup','04')->whereYear('tanggal_tutup',Carbon::now()->format('Y'))->count();
            $tutup5 = DB::table('penutupan')->whereMonth('tanggal_tutup','05')->whereYear('tanggal_tutup',Carbon::now()->format('Y'))->count();
            $tutup6 = DB::table('penutupan')->whereMonth('tanggal_tutup','06')->whereYear('tanggal_tutup',Carbon::now()->format('Y'))->count();
            $tutup7 = DB::table('penutupan')->whereMonth('tanggal_tutup','07')->whereYear('tanggal_tutup',Carbon::now()->format('Y'))->count();
            $tutup8 = DB::table('penutupan')->whereMonth('tanggal_tutup','08')->whereYear('tanggal_tutup',Carbon::now()->format('Y'))->count();
            $tutup9 = DB::table('penutupan')->whereMonth('tanggal_tutup','09')->whereYear('tanggal_tutup',Carbon::now()->format('Y'))->count();
            $tutup10 = DB::table('penutupan')->whereMonth('tanggal_tutup','10')->whereYear('tanggal_tutup',Carbon::now()->format('Y'))->count();
            $tutup11 = DB::table('penutupan')->whereMonth('tanggal_tutup','11')->whereYear('tanggal_tutup',Carbon::now()->format('Y'))->count();
            $tutup12 = DB::table('penutupan')->whereMonth('tanggal_tutup','12')->whereYear('tanggal_tutup',Carbon::now()->format('Y'))->count();

            $sambung1 = DB::table('sambung')->whereMonth('tanggal_sambung','01')->whereYear('tanggal_sambung',Carbon::now()->format('Y'))->count();
            $sambung2 = DB::table('sambung')->whereMonth('tanggal_sambung','02')->whereYear('tanggal_sambung',Carbon::now()->format('Y'))->count();
            $sambung3 = DB::table('sambung')->whereMonth('tanggal_sambung','03')->whereYear('tanggal_sambung',Carbon::now()->format('Y'))->count();
            $sambung4 = DB::table('sambung')->whereMonth('tanggal_sambung','04')->whereYear('tanggal_sambung',Carbon::now()->format('Y'))->count();
            $sambung5 = DB::table('sambung')->whereMonth('tanggal_sambung','05')->whereYear('tanggal_sambung',Carbon::now()->format('Y'))->count();
            $sambung6 = DB::table('sambung')->whereMonth('tanggal_sambung','06')->whereYear('tanggal_sambung',Carbon::now()->format('Y'))->count();
            $sambung7 = DB::table('sambung')->whereMonth('tanggal_sambung','07')->whereYear('tanggal_sambung',Carbon::now()->format('Y'))->count();
            $sambung8 = DB::table('sambung')->whereMonth('tanggal_sambung','08')->whereYear('tanggal_sambung',Carbon::now()->format('Y'))->count();
            $sambung9 = DB::table('sambung')->whereMonth('tanggal_sambung','09')->whereYear('tanggal_sambung',Carbon::now()->format('Y'))->count();
            $sambung10 = DB::table('sambung')->whereMonth('tanggal_sambung','10')->whereYear('tanggal_sambung',Carbon::now()->format('Y'))->count();
            $sambung11 = DB::table('sambung')->whereMonth('tanggal_sambung','11')->whereYear('tanggal_sambung',Carbon::now()->format('Y'))->count();
            $sambung12 = DB::table('sambung')->whereMonth('tanggal_sambung','12')->whereYear('tanggal_sambung',Carbon::now()->format('Y'))->count();

            $ganti1 = DB::table('ganti')->whereMonth('tanggal_ganti','01')->whereYear('tanggal_ganti',Carbon::now()->format('Y'))->count();
            $ganti2 = DB::table('ganti')->whereMonth('tanggal_ganti','02')->whereYear('tanggal_ganti',Carbon::now()->format('Y'))->count();
            $ganti3 = DB::table('ganti')->whereMonth('tanggal_ganti','03')->whereYear('tanggal_ganti',Carbon::now()->format('Y'))->count();
            $ganti4 = DB::table('ganti')->whereMonth('tanggal_ganti','04')->whereYear('tanggal_ganti',Carbon::now()->format('Y'))->count();
            $ganti5 = DB::table('ganti')->whereMonth('tanggal_ganti','05')->whereYear('tanggal_ganti',Carbon::now()->format('Y'))->count();
            $ganti6 = DB::table('ganti')->whereMonth('tanggal_ganti','06')->whereYear('tanggal_ganti',Carbon::now()->format('Y'))->count();
            $ganti7 = DB::table('ganti')->whereMonth('tanggal_ganti','07')->whereYear('tanggal_ganti',Carbon::now()->format('Y'))->count();
            $ganti8 = DB::table('ganti')->whereMonth('tanggal_ganti','08')->whereYear('tanggal_ganti',Carbon::now()->format('Y'))->count();
            $ganti9 = DB::table('ganti')->whereMonth('tanggal_ganti','09')->whereYear('tanggal_ganti',Carbon::now()->format('Y'))->count();
            $ganti10 = DB::table('ganti')->whereMonth('tanggal_ganti','10')->whereYear('tanggal_ganti',Carbon::now()->format('Y'))->count();
            $ganti11 = DB::table('ganti')->whereMonth('tanggal_ganti','11')->whereYear('tanggal_ganti',Carbon::now()->format('Y'))->count();
            $ganti12 = DB::table('ganti')->whereMonth('tanggal_ganti','12')->whereYear('tanggal_ganti',Carbon::now()->format('Y'))->count();
            
             
              

               return view('v_home',compact(
                'grafik1', 'grafik2', 'grafik3','grafik4','grafik5','grafik6','grafik7','grafik8','grafik9','grafik10','grafik11','grafik12',
                //tutup
                'tutup1','tutup2','tutup3','tutup4','tutup5','tutup6','tutup7','tutup8','tutup9','tutup10','tutup11','tutup12',
                'pdatabill','ppdatabill','pppdatabill',
                //samubng
                'sambung1','sambung2','sambung3','sambung4','sambung5','sambung6','sambung7','sambung8','sambung9','sambung10','sambung11','sambung12',
                'sdatabill','ssdatabill','sssdatabill',
                 //ganti
                 'ganti1','ganti2','ganti3','ganti4','ganti5','ganti6','ganti7','ganti8','ganti9','ganti10','ganti11','ganti12',
                 'gdatabill','ggdatabill','gggdatabill',
                 //lainnya
                  'databill','databilling','jumlahtutup','datatutupjumlah','datahitungp','dataz','datahitunganganti','datatest','datahitungan','totdil',
                  'totdilcount','datanon','jumlahnon','coba','datat','categories','jumlahdil' ,'tdatabill','ttdatabill','tttdatabill','jmlt','jmltt'));
                 
                 
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
