<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AjaxController extends Controller
{
    public function customer(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->get('customer');
            $customer = Customer::find($id);
            $name = $customer->user->full_name;

            $data = array(
                'name' => $name,
            );

            return json_encode($data);
        }
    }
}