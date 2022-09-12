<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PickupCustomerLog extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function pickup()
    {
        return $this->hasOne(Pickup::class  , "id" , "pickup_id");
    }

    public function hub()
    {
        return $this->hasOne(Hub::class  , "id" , "hub_id");
    }
}
