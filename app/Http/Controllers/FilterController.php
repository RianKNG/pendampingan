<?php

namespace App\Http\Controllers;


use App\Models\Merek;
use App\Models\DilModel;
use App\Models\Golongan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class FilterController extends Controller
{
    public function index(Request $request){


        $dil = DB::table('tbl_dil as d');
        $mer = Merek::all();
        $gol = Golongan::all();
        //untuk nama
       $dil->when($request->segel, function($query) use ($request){
           return $query->where('segel','like','%'.$request->segel.'%');
       });
       //untuk cabang
       $dil->when($request->cabang, function($query) use ($request){
        return $query->where('cabang','like','%'.$request->cabang.'%');
    });




        $dil = $dil
        
        ->select([
            'd.id','d.cabang','d.status','d.no_rekening','d.nama_sekarang','d.nama_pemilik','d.alamat','d.status_milik',
            'd.jml_jiwa_tetap','d.jml_jiwa_tidak_tetap','d.angka','d.segel','kondisi_wm','d.stop_kran','d.ceck_valve','d.kopling','d.plugran',
            'd.box','d.plugran','d.box','d.usaha','d.sumber_lain','d.no_seri','d.jenis_usaha','d.tanggal_pasang','d.tanggal_file','d.id_golongan',
            'g.nama_golongan','g.kode','s.nama_baru','p.alasan','m.merek',
        ])
        ->Join('merek as m','d.id_merek','=','m.id')
        ->Join('golongan as g','d.id_golongan','=','g.id')
        ->leftJoin('bbn as s','s.id_dil','=','d.id')
        ->leftJoin('penutupan as p','p.alasan','=','d.id')
        ->simplePaginate(100);
        // ->get();
       
         return view('filtering',compact('dil'))->render();
    }
}
