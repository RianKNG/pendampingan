<?php

namespace App\Imports;

use App\Models\DilModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DilImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new DilModel([
            
                //    'id' => $row[0],
                //    'status' => $row[1],
                //    'id_cabang' => $row[2],
                //    'id_wilayah' => $row[3],
                //    'id_jalan' => $row[4],
                //    'no_rekening' => $row[5],
                //    'nama_sekarang'=> $row[6],
                //    'nama_pemilik'=> $row[7],
                //    'alamat'=> $row[8],
                //    'angka'=> $row[9],
                //    'status_milik'=> $row[10],
                //    'jml_jiwa_tetap'=> $row[11],
                //    'jml_jiwa_tidak_tetap'=> $row[12],
                //    'kondisi_wm'=> $row[13],
                //    'segel'=> $row[14],
                //    'stop_kran'=> $row[15],
                //    'ceck_valve'=> $row[16],
                //    'kopling'=> $row[17],
                //    'plugran'=> $row[18],
                //    'box'=> $row[19],
                //    'usaha'=> $row[20],
                //    'sumber_lain'=> $row[21],
                //    'no_seri'=> $row[22],
                //    'jenis_usaha'=> $row[23],
                //    'tanggal_pasang'=> $row[24],
                //    'tanggal_file'=> $row[25],
                //    'id_merek'=> $row[26],
                //    'id_golongan'=> $row[27],
                   'id' => $row['id'],
                   'status' => $row['status'],
                   'id_cabang' => $row['id_cabang'],
                   'id_wilayah' => $row['id_wilayah'],
                   'id_jalan' => $row['id_jalan'],
                   'no_rekening' => $row['no_rekening'],
                   'nama_sekarang'=> $row['nama_sekarang'],
                   'nama_pemilik'=> $row['nama_pemilik'],
                   'alamat'=> $row['alamat'],
                   'angka'=> $row['angka'],
                   'status_milik'=> $row['status_milik'],
                   'jml_jiwa_tetap'=> $row['jml_jiwa_tetap'],
                   'jml_jiwa_tidak_tetap'=> $row['jml_jiwa_tidak_tetap'],
                   'kondisi_wm'=> $row['kondisi_wm'],
                   'segel'=> $row['segel'],
                   'stop_kran'=> $row['stop_kran'],
                   'ceck_valve'=> $row['ceck_valve'],
                   'kopling'=> $row['kopling'],
                   'plugran'=> $row['plugran'],
                   'box'=> $row['box'],
                   'usaha'=> $row['usaha'],
                   'sumber_lain'=> $row['sumber_lain'],
                   'no_seri'=> $row['no_seri'],
                   'jenis_usaha'=> $row['jenis_usaha'],
                   'tanggal_pasang'=> $row['tanggal_pasang'],
                   'tanggal_file'=> $row['tanggal_file'],
                   'id_merek'=> $row['id_merek'],
                   'id_golongan'=> $row['id_golongan'],
                   
                  
        ]);
    }
}
