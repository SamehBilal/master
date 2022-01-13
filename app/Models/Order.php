<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function customer()
    {
        return $this->hasOne(Customer::class  , "id" , "customer_id");
    }

    public function location()
    {
        return $this->hasOne(Location::class  , "id" , "location_id");
    }

    public function pickup()
    {
        return $this->hasOne(Pickup::class  , "id" , "pickup_id");
    }

    public function log()
    {
        return $this->hasMany(OrderLog::class)->orderByDesc('created_at');
    }

    public static function rules($update = false, $id = null)
    {
        $common = [
            //'tracking_no'        => "required|max:40|unique:orders,tracking_no,$id",
        ];

        if ($update) {
            return $common;
        }

        return array_merge($common, [
            //'tracking_no'          => "required|max:40|unique:orders",
        ]);
    }
}
