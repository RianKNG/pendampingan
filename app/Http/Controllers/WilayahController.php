<?php

namespace App\Http\Controllers;

use App\Models\Wilayah;
use Illuminate\Http\Request;
use App\Imports\WilayahImport;
use Maatwebsite\Excel\Facades\Excel;

class WilayahController extends Controller
{
    public function index()
    {
        return view('wilayah.index');
    }
   
    //---------------------------------allData---------------------
    public function allData()
    {
        $data = Wilayah::orderBy('id','ASC')->get();
        return response()->json($data);
    }
     //---------------------------------addData---------------------
     public function addData(Request $request)
     {
         $request->validate([
            'kode'=>'required',
            'nama_wilayah'=>'required',
            'cabang'=>'required',
         ]);
         $data = Wilayah::insert([
            'kode' => $request->kode,
            'nama_wilayah' => $request->nama_wilayah,
            'cabang' => $request->cabang,


         ]);

         return response()->json($data);
     }
     //---------------------------------editData---------------------
     public function editData($id)
     {
         $data = Wilayah::findOrFail($id);
         return response()->json($data);
     }
      //---------------------------------updateData---------------------
      public function updateData(Request $request, $id)
      {
        $request->validate([
            'kode'=>'required',
            'nama_wilayah'=>'required',
            'cabang'=>'required',
         ]);
         $data = Wilayah::findOrFail($id)->update([
            'kode' => $request->kode,
            'nama_wilayah' => $request->nama_wilayah,
            'cabang' => $request->cabang,

         ]);

          return response()->json($data);
      }
      public function deleteData($id)
      {
        $data = Wilayah::findOrFail($id);
        $data->delete();
        return response()->json($data);
      }
      public function importwilayah(Request $request)
      {
        //   dd($request->all());
          $this->validate($request, [
              'file' => 'required|mimes:csv,xls,xlsx'
          ]);
          $data = $request->file('file');
          $namafile = $data->getClientOriginalName();
          $data->move('Pelanggan',$namafile);
          
      
          $import = Excel::import(new WilayahImport, \public_path('/Pelanggan/'. $namafile));
       
          if($import) {
              //redirect
              return back()->with(['success' => 'Data Berhasil Diimport!']);
          } else {
              //redirect
              return back()->with(['error' => 'Data Gagal Diimport!']);
          }
      }
      
}
