<?php

namespace App\Exports;

use App\Models\Sambung;
use Maatwebsite\Excel\Concerns\FromCollection;

class PenyambunganExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Sambung::all();
       
    }
    
}
