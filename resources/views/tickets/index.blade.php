@extends('layouts.backend')

@section('title')
    Tickets
@endsection

@section('links')
    <li class="breadcrumb-item active">
        Tickets
    </li>
@endsection

@section('button-link')
    {{ route('dashboard.tickets.create') }}
@endsection

@section('button-icon')
    add
@endsection

@section('button-title')
    New Ticket
@endsection

@section('main_content')
<div class="mdk-drawer-layout js-mdk-drawer-layout">
    <div class="mdk-drawer-layout__content"
        data-perfect-scrollbar>
        @if (request()->ticket_id || $tickets->first())
            @php
                $ticket_chat = NULL;
                if ($ticket != NULL) {
                    $ticket_chat = $ticket;
                }else{
                    $ticket_chat = $tickets->first();
                }
            @endphp
            <div class="container page__container page-section">

                <div class="card">
                    <div class="card-body d-flex align-items-center">
                        <div class="flex">
                            <p class="text-50 mb-0">Ticket ID {{$ticket_chat->id}}</p>
                            <h4 class="mb-0">{{$ticket_chat->subject}}</h4>
                            <p class="text-50 mb-0">{{$ticket_chat->TicketIssue->issue}}</p>
                        </div>
                    </div>
                </div>
                <ul class="d-flex flex-column list-unstyled">
                    <li>
                        <div class="card-body d-flex align-items-center" style="text-align: center;border-bottom:1px solid #ebedf0">
                            <div class="flex">
                                <p class="text-50 mb-0">Tracking Number</p>
                                <p class="mb-0">{{$ticket_chat->traking_number}}</p>
                                <p class="text-50 mb-0">Description</p>
                                <p class="mb-0">{{$ticket_chat->description}}</p>
                                <p class="text-50 mb-0">Attachments</p>
                                <p class="mb-0">N/A</p>
                            </div>
                        </div>
                    </li>
                    <li class="d-inline-flex">
                        <div class="" style="    margin-right: 1rem;">
                            <a href="profile.html"
                            class="avatar avatar-sm">
                                <img src="{{asset('backend/images/people/110/guy-6.jpg')}}"
                                    alt="people"
                                    class="avatar-img rounded-circle">
                            </a>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex mr-3">
                                        <a href="profile.html"
                                        class="text-body"><strong>Laza Bogdan</strong></a>
                                    </div>
                                    <div>
                                        <small class="text-50">1 hour ago</small>
                                    </div>
                                </div>
                                <span class="text-70">Coming along nicely, we&#39;ve got a draft for the client design completed, take a look! 🤓</span>

                                <a href="#"
                                class="media align-items-center mt-2 text-decoration-0 px-3">
                                    <span class="avatar mr-12pt">
                                        <span class="avatar-title rounded-circle">
                                            <i class="material-icons font-size-24pt">attach_file</i>
                                        </span>
                                    </span>
                                    <span class="media-body"
                                        style="line-height: 1.5">
                                        <span class="text-primary">draft.sketch</span><br>
                                        <span class="text-50">5 MB</span>
                                    </span>
                                </a>

                            </div>
                        </div>
                    </li>

                    <li class="d-inline-flex" style="margin-left: auto">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex mr-3">
                                        <a href="profile.html"
                                        class="text-body"><strong>Michelle</strong></a>
                                    </div>
                                    <div>
                                        <small class="text-50">5 minutes ago</small>
                                    </div>
                                </div>
                                <span class="text-70">Clients loved the new design.</span>

                            </div>
                        </div>
                        <div style="margin-left: 1rem;">
                            <a href="profile.html"
                            class="avatar avatar-sm">
                                <img src="{{asset('backend/images/people/110/guy-6.jpg')}}"
                                    alt="people"
                                    class="avatar-img rounded-circle">
                            </a>
                        </div>
                    </li>

                </ul>

            </div>
            <div class="container page__container page__container">
                <form action="#"
                    id="message-reply">
                    <div class="input-group input-group-merge">
                        <input type="text"
                            class="form-control form-control-appended"
                            autofocus=""
                            required=""
                            placeholder="Type message">
                        <div class="input-group-append">
                            <div class="input-group-text pl-0">
                                <div class="custom-file custom-file-naked d-flex"
                                    style="width: 24px; overflow: hidden;">
                                    <input type="file"
                                        class="custom-file-input"
                                        id="customFile">
                                    <label class="custom-file-label"
                                        style="color: inherit;"
                                        for="customFile">
                                        <i class="material-icons">attach_file</i>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        @endif

    </div>
    

    <div class="mdk-drawer sub-layout-drawer js-mdk-drawer"
        data-align="start"
        id="email-drawer">
    <div class="mdk-drawer__content ">
        <div class="sidebar sidebar-left sidebar-light bg-white  o-hidden"
                data-perfect-scrollbar>

            <div class="navbar">
                <div class="search-form form-control-rounded search-form--light">
                    <input type="text"
                            class="form-control"
                            placeholder="Search for ticket..."
                            id="searchSample02">
                    <button class="btn"
                            type="button"><i class="material-icons">search</i></button>
                </div>
            </div>
            <p style="margin-bottom: 5px">Tickets ({{count($tickets)}})</p>
            <div class="list-group list-group-flush"
                    style="position: relative; z-index: 0;border-top:1px solid #ebedf0">
                @foreach ($tickets as $ticket)
                <a href="{{request()->ticket_id != $ticket->id? route('dashboard.tickets.index',['ticket_id' => $ticket->id]) : '#'}}">
                    <div class="list-group-item d-flex align-items-start bg-transparent">
                        <div class="flex">
                            <p class="m-0">
                                <span class="d-flex align-items-center mb-1">
                                    <strong class="text-body text-muted">{{$ticket->TicketIssue->issue}}</strong>
                                        
                                    <span class="badge {{$ticket->status_color}} ml-auto">{{$ticket->status}}</span>
                                </span>
                                <span class="d-flex align-items-end">
                                    <span class="flex mr-3">
                                        <small class="text-muted"
                                                style="max-height: 2rem; overflow: hidden; position: relative; display: inline-block;">Ticket ID {{$ticket->id}}</small>
                                    </span>
                                </span>
                                <span class="d-flex align-items-end">
                                    <span class="flex mr-3">
                                        <strong class="text-body mb-1">{{$ticket->subject}}</strong><br>
                                        <small class="text-muted"
                                                style="max-height: 2rem; overflow: hidden; position: relative; display: inline-block;">{{$ticket->created_at->format('d M Y - h:i A')}}</small>
                                                {{-- 04 Dec 2021 - 07:19 AM --}}
                                    </span>
                                </span>
                            </p>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>

        </div>
    </div>
    </div>

</div>
@endsection
