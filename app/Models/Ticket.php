<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class Ticket extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $appends = ['status_color','status_name'];

    public function getStatusColorAttribute()
    {
        switch($this->attributes['status']){
            case '1':
                return "badge-primary";
            case '2':
                return "badge-success";
            default:
                return "badge-danger";
        }
    }
    public function getStatusNameAttribute()
    {
        switch($this->attributes['status']){
            case '1':
                return "Open";
            case '2':
                return "Resolved";
            default:
                return "Closed";
        }
    }

    public function TicketIssue()
    {
        return $this->belongsTo(TicketIssue::class);
    }

    public function TicketChats()
    {
        return $this->hasMany(TicketChat::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public static function rules($update = false, $id = null)
    {
        $common = [
            'status'            => Rule::in(['Open','Resolved','Closed']),
            'tracking_number'   => "required|max:255",
            'ticket_issue_id'   => 'required|exists:ticket_issues,id',
            'subject'           => "required|max:255",
            'description'       => "required",
            'files.*'           => 'nullable|max:10000',
            'order_id'          => 'nullable|exists:orders,id',
        ];

        if ($update) {
            return $common;
        }

        return array_merge($common, [

        ]);
    }
}
