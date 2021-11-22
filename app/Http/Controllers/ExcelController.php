<?php

namespace App\Http\Controllers;

use App\Exports\OrderExport;
use App\Imports\OrderImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    /**

    * @return \Illuminate\Support\Collection

    */

    public function export()

    {

        return Excel::download(new OrderExport, 'orders.xlsx');

    }



    /**

    * @return \Illuminate\Support\Collection

    */

    public function import()

    {

        Excel::import(new OrderImport,request()->file('file'));



        return back();

    }
}
