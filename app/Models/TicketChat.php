<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketChat extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public static function rules($update = false, $id = null)
    {
        $common = [
            'user_id'   => 'required|exists:users,id',
            'ticket_id' => "required|exists:tickets,id",
            'message'   => "nullable",
            'files.*'   => 'nullable|image|mimes:jpeg,jpg,png,gif|max:10000',
            
        ];

        if ($update) {
            return $common;
        }

        return array_merge($common, [
           
        ]);
    }
}
