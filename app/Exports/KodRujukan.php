<?php

namespace App\Exports;

use Illuminate\Http\Request;
use App\Models\MDT_OFNI_DESC;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;

class KodRujukan implements FromQuery,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        /*nama header */
        return [
            'No',
            'Kod',
            'Penerangan Status',
            'Kod Status'

        ];
    }

    public function query()
    {
        return MDT_OFNI_DESC::query()
            ->select('approved','approved_desc','re_code');
    }
}