<?php

namespace App\Exports;

use App\Models\SampleData;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SampleDataExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings():array{
        return[
            'serial',
            'phone_number',
            'amount',
            'validity'
        ];
    }

    public function collection()
    {
        return SampleData::select(['serial','phone_number','amount','validity'])->get();
    }
}
