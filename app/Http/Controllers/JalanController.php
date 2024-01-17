<?php

namespace App\Http\Controllers;

use App\Models\Jalan;
use App\Imports\JalanImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class JalanController extends Controller
{
    public function index()
    {
        return view('jalan.index');
    }
   
    //---------------------------------allData---------------------
    public function allData()
    {
        $data =Jalan::orderBy('id','DESC')->get();
        return response()->json($data);
    }
     //---------------------------------addData---------------------
     public function addData(Request $request)
     {
         $request->validate([
            'kode'=>'required',
            'nama_jalan'=>'required',
            'cabang'=>'required',
            'wilayah'=>'required',
         ]);
         $data =Jalan::insert([
            'kode' => $request->kode,
            'nama_jalan' => $request->nama_jalan,
            'cabang' => $request->cabang,
            'wilayah' => $request->wilayah,

         ]);

         return response()->json($data);
     }
     //---------------------------------editData---------------------
     public function editData($id)
     {
         $data =Jalan::findOrFail($id);
         return response()->json($data);
     }
      //---------------------------------updateData---------------------
      public function updateData(Request $request, $id)
      {
        $request->validate([
            'kode'=>'required',
            'nama_jalan'=>'required',
            'cabang'=>'required',
            'wilayah'=>'required',
         ]);
         $data =Jalan::findOrFail($id)->update([
            'kode' => $request->kode,
            'nama_jalan' => $request->nama_jalan,
            'cabang' => $request->cabang,
            'wilayah' => $request->wilayah,

         ]);

          return response()->json($data);
      }
      public function deleteData($id)
      {
        $data =Jalan::findOrFail($id);
        $data->delete();
        return response()->json($data);
      }
      public function importjalan(Request $request)
      {
        //   dd($request->all());
          $this->validate($request, [
              'file' => 'required|mimes:csv,xls,xlsx'
          ]);
          $data = $request->file('file');
          $namafile = $data->getClientOriginalName();
          $data->move('Pelanggan',$namafile);
          
      
          $import = Excel::import(new JalanImport, \public_path('/Pelanggan/'. $namafile));
       
          if($import) {
              //redirect
              return back()->with(['success' => 'Data Berhasil Diimport!']);
          } else {
              //redirect
              return back()->with(['error' => 'Data Gagal Diimport!']);
          }
      }
}

