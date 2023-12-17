<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ganti extends Model
{
    use HasFactory;
    protected $table = 'ganti';
    protected $fillable = ['id','tanggal_ganti','no_wmbaru','id_dil','id_merek'];
}
