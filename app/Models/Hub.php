<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hub extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public static function rules($update = false, $id = null)
    {
        $common = [
            'ar_name'          => "required|max:40",
            'en_name'          => "required|max:40",
        ];

        if ($update) {
            return $common;
        }

        return array_merge($common, [
            'ar_name'          => "required|max:40",
            'en_name'          => "required|max:40",
        ]);
    }
}
