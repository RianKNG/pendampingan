<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DilModel extends Model
{
    use HasFactory;
    // protected $dateFormat='m-d-Y';
    protected $guarded = [];
    protected $table = 'tbl_dil';
    protected $tableKey = ['id'];
    public $timestamps = false;
    protected $fillable = ['id','cabang','status','no_rekening','nama_sekarang','nama_pemilik','alamat','angka','status_milik',
    'jml_jiwa_tetap','jml_jiwa_tidak_tetap','kondisi_wm','segel','stop_kran','ceck_valve','kopling','plugran','box','usaha',
    'sumber_lain','no_seri','jenis_usaha','tanggal_pasang','tanggal_file','id_merek','id_golongan'];
    public function merek()
    {
        return $this->belongsTo(Merek::class,'id_merek');
    }
    public function golongan()
    {
        return $this->belongsTo(Golongan::class,'id_golongan');
    }
}