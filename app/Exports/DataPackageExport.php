<?php

namespace App\Exports;

use App\Models\DataPackage;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DataPackageExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */


    public function headings():array{
        return[
            'mno',
            'validity',
            'description',
            'amount'
        ];
    }
    public function collection()
    {
        return DataPackage::take(10)->select(['mno','validity','description','amount'])->get();
    }
}
