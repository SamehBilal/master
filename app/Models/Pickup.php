<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pickup extends Model
{
    use HasFactory;

    public function contact()
    {
        return $this->hasOne(Contact::class  , "id" , "contact_id");
    }

    public function location()
    {
        return $this->hasOne(Location::class  , "id" , "location_id");
    }
}
