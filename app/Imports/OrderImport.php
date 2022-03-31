<?php

namespace App\Imports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;



class OrderImport implements WithMultipleSheets
{

    public function sheets(): array
    {
        return [
            'Add orders here' => new ThirdSheetImport(),
        ];
    }
}
