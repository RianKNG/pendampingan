<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sambung extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'sambung';
    protected $tableKey = 'id';
    protected $fillable = ['id','id_dil','tanggal_sambung','alasan','created_at'];
}
