<?php

namespace App\Http\Controllers;

use App\Models\Cabang;
use Illuminate\Http\Request;

class CabangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['title'] = 'Data Cabang';
        $data['q'] = $request->q;
        $data['rows'] = Cabang::where('nama_cabang', 'like', '%' . $request->q . '%')->get();
        return view('cabang.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Tambah Cabang';
        return view('cabang.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required',
            'nama_cabang' => 'required',
           
        ]);
       
        $cabang = new Cabang();
        $cabang->kode = $request->kode;
        $cabang->nama_cabang = $request->nama_cabang;
        $cabang->save();
        return redirect('cabang')->with('success', 'Tambah Data Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cabang  $cabang
     * @return \Illuminate\Http\Response
     */
    public function show(Cabang $cabang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cabang  $cabang
     * @return \Illuminate\Http\Response
     */
    public function edit(Cabang $cabang)
    {
        $data['title'] = 'Ubah Cabang';
        $data['row'] = $cabang;
        return view('cabang.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cabang $cabang)
    {
        $request->validate([
            'kode' => 'required',
            'nama_cabang' => 'required',
        ]);

        $cabang = new Cabang();
        $cabang->kode = $request->kode;
        $cabang->nama_cabang = $request->nama_cabang;
        $cabang->save();
        return redirect('cabang')->with('success', 'Ubah Data Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cabang $cabang)
    {
        $cabang->delete();
        return redirect('cabang')->with('success', 'Hapus Data Berhasil');
    }
}
