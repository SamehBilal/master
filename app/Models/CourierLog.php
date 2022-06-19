<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourierLog extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table   = 'courier_logs';
}
