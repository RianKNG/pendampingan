<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merek extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    protected $table = 'merek';

    protected $tableKey = ['id'];
    protected $fillable = ['id','kode','merek','created_at','updated_at'];

    // public function dilmodell()
    // {

    //     return $this->hasMany(DilModel::class);
    // }

    public function dilmodel()
    {
        return $this->hasMany(DilModel::class,'id_merek');
    }
}
