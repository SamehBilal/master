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

    public function ajax($id,Request $request)
    {
        if($request->ajax())
        {
            $ticket = Ticket::find($id);
            $files = '';
            if ($ticket->files != ''){
                $files_array = explode(",",$ticket->files);
                foreach ($files_array as $file)
                {
                    $files .= '<a href="'.asset("storage/tickets/{$file}").'" target="_blank" class="align-items-center mt-2 text-decoration-0 px-3">
                                                    <img src="'.asset("storage/tickets/{$file}").'" style="width:100px;height: 100px">
                                                </a>';
                }
            }else{
                $files = 'N/A';
            }

            $chat_li = '';
            $chat_files1 = '';
            $chat_files2 = '';

            foreach ($ticket->TicketChats as $chat)
            {
                if ($chat->user_id == $ticket->user_id)
                {
                    if ($chat->files)
                    {
                        $files_array = explode(",",$chat->files);
                        foreach ($files_array as$file)
                        {
                            $chat_files1 .= '<a href="'.asset("storage/tickets/messages/{$file}").'" target="_blank" class="media align-items-center mt-2 text-decoration-0 px-3">
                                            <span class="avatar mr-12pt">
                                                <span class="avatar-title rounded-circle">
                                                    <i class="material-icons font-size-24pt">attach_file</i>
                                                </span>
                                            </span>
                                                    <span class="media-body"
                                                          style="line-height: 1.5">
                                                <span class="text-primary">'.$file.'</span><br>
                                                <!-- <span class="text-50">5 MB</span> -->
                                            </span>
                                                </a>';
                        }
                    }

                    $chat_li .= '<li class="d-inline-flex" style="margin-left: auto">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex mr-3">
                                                <a href="#"
                                                   class="text-body"><strong>'.$chat->user->full_name.'</strong></a>
                                            </div>
                                            <div>
                                                <small class="text-50">'.$chat->created_at->diffForHumans().'</small>
                                            </div>
                                        </div>
                                        <span class="text-70">'.$chat->message.'</span>
                                        '.$chat_files1.'
                                    </div>
                                </div>
                                <div style="margin-left: 1rem;">
                                    <a href="#"
                                       class="avatar avatar-sm">
                                        <img src="'.asset('backend/images/people/110/guy-6.jpg').'"
                                             alt="people"
                                             class="avatar-img rounded-circle">
                                    </a>
                                </div>
                            </li>';
                }else{
                    if ($chat->files){
                        $files_array = explode(",",$chat->files);

                        foreach ($files_array as $file){
                            $chat_files1 .= '<a href="'.asset("storage/tickets/messages/{$file}").'" target="_blank" class="media align-items-center mt-2 text-decoration-0 px-3">
                                            <span class="avatar mr-12pt">
                                                <span class="avatar-title rounded-circle">
                                                    <i class="material-icons font-size-24pt">attach_file</i>
                                                </span>
                                            </span>
                                                    <span class="media-body"
                                                          style="line-height: 1.5">
                                                <span class="text-primary">'.$file.'</span><br>
                                                <!-- <span class="text-50">5 MB</span> -->
                                            </span>
                                                </a>';
                        }
                    }

                    $chat_li .= '<li class="d-inline-flex">
                                <div style="margin-right: 1rem;">
                                    <a href="profile.html"
                                       class="avatar avatar-sm">
                                        <img src="{{asset(\'backend/images/people/110/guy-6.jpg\')}}"
                                             alt="people"
                                             class="avatar-img rounded-circle">
                                    </a>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex mr-3">
                                                <a href="profile.html"
                                                   class="text-body"><strong>'.$chat->user->full_name.'</strong></a>
                                            </div>
                                            <div>
                                                <small class="text-50">'.$chat->created_at->diffForHumans().'</small>
                                            </div>
                                        </div>
                                        <span class="text-70">'.$chat->message.'</span>
                                        '.$chat_files2.'
                                    </div>
                                </div>
                            </li>';
                }
            }

            $html = '<li>
                        <div class="card-body d-flex align-items-center" style="text-align: center;border-bottom:1px solid #ebedf0">
                            <div class="flex">
                                <p class="text-50 mb-0">'.__('dashboard.Tracking Number').'</p>
                                <p class="mb-0">'.$ticket->tracking_number.'</p>
                                <p class="text-50 mb-0">'.__('dashboard.Description').'</p>
                                <p class="mb-0">'.$ticket->description.'</p>
                                <p class="text-50 mb-0">'.__('dashboard.Attachments').'</p>
                                <p class="mb-0">
                                    '.$files.'
                                </p>
                            </div>
                        </div>
                    </li>'.$chat_li.'
                    ';

            $data = array(
                'html' => $html,
            );
            echo json_encode($data);
        }
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
