<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class OrdersCouriers extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'courier_logs';

    public function order()
    {
        return $this->hasOne(Order::class  , "id" , "order_id");
    }

    public function pickup()
    {
        return $this->hasOne(Pickup::class  , "id" , "pickup_id");
    }

    public function courier()
    {
        return $this->hasOne(User::class  , "id" , "courier_id");
    }

    public static function attrs()
    {
        return [
            'order_id'         => "Order",
            'pickup_id'        => "Pickup",
            'courier_id'       => "Courier",
        ];
    }

    public static function rules($update = false, $id = null)
    {
        $common = [

            'order_id'         => "nullable|unique:courier_logs,email,$id",
            'pickup_id'        => "nullable|unique:courier_logs,email,$id",
            'courier_id'       => "required|unique:courier_logs,email,$id",

        ];

        if ($update) {
            return $common;
        }

        return array_merge($common, [
            'order_id'         => 'nullable|unique:courier_logs',
            'pickup_id'        => 'nullable|unique:courier_logs',
            'courier_id'       => 'required|unique:courier_logs',
        ]);
    }
}
