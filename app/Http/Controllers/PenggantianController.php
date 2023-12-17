<?php

namespace App\Http\Controllers;

use App\Models\Ganti;
use App\Models\Merek;
use Illuminate\Http\Request;
use App\Exports\PenggantianExport;
use App\Imports\PenggantianImport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class PenggantianController extends Controller
{
    public function index(Request $request)
    
    {

        if ($request->has('search')) {
            $mer = Merek::all();
            $data = DB::table('ganti AS d')
            ->leftJoin('merek as m','d.id_merek','=','m.id')
            ->leftJoin('tbl_dil as n','d.id_dil','=','n.id')
            ->select([
                'd.id','d.tanggal_ganti','d.no_wmbaru','d.id_dil','d.id_merek','n.cabang'
            ])
            ->where('id_dil','LIKE','%'.$request->search.'%')
            ->simplePaginate(100);
                   
        } else {
            $mer = Merek::all();
            $data = DB::table('ganti AS d')
            ->leftJoin('merek as m','d.id_merek','=','m.id')
            ->leftJoin('tbl_dil as n','d.id_dil','=','n.id')
            ->select([
                'd.id','d.tanggal_ganti','d.no_wmbaru','d.id_dil','d.id_merek','n.cabang'
            ])
    
            ->simplePaginate(100);
        }
        
        // $data = DB::table('ganti as a')
        // ->select([
        //         'a.*','d.*'
        //     ])
        //         ->join('tbl_dil as d',function($join){
        //             $join->on('d.id','=','a.id_dil');
        //             // ->where('d.cabang','=',2);
        //         })
        //         ->get();
    

        return view('penggantian.v_index',compact('data','mer'))->render();
    }
    public function add()
    {
        return view('penggantian.v_penggantian');
    }
    public function insert(Request $request)
    {
        
        Ganti::create($request->all())
        ->latest()
        ->first();
        return redirect('penggantian')->with('success','data berhasil di tambahkan');
    }
    public function hapus($id)
    {
        $data = ganti::find($id);
        $data->delete();
        return redirect()->route('penggantian')->with('success','data d berhasil dithapus');
    }
    public function edit($id)
    {
        $mer = Merek::all();
        $data = Ganti::find($id);
        return view('penggantian.edit', compact('data','mer'));
    }
    public function update(Request $request, $id)
    {
        $data = Ganti::find($id);
        $data->update($request->all());
        return redirect()->route('penggantian')->with('success','data penggantian berhasil dirubah');
    }
    public function exportganti()
    {
        return Excel::download(new PenggantianExport, 'dataPenggantian.xlsx');
    }
    public function importganti(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);
        $data = $request->file('file');
        $namafile = $data->getClientOriginalName();
        $data->move('Pelanggan',$namafile);
        
    
        $import = Excel::import(new PenggantianImport, \public_path('/Pelanggan/'. $namafile));
     
        if($import) {
            //redirect
            return redirect()->route('penggantian')->with(['success' => 'Data Berhasil Diimport!']);
        } else {
            //redirect
            return redirect()->route('penggantian')->with(['error' => 'Data Gagal Diimport!']);
        }
    }
}
