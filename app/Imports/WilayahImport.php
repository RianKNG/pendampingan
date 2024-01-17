<?php

namespace App\Imports;

use App\Models\Wilayah;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;

class WilayahImport implements ToModel
{
    /**
    * @param Collection $collection
    */
    // public function collection(Collection $collection)
    public function model(array $row)
    {
        return new Wilayah([
            
                   'id' => $row[0],
                   'kode' => $row[1],
                   'nama_wilayah' => $row[2],
                   'cabang'=> $row[3],
                //    'created_at' => $row[4],
                //    'updated_at'=> $row[5],
                  
                   
        ]);
    }
}
