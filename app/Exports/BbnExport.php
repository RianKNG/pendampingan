<?php

namespace App\Exports;

use App\Models\Bbn;
use Maatwebsite\Excel\Concerns\FromCollection;

class BbnExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Bbn::all();
       
    }
    
}
