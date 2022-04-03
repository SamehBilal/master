<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public static function rules($update = false, $id = null)
    {
        $common = [
            'title'                 => "required",
            'description'           => "required",
            'details'               => "required",
            'images*.'              => 'nullable|image|mimes:jpeg,jpg,png,gif|max:10000'
        ];

        if ($update) {
            return $common;
        }

        return array_merge($common, [
            //
        ]);
    }
}
