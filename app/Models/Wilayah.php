<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wilayah extends Model
{
    use HasFactory;
    protected $table ='wilayah';
    protected $fillable = [
        'kode',
        'nama_wilayah',
        'cabang',
    ];
    public $timestamps = false;
    public function wilayah()
    {
        return $this->hasMany(Wilayah::class,'id_wilayah');
    }

}
