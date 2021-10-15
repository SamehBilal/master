<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class City extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function Country()
    {
        $this->belongsTo(Country::class);
    }

    public function address()
    {
        return $this->belongsTo(address::class);
    }

    public static function rules($update = false, $id = null)
    {
        $common = [
            'name'          => "nullable|max:40",
        ];

        if ($update) {
            return $common;
        }

        return array_merge($common, [
            'name'          => "required|max:40",
        ]);
    }
}
