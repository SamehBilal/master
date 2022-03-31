<?php

namespace App\Http\Controllers;

use App\Imports\OrderImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Input;

class OrderMultiController extends Controller
{
    public function index()
    {
        return view('orders.create-multi');
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            [
                'file'      => $request->file,
                'extension' => strtolower($request->file->getClientOriginalExtension()),
            ],
            [
                'file'          => 'required',
                'extension'      => 'required|in:doc,csv,xlsx,xls,docx,ppt,odt,ods,odp',
            ]
        );


        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator);
        }
        else
        {
            $path = $request->file('file')->getRealPath();
            try {
                $file = Excel::import(new OrderImport(), $path);

                \Session::flash('success', 'Orders uploaded successfully.');
                return redirect(route('dashboard.orders.index'));
            } catch (\Exception $e) {
                \Session::flash('error', $e->getMessage());
                return redirect()->back()->with('message','Something went wrong.');
            }
        }
    }
}
