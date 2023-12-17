<?php

namespace App\Imports;

use App\Models\Bbn;
use Maatwebsite\Excel\Concerns\ToModel;

class BbnImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Bbn([
            
                   'id' => $row[0],
                   'tanggal_bbn' => $row[1],
                   'nama_baru' => $row[2],
                   'created_at' => $row[3],
                   'updated_at'=> $row[4],
                   'id_dil'=> $row[5],       
        ]);
    }
}
