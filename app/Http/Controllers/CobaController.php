<?php

namespace App\Http\Controllers;
use App\Models\Coba;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CobaController extends Controller
{
    public function index(){

        // $data = DB::table('coba as a')
        // // ->rightJoin('penutupan as m','a.id_tutup','=','m.id')
        // // ->rightJoin('ganti as s','a.id_ganti','=','s.id')
        // // ->rightJoin('sambung as r','a.id_sambung','=','r.id')
        // // ->rightJoin('bbn as y','a.id_bbn','=','y.id')
        // // ->rightJoin('tbl_dil as u','a.id_dil','=','u.id')
                    
        // // ->select([
        // //     'a.*','m.*', 's.*','r.*','y.*','u.*'
        // // ])
        
        // ->get();
        return view('test');
    }
  
        
}
