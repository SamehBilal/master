<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class Ticket extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function TicketIssues()
    {
        return $this->hasMany(TicketIssue::class);
    }

    public function TicketChats()
    {
        return $this->hasMany(TicketChat::class);
    }

    public static function rules($update = false, $id = null)
    {
        $common = [
            'status'            => Rule::in(['Open','Resolved','Closed']),
            'traking_number'    => "nullable|max:255",
            'ticket_issue_id'   => 'required|exists:ticket_issues,id',
            'subject'           => "required|max:255",
            'description'       => "nullable",
            'files.*'           => 'nullable|image|mimes:jpeg,jpg,png,gif|max:10000',
            'order_id'          => 'nullable|exists:orders,id',
        ];

        if ($update) {
            return $common;
        }

        return array_merge($common, [
           
        ]);
    }
}
