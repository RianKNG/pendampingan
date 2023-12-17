<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coba extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    protected $table = 'coba';

    protected $tableKey = ['id'];
    protected $fillable =['id','id_penutupan','id_ganti','id_sambung','id_bbn'];
    
}
