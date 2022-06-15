<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderLog extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function order()
    {
        return $this->hasOne(Order::class  , "id" , "order_id");
    }

    public function courier()
    {
        return $this->hasOne(User::class  , "id" , "courier_id");
    }
}
