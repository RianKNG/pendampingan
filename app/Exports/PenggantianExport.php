<?php

namespace App\Exports;

use App\Models\Ganti;
use Maatwebsite\Excel\Concerns\FromCollection;

class PenggantianExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Ganti::all();
       
    }
    
}
