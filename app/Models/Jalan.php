<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jalan extends Model
{
    
    use HasFactory;
    protected $guarded = [];
    protected $table = 'jalan';
    protected $tableKey = ['id'];
    protected $fillable = ['id','kode','nama_jalan','cabang','wilayah','created_at','updated_at'];
    public $timestamps = false;
    public function jalan()
    {
        return $this->hasMany(Jalan::class,'id_jalan');
    }
}
