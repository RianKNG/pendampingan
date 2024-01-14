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
}
