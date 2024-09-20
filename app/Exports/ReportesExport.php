<?php

namespace App\Exports;

use App\Models\Reportes\Reporte;
use Maatwebsite\Excel\Concerns\FromCollection;

class ReportesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Reporte::with("desaparecidos")->get();
    }
}
