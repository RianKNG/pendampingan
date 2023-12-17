<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MasteKodeController extends Controller
{
    public function hitung()
    {
        $datahitung = DB::table('penutupan as a')
        ->join('tbl_dil as b','a.id_dil','=','b.id');
        // jangan select id parentnya karena akan terpanggil parent nya
        // ->select('a.id','a.tanggal_tutup','a.alasan','a.id_dil','b.status','b.nama_sekarang','b.nama_pemilik','b.id_merek','b.segel');
        
        //  ->select('a.*','b.status','b.nama_sekarang','b.nama_pemilik','b.id_merek','b.segel','b.cabang');
        //  ->orderBy('id','desc')
         
            // ->where('a.tanggal_tutup','=',"2023-03-07")
            $data = $datahitung
            // ->where('b.status','=',1)
            // ->dbRaw('b.cabang')
            ->where('b.status','=',1) 
            ->where('b.cabang','=', 6) 
            
           
            
            ->get();
            
        dd($data);
    }
}
