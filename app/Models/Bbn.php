<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bbn extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table ='bbn';
    protected $key ='id';
    protected $fillable =['id','id_dil','tanggal_bbn','nama_baru','created_at','updated_at','merek'];
    
}
