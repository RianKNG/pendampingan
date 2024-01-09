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
                   'no_rekening' => $row[3],
                   'nama_sekarang'=> $row[4],
                   'nama_pemilik'=> $row[5],
                   'alamat'=> $row[6],
                   'angka'=> $row[7],
                   'status_milik'=> $row[8],
                   'jml_jiwa_tetap'=> $row[9],
                   'jml_jiwa_tidak_tetap'=> $row[10],
                   'kondisi_wm'=> $row[11],
                   'segel'=> $row[12],
                   'stop_kran'=> $row[13],
                   'ceck_valve'=> $row[14],
                   'kopling'=> $row[15],
                   'plugran'=> $row[16],
                   'box'=> $row[17],
                   'usaha'=> $row[18],
                   'sumber_lain'=> $row[19],
                   'no_seri'=> $row[20],
                   'jenis_usaha'=> $row[21],
                   'tanggal_pasang'=> $row[22],
                   'tanggal_file'=> $row[23],
                   'id_merek'=> $row[24],
                   'id_golongan'=> $row[25],
                   
                  
        ]);
    }
}
