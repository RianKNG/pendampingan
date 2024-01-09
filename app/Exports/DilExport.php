<?php
namespace App\Exports;
use App\Models\DilModel;
use Carbon\Carbon;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
// use Maatwebsite\Excel\Concerns\ToModel;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
// use Maatwebsite\Excel\Concerns\FromCollection;


class DilExport implements FromQuery,WithMapping,WithHeadings,WithEvents,ShouldAutoSize
{
    private $cabang;
    protected $from, $to;
    
    use Exportable;
    public function __construct($cabang,$from,$to)
    {
        $this->cabang = $cabang;
        $this->from = $from;
        $this->to = $to;


  

    }
   
    public function query()
    {
        
     
        return DilModel::query()
        ->where('id_cabang', $this->cabang)
        ->whereBetween('tanggal_pasang', [$this->from, $this->to]);
       
    
        
        
    }
    public function headings(): array
    {
        return [
            'NO SAMBUNGAN',
            'GOLONGAN',
            'NAMA SEKARANG',
            'NAMA PEMILIK',
            'ALAMAT',
            'STATUS MILIK',
            'JIWA TETAP',
            'JIWA TIDAK TETAP',
            'KONDISI_WM',
            'SEGEL',
            'STOP KRAN',
            'CECK VALVE',
            'KOPLING',
            'PLUG KRAN',
            'BOX',
            'SUMBER LAIN',
            'NO SERI',
            'MEREK',
            'JENIS USAHA',
            'TANGGAL PASANG',
            
        ];
    }
    public function map($cabang): array
    {
        return [
            $cabang->id,
            $cabang->golongan()->pluck('nama_golongan')->implode(', '),
            $cabang->nama_sekarang,
            $cabang->nama_pemilik,
            $cabang->alamat,
            $cabang->status_milik,
            $cabang->jml_jiwa_tetap,
            $cabang->jml_jiwa_tidak_tetap,
            $cabang->kondisi_wm,
            $cabang->segel,
            $cabang->stop_kran,
            $cabang->ceck_valve,
            $cabang->kopling,
            $cabang->plugran,
            $cabang->box,
            $cabang->sumber_lain,
            $cabang->no_seri,
            $cabang->merek()->pluck('merek')->implode(', '),
            $cabang->jenis_usaha,
            $cabang->tanggal_pasang,
           
        ];
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:W1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
            },
        ];
    }
}