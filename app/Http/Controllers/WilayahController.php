<?php

namespace App\Http\Controllers;

use App\Models\Wilayah;
use Illuminate\Http\Request;

class WilayahController extends Controller
{
    public function index()
    {
        return view('wilayah.index');
    }
   
    //---------------------------------allData---------------------
    public function allData()
    {
        $data = Wilayah::orderBy('id','DESC')->get();
        return response()->json($data);
    }
     //---------------------------------addData---------------------
     public function addData(Request $request)
     {
         $request->validate([
            'kode'=>'required',
            'nama_wilayah'=>'required',
         ]);
         $data = Wilayah::insert([
            'kode' => $request->kode,
            'nama_wilayah' => $request->nama_wilayah,

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
         ]);
         $data = Wilayah::findOrFail($id)->update([
            'kode' => $request->kode,
            'nama_wilayah' => $request->nama_wilayah,

         ]);

          return response()->json($data);
      }
      public function deleteData($id)
      {
        $data = Wilayah::findOrFail($id);
        $data->delete();
        return response()->json($data);
      }
}
