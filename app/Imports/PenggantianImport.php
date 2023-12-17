<?php

namespace App\Imports;

use App\Models\Ganti;
use Maatwebsite\Excel\Concerns\ToModel;

class PenggantianImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Ganti([
            
                   'id' => $row[0],
                   'tanggal_ganti' => $row[1],
                   'no_wmbaru' => $row[2],
                   'created_at' => $row[3],
                   'updated_at'=> $row[4],
                   'id_dil'=> $row[5],       
                   'id_merek'=> $row[6],       
        ]);
    }
}
