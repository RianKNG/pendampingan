<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Merek;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WmController extends Controller
{
    public function index(Request $request)
    {
        $data = Merek::get();
          
        $tanggals = Carbon::now()->format('Y-m-d');
        $now = Carbon::now();
        $thnBln =  $now->year.$now->month;
        $cek = Merek::count();//3
        if ($cek == 0) {
            //jika tidak ada data atau kosong
            $urut = 101;
            $kode = 'NT'.$thnBln. $urut;
        } else {
            $ambil = Merek::all()->last();//202335
            //ambil 1 dijit dari belakang
            $urut = (int)substr($ambil->kode, -1 ) + 1;//36
            $kode = 'NT'.$thnBln. $urut;//NT
            

        }
        

        return view('watermeter.index',compact('data','kode'));
    }
    public function insert(Request $request)
    {
        Merek::create($request->all());
  
      
       
     
   
        return redirect()->route('watermeter')->with('success','data berhasil ditambahkan');

      
    }
    public function hapus($id)
    {
        $data = Merek::find($id);
        if ($data != null) {
            $data->delete();
            return redirect()->route('watermeter')->with(['message'=> 'Successfully deleted!!']);
        }
        return redirect()->route('watermeter')->with(['message'=> 'Wrong ID!!']);
      
        
      
      
    }
}
