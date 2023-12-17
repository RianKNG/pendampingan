<?php

namespace App\Http\Controllers;

use App\Models\Golongan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GolonganController extends Controller
{
    public function index()
    {
        $data = DB::table('golongan')
        ->simplePaginate(100);
        return view('golongan.index',compact('data'))->render();
    }
    public function insert(Request $request)
    {
        // $data =($request->all());
        // dd($data);
        Golongan::create($request->all());
        return redirect()->route('golongan')->with('success','data berhasil ditambahkan');
    }
    public function edit($id)
    {
        $data = Golongan::find($id);
        return view('golongan.edit',compact('data'));
    }
   
    public function update(Request $request, $id){
        $data = Golongan::find($id);
        
        $data->update($request->all());
    
        return redirect()->route('golongan')->with('success','data berhasil ditambahkan');
    }
    public function hapus($id){
       $data = Golongan::find($id);
       $data->delete();
        return redirect()->route('golongan')->with(['success'=>'Data berhasil Terhapus']);
    }
}
