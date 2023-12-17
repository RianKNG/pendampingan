<?php

namespace App\Models;


use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Penutupan extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'penutupan';
    protected $tableKey = 'id';
    
    protected $fillable = ['id','id_dil','nama_sekarang','tanggal_tutup','segel','created_at','cabang','alasan'];
    
    // public function allData()
    // {
    //     // $data = 
    //         return DB::table('penutupan')
    //             ->join('tbl_dil','tbl_dil.id','=','penutupan.id')
    //             ->select('penutupan.*','tbl_dil.*')
    //             ->get();
    //             // return $data;
    // }
    

}
