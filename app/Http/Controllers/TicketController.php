<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->hasRole('Super Admin') || auth()->user()->hasRole('admin')) {
            $tickets = Ticket::with('TicketIssues','TicketChats')->orderBy('updated_at','desc')->get();

            // return view tickets index for admin 
        }

        $tickets = Ticket::where('user_id', auth()->user()->id)
                          ->with('TicketIssues','TicketChats')
                          ->orderBy('updated_at','desc')
                          ->get();
        // return customer view
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'traking_number'    => $request->traking_number,
            'ticket_issue_id'   => $request->ticket_issue_id,
            'subject'           => $request->subject,
            'description'       => $request->description,
            'order_id'          => $request->order_id,
            'files'             => $files
        ]);

        return redirect()->back()->with('success','Ticket Submited successfully');

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

        $message = $request->status == 'Closed' ? 'Ticket Closed Successfully' : 'Ticket Reopened Successfully';

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
}
