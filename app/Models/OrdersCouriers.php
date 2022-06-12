<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
