<?php

namespace App\Http\Controllers;

use App\Models\Perbaikan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class PerbaikanController extends Controller
{
    public function index(Request $request)
    {

        //ilmu baru pencarian dari joint table
        if ($request->has('search')) {
            $data = DB::table('perbaikan')
            ->leftJoin('tbl_dil','perbaikan.id_dil','=','tbl_dil.id')
            ->where('id_dil','LIKE','%'.$request->search.'%')
            ->simplePaginate(100);
        } else {
            $data = DB::table('perbaikan')
            // ->select([
            //     'perbaikan.id','perbaikan.status','perbaikan.nama_sekarang','perbaikan.nama_pemilik','perbaikan.cabang'
            // ])
                   ->leftJoin('tbl_dil','perbaikan.id_dil','=','tbl_dil.id')
                   // jangan select id parentnya karena akan terpanggil parent nya
                   // kalou manggil data all function makan callbact function null(*)
                    ->select('perbaikan.id','perbaikan.tanggal_perbaikan','perbaikan.keterangan','perbaikan.id_dil','tbl_dil.status','tbl_dil.nama_sekarang','tbl_dil.nama_pemilik','tbl_dil.id_merek','tbl_dil.kondisi_wm','tbl_dil.id_cabang')
                    ->orderBy('id','desc')
                    ->simplePaginate(100);
                    // dd($request->all());
        }
        
       
        
        //   dd($data);
        return view('perbaikan.index', compact('data'))->render();
    }
    public function add()
    {
        return view('perbaikan.v_add');
        
    }
    public function insert(Request $request)
    {
        // ini cara baru tapi mau coba lama dulu
       Perbaikan::create($request->all())
       ->latest()
        ->first();
     
        // ini cara lama
        // $data = new DilModel();
        // $data::create($request->all());
        
        return redirect()->route('perbaikan')->with('success','data perbaikan berhasil ditambahkan');
    }
    public function edit($id)
    {
        $data = Perbaikan::find($id);
        return view('perbaikan.edit', compact('data'));
    }
    public function update(Request $request, $id)
    {
        $data = Perbaikan::find($id);
        $data->update($request->all());

        return redirect()->route('perbaikan')->with('success','data perbaikan berhasil dirubah');
    }
    // public function hapus(perbaikan $perbaikan)
    // $data = perbaikan::find($perbaikan->id);
    public function hapus($id)
    {

        
        $data = Perbaikan::find($id);
        $data->delete();

        return redirect()->route('perbaikan')->with('success','data perbaikan berhasil dihapus');
    }
  
   
}
