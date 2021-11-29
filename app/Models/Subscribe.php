<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscribe extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public static function rules($update = false, $id = null)
    {
        $common = [
            'email'         => "nullable|email|regex:/(.+)@(.+)\.(.+)/i|unique:subscribes,email,$id",
        ];

        if ($update) {
            return $common;
        }

        return array_merge($common, [
            'email'         => 'nullable|email|regex:/(.+)@(.+)\.(.+)/i|max:255|unique:subscribes',
        ]);
    }
}
