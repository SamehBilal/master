<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function location()
    {
        return $this->hasOne(Location::class  , "id" , "location_id");
    }

    public function business()
    {
        return $this->hasOne(User::class,"id","business_user_id");
    }

    public static function rules($update = false, $id = null)
    {
        $common = [

        ];

        if ($update) {
            return $common;
        }

        return array_merge($common, [
        ]);
    }
}
