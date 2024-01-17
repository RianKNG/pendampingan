<?php

namespace App\Imports;

use App\Models\Jalan;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;

class JalanImport implements ToModel
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        return new Jalan([
            
            'id' => $row[0],
            'kode' => $row[1],
            'nama_jalan' => $row[2],
            'cabang'=> $row[3],
            'wilayah'=> $row[4],
         //    'created_at' => $row[4],
         //    'updated_at'=> $row[5],
           
            
 ]);
    }
}
