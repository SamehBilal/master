<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

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

}
