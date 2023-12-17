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
            'a.id','a.status','a.cabang','a.no_rekening','a.nama_sekarang','a.blok','a.dusun','a.kecamatan','a.status_milik','a.jml_jiwa_tetap','a.jml_jiwa_tidak_tetap','tanggal_file',
            'a.segel','a.stop_kran','a.ceck_valve','a.kopling','a.plugran','a.box','a.sumber_lain','a.jenisusaha','a.id_merek',
            'b.merek','c.tanggal_tutup','c.alasan','d.tanggal_ganti','d.no_wmbaru','e.tanggal_sambung','e.alasan'
        ])
       
        ->get();
        $dilcount = $dil->count();
        // dd($dil);
        return view('report.index',compact('dil','dilcount'));
    }
    public function search(Request $request){
        $cabang = $request->cabang;
        $dil = DB::table('tbl_dil as a')
        ->leftJoin('merek as b','b.id','=','a.id_merek')
        ->leftJoin('penutupan as c','c.id_dil','=','a.id')
        ->leftJoin('ganti as d','d.id_dil','=','a.id')
        ->leftJoin('sambung as e','e.id_dil','=','a.id')

        ->select([
            'a.id','a.status','a.cabang','a.no_rekening','a.nama_sekarang','a.blok','a.dusun','a.kecamatan','a.status_milik','a.jml_jiwa_tetap','a.jml_jiwa_tidak_tetap','tanggal_file',
            'a.segel','a.stop_kran','a.ceck_valve','a.kopling','a.plugran','a.box','a.sumber_lain','a.jenisusaha','a.id_merek',
            'b.merek','c.tanggal_tutup','c.alasan','d.tanggal_ganti','d.no_wmbaru','e.tanggal_sambung','e.alasan'
        ])
        ->get();
        $dilcount = $dil->count();
        if ($request->cabang==10) {
            $dil = DB::table('tbl_dil as a')
        ->leftJoin('merek as b','b.id','=','a.id_merek')
        ->leftJoin('penutupan as c','c.id_dil','=','a.id')
        ->leftJoin('ganti as d','d.id_dil','=','a.id')
        ->leftJoin('sambung as e','e.id_dil','=','a.id')

        ->select([
            'a.id','a.status','a.cabang','a.no_rekening','a.nama_sekarang','a.blok','a.dusun','a.kecamatan','a.status_milik','a.jml_jiwa_tetap','a.jml_jiwa_tidak_tetap','tanggal_file',
            'a.segel','a.stop_kran','a.ceck_valve','a.kopling','a.plugran','a.box','a.sumber_lain','a.jenisusaha','a.id_merek',
            'b.merek','c.tanggal_tutup','c.alasan','d.tanggal_ganti','d.no_wmbaru','e.tanggal_sambung','e.alasan'
        ])
        ->where('cabang','=',10)
        ->get();
        $dilcount = $dil->count();
        } elseif($request->cabang==3) {
            $dil = DB::table('tbl_dil as a')->leftJoin('merek as b','b.id','=','a.id_merek')->leftJoin('penutupan as c','c.id_dil','=','a.id')->leftJoin('ganti as d','d.id_dil','=','a.id')
            ->leftJoin('sambung as e','e.id_dil','=','a.id')
            ->select([
                'a.id','a.status','a.cabang','a.no_rekening','a.nama_sekarang','a.blok','a.dusun','a.kecamatan','a.status_milik','a.jml_jiwa_tetap','a.jml_jiwa_tidak_tetap','tanggal_file',
                'a.segel','a.stop_kran','a.ceck_valve','a.kopling','a.plugran','a.box','a.sumber_lain','a.jenisusaha','a.id_merek',
                'b.merek','c.tanggal_tutup','c.alasan','d.tanggal_ganti','d.no_wmbaru','e.tanggal_sambung','e.alasan'
            ])
            ->where('cabang','=',3)
            
            ->get();
            $dilcount = $dil->count();
            // dd($dilcount);
        }elseif($request->cabang==12) {
            $dil = DB::table('tbl_dil as a')->leftJoin('merek as b','b.id','=','a.id_merek')->leftJoin('penutupan as c','c.id_dil','=','a.id')->leftJoin('ganti as d','d.id_dil','=','a.id')
            ->leftJoin('sambung as e','e.id_dil','=','a.id')
            ->select([
                'a.id','a.status','a.cabang','a.no_rekening','a.nama_sekarang','a.blok','a.dusun','a.kecamatan','a.status_milik','a.jml_jiwa_tetap','a.jml_jiwa_tidak_tetap','tanggal_file',
                'a.segel','a.stop_kran','a.ceck_valve','a.kopling','a.plugran','a.box','a.sumber_lain','a.jenisusaha','a.id_merek',
                'b.merek','c.tanggal_tutup','c.alasan','d.tanggal_ganti','d.no_wmbaru','e.tanggal_sambung','e.alasan'
            ])
            ->where('cabang','=',12)
            
            ->get();
            $dilcount = $dil->count();
            // dd($dilcount);
        }elseif($request->cabang==14) {
            $dil = DB::table('tbl_dil as a')->leftJoin('merek as b','b.id','=','a.id_merek')->leftJoin('penutupan as c','c.id_dil','=','a.id')->leftJoin('ganti as d','d.id_dil','=','a.id')
            ->leftJoin('sambung as e','e.id_dil','=','a.id')
            ->select([
                'a.id','a.status','a.cabang','a.no_rekening','a.nama_sekarang','a.blok','a.dusun','a.kecamatan','a.status_milik','a.jml_jiwa_tetap','a.jml_jiwa_tidak_tetap','tanggal_file',
                'a.segel','a.stop_kran','a.ceck_valve','a.kopling','a.plugran','a.box','a.sumber_lain','a.jenisusaha','a.id_merek',
                'b.merek','c.tanggal_tutup','c.alasan','d.tanggal_ganti','d.no_wmbaru','e.tanggal_sambung','e.alasan'
            ])
            ->where('cabang','=',14)
            
            ->get();
            $dilcount = $dil->count();
            // dd($dilcount);
        }elseif($request->cabang==6) {
            $dil = DB::table('tbl_dil as a')->leftJoin('merek as b','b.id','=','a.id_merek')->leftJoin('penutupan as c','c.id_dil','=','a.id')->leftJoin('ganti as d','d.id_dil','=','a.id')
            ->leftJoin('sambung as e','e.id_dil','=','a.id')
            ->select([
                'a.id','a.status','a.cabang','a.no_rekening','a.nama_sekarang','a.blok','a.dusun','a.kecamatan','a.status_milik','a.jml_jiwa_tetap','a.jml_jiwa_tidak_tetap','tanggal_file',
                'a.segel','a.stop_kran','a.ceck_valve','a.kopling','a.plugran','a.box','a.sumber_lain','a.jenisusaha','a.id_merek',
                'b.merek','c.tanggal_tutup','c.alasan','d.tanggal_ganti','d.no_wmbaru','e.tanggal_sambung','e.alasan'
            ])
            ->where('cabang','=',6)
            
            ->get();
            $dilcount = $dil->count();
            // dd($dilcount);
        }elseif($request->cabang==13) {
            $dil = DB::table('tbl_dil as a')->leftJoin('merek as b','b.id','=','a.id_merek')->leftJoin('penutupan as c','c.id_dil','=','a.id')->leftJoin('ganti as d','d.id_dil','=','a.id')
            ->leftJoin('sambung as e','e.id_dil','=','a.id')
            ->select([
                'a.id','a.status','a.cabang','a.no_rekening','a.nama_sekarang','a.blok','a.dusun','a.kecamatan','a.status_milik','a.jml_jiwa_tetap','a.jml_jiwa_tidak_tetap','tanggal_file',
                'a.segel','a.stop_kran','a.ceck_valve','a.kopling','a.plugran','a.box','a.sumber_lain','a.jenisusaha','a.id_merek',
                'b.merek','c.tanggal_tutup','c.alasan','d.tanggal_ganti','d.no_wmbaru','e.tanggal_sambung','e.alasan'
            ])
            ->where('cabang','=',13)
            
            ->get();
            $dilcount = $dil->count();
            // dd($dilcount);
        }elseif($request->cabang==1) {
            $dil = DB::table('tbl_dil as a')->leftJoin('merek as b','b.id','=','a.id_merek')->leftJoin('penutupan as c','c.id_dil','=','a.id')->leftJoin('ganti as d','d.id_dil','=','a.id')
            ->leftJoin('sambung as e','e.id_dil','=','a.id')
            ->select([
                'a.id','a.status','a.cabang','a.no_rekening','a.nama_sekarang','a.blok','a.dusun','a.kecamatan','a.status_milik','a.jml_jiwa_tetap','a.jml_jiwa_tidak_tetap','tanggal_file',
                'a.segel','a.stop_kran','a.ceck_valve','a.kopling','a.plugran','a.box','a.sumber_lain','a.jenisusaha','a.id_merek',
                'b.merek','c.tanggal_tutup','c.alasan','d.tanggal_ganti','d.no_wmbaru','e.tanggal_sambung','e.alasan'
            ])
            ->where('cabang','=',1)
            
            ->get();
            $dilcount = $dil->count();
            // dd($dilcount);
        }elseif($request->cabang==7) {
            $dil = DB::table('tbl_dil as a')->leftJoin('merek as b','b.id','=','a.id_merek')->leftJoin('penutupan as c','c.id_dil','=','a.id')->leftJoin('ganti as d','d.id_dil','=','a.id')
            ->leftJoin('sambung as e','e.id_dil','=','a.id')
            ->select([
                'a.id','a.status','a.cabang','a.no_rekening','a.nama_sekarang','a.blok','a.dusun','a.kecamatan','a.status_milik','a.jml_jiwa_tetap','a.jml_jiwa_tidak_tetap','tanggal_file',
                'a.segel','a.stop_kran','a.ceck_valve','a.kopling','a.plugran','a.box','a.sumber_lain','a.jenisusaha','a.id_merek',
                'b.merek','c.tanggal_tutup','c.alasan','d.tanggal_ganti','d.no_wmbaru','e.tanggal_sambung','e.alasan'
            ])
            ->where('cabang','=',7)
            
            ->get();
            $dilcount = $dil->count();
            // dd($dilcount);
        }elseif($request->cabang==8) {
            $dil = DB::table('tbl_dil as a')->leftJoin('merek as b','b.id','=','a.id_merek')->leftJoin('penutupan as c','c.id_dil','=','a.id')->leftJoin('ganti as d','d.id_dil','=','a.id')
            ->leftJoin('sambung as e','e.id_dil','=','a.id')
            ->select([
                'a.id','a.status','a.cabang','a.no_rekening','a.nama_sekarang','a.blok','a.dusun','a.kecamatan','a.status_milik','a.jml_jiwa_tetap','a.jml_jiwa_tidak_tetap','tanggal_file',
                'a.segel','a.stop_kran','a.ceck_valve','a.kopling','a.plugran','a.box','a.sumber_lain','a.jenisusaha','a.id_merek',
                'b.merek','c.tanggal_tutup','c.alasan','d.tanggal_ganti','d.no_wmbaru','e.tanggal_sambung','e.alasan'
            ])
            ->where('cabang','=',8)
            
            ->get();
            $dilcount = $dil->count();
            // dd($dilcount);
        }elseif($request->cabang==2) {
            $dil = DB::table('tbl_dil as a')->leftJoin('merek as b','b.id','=','a.id_merek')->leftJoin('penutupan as c','c.id_dil','=','a.id')->leftJoin('ganti as d','d.id_dil','=','a.id')
            ->leftJoin('sambung as e','e.id_dil','=','a.id')
            ->select([
                'a.id','a.status','a.cabang','a.no_rekening','a.nama_sekarang','a.blok','a.dusun','a.kecamatan','a.status_milik','a.jml_jiwa_tetap','a.jml_jiwa_tidak_tetap','tanggal_file',
                'a.segel','a.stop_kran','a.ceck_valve','a.kopling','a.plugran','a.box','a.sumber_lain','a.jenisusaha','a.id_merek',
                'b.merek','c.tanggal_tutup','c.alasan','d.tanggal_ganti','d.no_wmbaru','e.tanggal_sambung','e.alasan'
            ])
            ->where('cabang','=',2)
            
            ->get();
            $dilcount = $dil->count();
            // dd($dilcount);
        }elseif($request->cabang==4) {
            $dil = DB::table('tbl_dil as a')->leftJoin('merek as b','b.id','=','a.id_merek')->leftJoin('penutupan as c','c.id_dil','=','a.id')->leftJoin('ganti as d','d.id_dil','=','a.id')
            ->leftJoin('sambung as e','e.id_dil','=','a.id')
            ->select([
                'a.id','a.status','a.cabang','a.no_rekening','a.nama_sekarang','a.blok','a.dusun','a.kecamatan','a.status_milik','a.jml_jiwa_tetap','a.jml_jiwa_tidak_tetap','tanggal_file',
                'a.segel','a.stop_kran','a.ceck_valve','a.kopling','a.plugran','a.box','a.sumber_lain','a.jenisusaha','a.id_merek',
                'b.merek','c.tanggal_tutup','c.alasan','d.tanggal_ganti','d.no_wmbaru','e.tanggal_sambung','e.alasan'
            ])
            ->where('cabang','=',4)
            
            ->get();
            $dilcount = $dil->count();
            // dd($dilcount);
        }elseif($request->cabang==11) {
            $dil = DB::table('tbl_dil as a')->leftJoin('merek as b','b.id','=','a.id_merek')->leftJoin('penutupan as c','c.id_dil','=','a.id')->leftJoin('ganti as d','d.id_dil','=','a.id')
            ->leftJoin('sambung as e','e.id_dil','=','a.id')
            ->select([
                'a.id','a.status','a.cabang','a.no_rekening','a.nama_sekarang','a.blok','a.dusun','a.kecamatan','a.status_milik','a.jml_jiwa_tetap','a.jml_jiwa_tidak_tetap','tanggal_file',
                'a.segel','a.stop_kran','a.ceck_valve','a.kopling','a.plugran','a.box','a.sumber_lain','a.jenisusaha','a.id_merek',
                'b.merek','c.tanggal_tutup','c.alasan','d.tanggal_ganti','d.no_wmbaru','e.tanggal_sambung','e.alasan'
            ])
            ->where('cabang','=',11)
            
            ->get();
            $dilcount = $dil->count();
            // dd($dilcount);
        }elseif($request->cabang==31) {
            $dil = DB::table('tbl_dil as a')->leftJoin('merek as b','b.id','=','a.id_merek')->leftJoin('penutupan as c','c.id_dil','=','a.id')->leftJoin('ganti as d','d.id_dil','=','a.id')
            ->leftJoin('sambung as e','e.id_dil','=','a.id')
            ->select([
                'a.id','a.status','a.cabang','a.no_rekening','a.nama_sekarang','a.blok','a.dusun','a.kecamatan','a.status_milik','a.jml_jiwa_tetap','a.jml_jiwa_tidak_tetap','tanggal_file',
                'a.segel','a.stop_kran','a.ceck_valve','a.kopling','a.plugran','a.box','a.sumber_lain','a.jenisusaha','a.id_merek',
                'b.merek','c.tanggal_tutup','c.alasan','d.tanggal_ganti','d.no_wmbaru','e.tanggal_sambung','e.alasan'
            ])
            ->where('cabang','=',31)
            
            ->get();
            $dilcount = $dil->count();
            // dd($dilcount);
        }elseif($request->cabang==5) {
            $dil = DB::table('tbl_dil as a')->leftJoin('merek as b','b.id','=','a.id_merek')->leftJoin('penutupan as c','c.id_dil','=','a.id')->leftJoin('ganti as d','d.id_dil','=','a.id')
            ->leftJoin('sambung as e','e.id_dil','=','a.id')
            ->select([
                'a.id','a.status','a.cabang','a.no_rekening','a.nama_sekarang','a.blok','a.dusun','a.kecamatan','a.status_milik','a.jml_jiwa_tetap','a.jml_jiwa_tidak_tetap','tanggal_file',
                'a.segel','a.stop_kran','a.ceck_valve','a.kopling','a.plugran','a.box','a.sumber_lain','a.jenisusaha','a.id_merek',
                'b.merek','c.tanggal_tutup','c.alasan','d.tanggal_ganti','d.no_wmbaru','e.tanggal_sambung','e.alasan'
            ])
            ->where('cabang','=',5)
            
            ->get();
            $dilcount = $dil->count();
            // dd($dilcount);
        }elseif($request->cabang==40) {
            $dil = DB::table('tbl_dil as a')->leftJoin('merek as b','b.id','=','a.id_merek')->leftJoin('penutupan as c','c.id_dil','=','a.id')->leftJoin('ganti as d','d.id_dil','=','a.id')
            ->leftJoin('sambung as e','e.id_dil','=','a.id')
            ->select([
                'a.id','a.status','a.cabang','a.no_rekening','a.nama_sekarang','a.blok','a.dusun','a.kecamatan','a.status_milik','a.jml_jiwa_tetap','a.jml_jiwa_tidak_tetap','tanggal_file',
                'a.segel','a.stop_kran','a.ceck_valve','a.kopling','a.plugran','a.box','a.sumber_lain','a.jenisusaha','a.id_merek',
                'b.merek','c.tanggal_tutup','c.alasan','d.tanggal_ganti','d.no_wmbaru','e.tanggal_sambung','e.alasan'
            ])
            ->where('cabang','=',40)
            
            ->get();
            $dilcount = $dil->count();
            // dd($dilcount);
        }
            // $dilcount = $dil->count();
        return view('report.index',compact('dil','cabang','dilcount'));
    }
}
   

