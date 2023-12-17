<?php

namespace App\Http\Controllers;

use App\Models\DilModel;
use App\Models\Penutupan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index(Request $request)
    {
  
               
       
        $dil = DB::table('tbl_dil as a')
        ->leftJoin('merek as b','b.id','=','a.id_merek')
        ->leftJoin('penutupan as c','c.id_dil','=','a.id')
        ->leftJoin('ganti as d','d.id_dil','=','a.id')
        ->leftJoin('sambung as e','e.id_dil','=','a.id')

        ->select([
            'a.id','a.status','a.cabang','a.no_rekening','a.nama_sekarang','a.dusun','a.kecamatan','a.status_milik','a.jml_jiwa_tetap','a.jml_jiwa_tidak_tetap','tanggal_file',
            'a.segel','kondisi_wm','a.stop_kran','a.ceck_valve','a.kopling','a.plugran','a.box','a.sumber_lain','a.jenisusaha','a.id_merek',
            'b.merek','c.tanggal_tutup','c.alasan','d.tanggal_ganti','d.no_wmbaru','e.tanggal_sambung','e.alasan'
        ])
       
        ->get();
        $count = $dil->count();

        return view('report.index',compact('dil','count'));
    }
    public function search(Request $request){
       
       
        $dil = DB::table('tbl_dil as a')
        ->leftJoin('merek as b','b.id','=','a.id_merek')
        ->leftJoin('penutupan as c','c.id_dil','=','a.id')
        ->leftJoin('ganti as d','d.id_dil','=','a.id')
        ->leftJoin('sambung as e','e.id_dil','=','a.id')

        ->select([
            'a.id','a.status','a.cabang','a.no_rekening','a.nama_sekarang','a.dusun','a.kecamatan','a.status_milik','a.jml_jiwa_tetap','a.jml_jiwa_tidak_tetap','tanggal_file',
            'a.segel','kondisi_wm','a.stop_kran','a.ceck_valve','a.kopling','a.plugran','a.box','a.sumber_lain','a.jenisusaha','a.id_merek',
            'b.merek','c.tanggal_tutup','c.alasan','d.tanggal_ganti','d.no_wmbaru','e.tanggal_sambung','e.alasan'
        ])
       
        ->get();
      //search By Id
      if($request->cabang)
    
      {
        $dil = DB::table('tbl_dil as a')
        ->leftJoin('merek as b','b.id','=','a.id_merek')
        ->leftJoin('penutupan as c','c.id_dil','=','a.id')
        ->leftJoin('ganti as d','d.id_dil','=','a.id')
        ->leftJoin('sambung as e','e.id_dil','=','a.id')

        ->select([
            'a.id','a.status','a.cabang','a.no_rekening','a.nama_sekarang','a.dusun','a.kecamatan','a.status_milik','a.jml_jiwa_tetap','a.jml_jiwa_tidak_tetap','tanggal_file',
            'a.segel','kondisi_wm','a.stop_kran','a.ceck_valve','a.kopling','a.plugran','a.box','a.sumber_lain','a.jenisusaha','a.id_merek',
            'b.merek','c.tanggal_tutup','c.alasan','d.tanggal_ganti','d.no_wmbaru','e.tanggal_sambung','e.alasan'
        ])
        ->where('a.cabang','Like','%' .$request->cabang. '%')
        ->get();
        $count = $dil->count();
      }
       //search By status
       if($request->status)
       {
        $dil = DB::table('tbl_dil as a')
        ->leftJoin('merek as b','b.id','=','a.id_merek')
        ->leftJoin('penutupan as c','c.id_dil','=','a.id')
        ->leftJoin('ganti as d','d.id_dil','=','a.id')
        ->leftJoin('sambung as e','e.id_dil','=','a.id')

        ->select([
            'a.id','a.status','a.cabang','a.no_rekening','a.nama_sekarang','a.dusun','a.kecamatan','a.status_milik','a.jml_jiwa_tetap','a.jml_jiwa_tidak_tetap','tanggal_file',
            'a.segel','kondisi_wm','a.stop_kran','a.ceck_valve','a.kopling','a.plugran','a.box','a.sumber_lain','a.jenisusaha','a.id_merek',
            'b.merek','c.tanggal_tutup','c.alasan','d.tanggal_ganti','d.no_wmbaru','e.tanggal_sambung','e.alasan'
        ])
        ->where('a.status','Like','%' .$request->status. '%')
        ->get();
        $count = $dil->count();
       }
     
       //search By  cabang dan cabang
       if($request->cabang && $request->status)
       {
        $dil = DB::table('tbl_dil as a')
        ->leftJoin('merek as b','b.id','=','a.id_merek')
        ->leftJoin('penutupan as c','c.id_dil','=','a.id')
        ->leftJoin('ganti as d','d.id_dil','=','a.id')
        ->leftJoin('sambung as e','e.id_dil','=','a.id')

        ->select([
            'a.id','a.status','a.cabang','a.no_rekening','a.nama_sekarang','a.dusun','a.kecamatan','a.status_milik','a.jml_jiwa_tetap','a.jml_jiwa_tidak_tetap','tanggal_file',
            'a.segel','kondisi_wm','a.stop_kran','a.ceck_valve','a.kopling','a.plugran','a.box','a.sumber_lain','a.jenisusaha','a.id_merek',
            'b.merek','c.tanggal_tutup','c.alasan','d.tanggal_ganti','d.no_wmbaru','e.tanggal_sambung','e.alasan'
        ])
        ->where('a.cabang','Like','%' .$request->cabang. '%')
        ->where('a.status','Like','%' .$request->status. '%')
        ->get();
        $count = $dil->count();
       }
         //search By cabang, cabang  dan status 
        if($request->cabang && $request->status && $request->status)
        {
         $dil = DB::table('tbl_dil as a')
         ->leftJoin('merek as b','b.id','=','a.id_merek')
         ->leftJoin('penutupan as c','c.id_dil','=','a.id')
         ->leftJoin('ganti as d','d.id_dil','=','a.id')
         ->leftJoin('sambung as e','e.id_dil','=','a.id')
 
         ->select([
             'a.id','a.status','a.cabang','a.no_rekening','a.nama_sekarang','a.dusun','a.kecamatan','a.status_milik','a.jml_jiwa_tetap','a.jml_jiwa_tidak_tetap','tanggal_file',
             'a.segel','kondisi_wm','a.stop_kran','a.ceck_valve','a.kopling','a.plugran','a.box','a.sumber_lain','a.jenisusaha','a.id_merek',
             'b.merek','c.tanggal_tutup','c.alasan','d.tanggal_ganti','d.no_wmbaru','e.tanggal_sambung','e.alasan'
         ])
         ->where('a.cabang','Like','%' .$request->cabang. '%')
         ->where('a.status','Like','%' .$request->status. '%')
         ->where('a.status_milik','Like','%' .$request->status_milik. '%')
         ->get();
         $count = $dil->count();
        }
    //   dd($dil);
      return view('report.index',compact('dil','count'));
    }
}
   

