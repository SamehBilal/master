<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class address extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function zone()
    {
        return $this->hasOne(Zone::class);
    }

    public function city()
    {
        return $this->hasOne(City::class);
    }

    public function country()
    {
        return $this->hasOne(Country::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
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
