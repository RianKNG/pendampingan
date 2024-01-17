<?php

namespace App\Imports;

use App\Models\DilModel;
use Maatwebsite\Excel\Concerns\ToModel;

class DilImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new DilModel([
            
                   'id' => $row[0],
                   'status' => $row[1],
                   'id_cabang' => $row[2],
                   'id_wilayah' => $row[3],
                   'id_jalan' => $row[4],
                   'no_rekening' => $row[5],
                   'nama_sekarang'=> $row[6],
                   'nama_pemilik'=> $row[7],
                   'alamat'=> $row[8],
                   'angka'=> $row[9],
                   'status_milik'=> $row[10],
                   'jml_jiwa_tetap'=> $row[11],
                   'jml_jiwa_tidak_tetap'=> $row[12],
                   'kondisi_wm'=> $row[13],
                   'segel'=> $row[14],
                   'stop_kran'=> $row[15],
                   'ceck_valve'=> $row[16],
                   'kopling'=> $row[17],
                   'plugran'=> $row[18],
                   'box'=> $row[19],
                   'usaha'=> $row[20],
                   'sumber_lain'=> $row[21],
                   'no_seri'=> $row[22],
                   'jenis_usaha'=> $row[23],
                   'tanggal_pasang'=> $row[24],
                   'tanggal_file'=> $row[25],
                   'id_merek'=> $row[26],
                   'id_golongan'=> $row[27],
                   
                  
        ]);
    }
}
