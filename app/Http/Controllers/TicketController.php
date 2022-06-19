<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\TicketIssue;
use App\Models\TicketChat;
use App\Models\User;
use App\Notifications\NewTicket;
use App\Notifications\NewTicketChat;
use App\Notifications\UpdatedTicket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ticket = NULL;
        if (auth()->user()->hasRole('Super Admin') || auth()->user()->hasRole('admin')) {
            $tickets = Ticket::with('TicketIssue','TicketChats')
                            ->orderBy('status','asc')
                            ->orderBy('updated_at','desc')
                            ->get();
        }else{
            $tickets = Ticket::where('user_id', auth()->user()->id)
                            ->with('TicketIssue')
                            ->orderBy('status','asc')
                            ->orderBy('updated_at','desc')
                            ->get();
        }

        if (request()->ticket_id) {
            $ticket = Ticket::with('TicketIssue','TicketChats')->findOrFail(request()->ticket_id);
        }

        return view('tickets.index',compact('tickets','ticket'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ticketIssues = TicketIssue::all();
        return view('tickets.create', compact('ticketIssues'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Ticket::rules());
        $files = NULL;

        if(request()->hasFile('files'))
        {
            $request_files = request()->file('files');
            foreach ($request_files as $file) {
                $file_name =  time() . '_' . $file->getClientOriginalName();
                $file->storeAs('/',"/tickets/{$file_name}", '');
                $file_data[] = $file_name;
            }
            $files  = implode(',',$file_data);
        }

        $ticket = Ticket::create([
            'user_id'           => auth()->user()->id,
            'tracking_number'   => $request->tracking_number,
            'ticket_issue_id'   => $request->ticket_issue_id,
            'subject'           => $request->subject,
            'description'       => $request->description,
            'files'             => $files
        ]);

        $users = User::whereHas("roles", function($q){
            $q->where("name", "Super Admin")
                ->orWhere("name", "admin")
                ->orWhere("name", "sales");
        })->get();
        Notification::send($users, new NewTicket($ticket));

        return redirect()->route('dashboard.tickets.index')->with('success','Ticket Submited successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
            $ticket->update([
            'status'  => $request->status,
        ]);

        $message = $request->status == '3' ? 'Ticket Closed Successfully' : 'Ticket Reopened Successfully';

        $users = User::whereHas("roles", function($q){
            $q->where("name", "Super Admin")
                ->orWhere("name", "admin")
                ->orWhere("name", "sales");
        })->get();

        Notification::send($users, new UpdatedTicket($ticket));

        return redirect()->back()->with('success',$message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        //
    }

    public function sendTicketMessage(Request $request, $ticket_id)
    {
        $files = NULL;

        if(request()->hasFile('files'))
        {
            $request_files = request()->file('files');
            foreach ($request_files as $file) {
                $file_name =  time() . '_' . $file->getClientOriginalName();
                $file->storeAs('/',"/tickets/messages/{$file_name}", '');
                $file_data[] = $file_name;
            }
            $files  = implode(',',$file_data);
        }

        $ticket_chat = TicketChat::create([
            'user_id'   => auth()->user()->id,
            'ticket_id' => $ticket_id,
            'message'   => $request->message,
            'files'     => $files
        ]);

        $user = User::find(auth()->user()->id);
        if($user->hasRole('customer'))
        {
            $users = User::whereHas("roles", function($q){
                $q->where("name", "Super Admin")
                    ->orWhere("name", "admin")
                    ->orWhere("name", "sales");
            })->get();
            Notification::send($users, new NewTicketChat($ticket_chat));
        }else{
            $ticket = Ticket::find($ticket_id);
            $users = User::find($ticket->user_id);
            Notification::send($users, new NewTicketChat($ticket_chat));
        }

        return redirect()->back()->with('success', 'Message Submitted Successfully');
    }
}
