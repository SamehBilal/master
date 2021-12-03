<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class Currency extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function Customer()
    {
        $this->belongsTo(Customer::class);
    }

    public function user()
    {
        return $this->hasOne(User::class  , "id" , "business_user_id");
    }

    public static function rules($update = false, $id = null)
    {
        $common = [
            'name'          => "nullable|max:40|unique:currencies,name,$id",
        ];

        if ($update) {
            return $common;
        }

        return array_merge($common, [
            'name'          => "required|max:40|unique:currencies",
        ]);
    }
}
