<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use App\Models\DilModel;
use App\Models\Penutupan;

use Illuminate\Http\Request;
use App\Exports\PenutupanExport;
use App\Imports\PenutupanImport;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class PenutupanController extends Controller
{
  
    public function index(Request $request)
    {

        //ilmu baru pencarian dari joint table
        if ($request->has('search')) {
            $data = DB::table('penutupan')
            ->leftJoin('tbl_dil','penutupan.id_dil','=','tbl_dil.id')
            ->where('id_dil','LIKE','%'.$request->search.'%')
            ->simplePaginate(100);
        } else {
            $data = DB::table('penutupan')
            // ->select([
            //     'penutupan.id','penutupan.status','penutupan.nama_sekarang','penutupan.nama_pemilik','penutupan.cabang'
            // ])
                   ->leftJoin('tbl_dil','penutupan.id_dil','=','tbl_dil.id')
                   // jangan select id parentnya karena akan terpanggil parent nya
                   // kalou manggil data all function makan callbact function null(*)
                    ->select('penutupan.id','penutupan.tanggal_tutup','penutupan.alasan','penutupan.id_dil','tbl_dil.status','tbl_dil.nama_sekarang','tbl_dil.nama_pemilik','tbl_dil.id_merek','tbl_dil.segel','tbl_dil.cabang')
                    ->orderBy('id','desc')
                    ->simplePaginate(100);
                    // dd($request->all());
        }
        
       
        
        //   dd($data);
        return view('penutupan.index', compact('data'))->render();
    }
    public function add()
    {
        return view('penutupan.v_add');
        
    }
    public function insert(Request $request)
    {
        // ini cara baru tapi mau coba lama dulu
       Penutupan::create($request->all())
       ->latest()
        ->first();
     
        // ini cara lama
        // $data = new DilModel();
        // $data::create($request->all());
        
        return redirect()->route('penutupan')->with('success','data penutupan berhasil ditambahkan');
    }
    public function edit($id)
    {
        $data = Penutupan::find($id);
        return view('penutupan.edit', compact('data'));
    }
    public function update(Request $request, $id)
    {
        $data = Penutupan::find($id);
        $data->update($request->all());

        return redirect()->route('penutupan')->with('success','data penutupan berhasil dirubah');
    }
    // public function hapus(Penutupan $penutupan)
    // $data = Penutupan::find($penutupan->id);
    public function hapus($id)
    {

        
        $data = Penutupan::find($id);
        $data->delete();

        return redirect()->route('penutupan')->with('success','data penutupan berhasil dithapus');
    }
    // public function index()
    // {
    //     $data = DB::table('penutupan')
    //     ->leftJoin('tbl_dil','penutupan.id_dil','=','tbl_dil.id')
    //     //                // jangan select id nya karena akan terpanggil parent nya
    //     ->select('penutupan.id','tbl_dil.no_sambungan','tbl_dil.nama')
    //     ->get();
    //     $dataa = DB::table('penutupan')
    //     ->leftJoin('tbl_dil','penutupan.id_dil','=','tbl_dil.id')
    //     // jangan select id nya karena akan terpanggil parent nya
    //      ->select('tbl_dil.id')
    //      ->get();
    //     $datab = DB::table('penutupan')
    //     ->leftJoin('tbl_dil','penutupan.id_dil','=','tbl_dil.id')
    //     // jangan select id nya karena akan terpanggil parent nya
    //     ->select('penutupan.id','tbl_dil.no_sambungan','tbl_dil.nama')
    //      ->get();
    //   if ($dataa == $datab) {
    
    //   } 
    // return view('penutupan.index', compact('data','dataa','datab'));
         
    // }
    public function hitung()
    {
        // $tanggal = date('Y-m-d');
        $datahitung = DB::table('penutupan as a')
        ->join('tbl_dil as b','a.id_dil','=','b.id')
        // jangan select id parentnya karena akan terpanggil parent nya
        // ->select('a.id','a.tanggal_tutup','a.alasan','a.id_dil','b.status','b.nama_sekarang','b.nama_pemilik','b.id_merek','b.segel');
        
         ->select('a.*','b.status','b.nama_sekarang','b.nama_pemilik','b.id_merek','b.segel','b.cabang');
        //  ->get();
        //  ->orderBy('id','desc')
         
            // ->where('a.tanggal_tutup','=',"2023-03-07")
            $data = $datahitung
            ->where('b.status','=',1) 
            // ->orderBy('tanggal_tutup')
            // ->where('b.cabang','=', 6) 
            // oke ini
        //     ->groupBy(function($val) {
        //         return Carbon::parse($val->tanggal_tutup)->format('m');
        //  });
        // sampesini
            // ->GroupBy(DB::raw("MONTH(tanggal_tutup)"))
            // ->pluck('datahitung');
            ->whereMonth('tanggal_tutup', Carbon::now()->month)

            ->count();
            
        //    dd($data);
            
            // return($data);
            
    //     dd($data, $tanggal);
    return view('v_home',compact('data'));
    }
    public function exportexcelp()
    {
        return Excel::download(new PenutupanExport, 'dataPenutupan.xlsx');
    }
    public function importexcelp(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);
        $data = $request->file('file');
        $namafile = $data->getClientOriginalName();
        $data->move('Pelanggan',$namafile);
        
    
        $import = Excel::import(new PenutupanImport, \public_path('/Pelanggan/'. $namafile));
     
        if($import) {
            //redirect
            return redirect()->route('penutupan')->with(['success' => 'Data Berhasil Diimport!']);
        } else {
            //redirect
            return redirect()->route('penutupan')->with(['error' => 'Data Gagal Diimport!']);
        }
    }
    
    
}
