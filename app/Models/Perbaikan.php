<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perbaikan extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'perbaikan';
    protected $tableKey = 'id';
    
    protected $fillable = ['id','id_dil','nama_sekarang','tanggal_perbaikan','keterangan','created_at','kondisi_wm'];
}
