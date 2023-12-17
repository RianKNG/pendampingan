<?php

namespace App\Imports;

use App\Models\Sambung;
use Maatwebsite\Excel\Concerns\ToModel;

class PenyambunganImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Sambung([
            
                   'id' => $row[0],
                   'tanggal_sambung' => $row[1],
                   'alasan' => $row[2],
                   'created_at' => $row[3],
                   'updated_at'=> $row[4],
                   'id_dil'=> $row[5],       
        ]);
    }
}
