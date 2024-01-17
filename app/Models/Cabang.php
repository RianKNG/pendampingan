<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cabang extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'cabang';
    protected $tableKey = ['id'];
    protected $fillable = ['id','kode','cabang','created_at','updated_at'];
    public function cabang()
    {
        return $this->hasMany(Cabang::class,'id_cabang');
    }

}
