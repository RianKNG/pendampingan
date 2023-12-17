<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Golongan extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    protected $table = 'golongan';

    protected $tableKey = ['id'];
    protected $fillable = ['id','kode','nama_golongan','created_at','updated_at'];

    public function golongan()
    {
        return $this->hasMany(DilModel::class,'id_golongan');
    }
}
