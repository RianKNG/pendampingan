<?php

namespace App\Exports;

use App\Models\Penutupan;
use Maatwebsite\Excel\Concerns\FromCollection;

class PenutupanExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Penutupan::all();
       
    }
    
}
