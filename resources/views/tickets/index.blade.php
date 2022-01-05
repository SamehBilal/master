@extends('layouts.backend')

@section('title')
{{ __('dashboard.Tickets') }}
@endsection

@section('links')
    <li class="breadcrumb-item active">
        {{ __('dashboard.Tickets') }}
    </li>
@endsection
@can('create tickets')
    @section('button-link')
        {{ route('dashboard.tickets.create') }}
    @endsection
@endcan
@section('button-icon')
    add
@endsection

@section('button-title')
{{ __('dashboard.New Ticket') }}
@endsection

@section('main_content')
<div class="mdk-drawer-layout js-mdk-drawer-layout">
    <div class="mdk-drawer-layout__content"
        data-perfect-scrollbar>
        @if (request()->ticket_id || $tickets->first())
            @php
                $active_ticket = NULL;
                if ($ticket != NULL) {
                    $active_ticket = $ticket;
                }else{
                    $active_ticket = $tickets->first();
                }
            @endphp
            <div class="container page__container page-section">

                <div class="card">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="card-body d-flex align-items-center">
                                <div class="flex">
                                    <p class="text-50 mb-0">{{ __('dashboard.Ticket ID') }} {{$active_ticket->id}}</p>
                                    <h4 class="mb-0">{{$active_ticket->subject}}</h4>
                                    <p class="text-50 mb-0">{{$active_ticket->TicketIssue->issue}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2" style="margin-top: 3%;">
                            <a href="{{ route('dashboard.tickets.update', $active_ticket->id) }}" 
                                onclick="event.preventDefault(); $('#change-status-form').submit();"
                                class="btn btn-outline-secondary">
                            <i class="fa fa-folder-open icon--left"></i> {{ in_array($active_ticket->status_name,['Closed','Resolved'])? __('dashboard.Re-open'): __('dashboard.Close')}}
                        </a>
                        <form method="POST" id="change-status-form" action="{{ route('dashboard.tickets.update', $active_ticket->id) }}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="status" value="{{ in_array($active_ticket->status_name,['Closed','Resolved'])? '1': '3'}}">
                        </form>
                        </div>
                    </div>
                </div>
                <ul class="d-flex flex-column list-unstyled">
                    <li>
                        <div class="card-body d-flex align-items-center" style="text-align: center;border-bottom:1px solid #ebedf0">
                            <div class="flex">
                                <p class="text-50 mb-0">{{ __('dashboard.Tracking Number') }}</p>
                                <p class="mb-0">{{$active_ticket->traking_number}}</p>
                                <p class="text-50 mb-0">{{ __('dashboard.Description') }}</p>
                                <p class="mb-0">{{$active_ticket->description}}</p>
                                <p class="text-50 mb-0">{{ __('dashboard.Attachments') }}</p>
                                <p class="mb-0">
                                    @if ($active_ticket->files)
                                        @php
                                            $files_array = explode(",",$active_ticket->files)
                                        @endphp
                                        @foreach ($files_array as$file)
                                            <a href='{{asset("storage/tickets/{$file}")}}' target="_blank" class="align-items-center mt-2 text-decoration-0 px-3">
                                                <img src="{{asset("storage/tickets/{$file}")}}" style="width:100px;height: 100px">
                                            </a>
                                        @endforeach
                                    @else
                                        N/A
                                    @endif
                                    
                                </p>
                            </div>
                        </div>
                    </li>
                    @foreach ($active_ticket->TicketChats as $chat)
                        @if ($chat->user_id == $active_ticket->user_id)
                            <li class="d-inline-flex" style="margin-left: auto">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex mr-3">
                                                <a href="profile.html"
                                                class="text-body"><strong>{{$chat->user->full_name}}</strong></a>
                                            </div>
                                            <div>
                                                <small class="text-50">{{$chat->created_at->diffForHumans()}}</small>
                                            </div>
                                        </div>
                                        <span class="text-70">{{$chat->message}}</span>
                                        @if ($chat->files)
                                            @php
                                                $files_array = explode(",",$chat->files)
                                            @endphp
                                            @foreach ($files_array as$file)
                                                <a href='{{asset("storage/tickets/messages/{$file}")}}' target="_blank" class="media align-items-center mt-2 text-decoration-0 px-3">
                                                    <span class="avatar mr-12pt">
                                                        <span class="avatar-title rounded-circle">
                                                            <i class="material-icons font-size-24pt">attach_file</i>
                                                        </span>
                                                    </span>
                                                    <span class="media-body"
                                                        style="line-height: 1.5">
                                                        <span class="text-primary">{{$file}}</span><br>
                                                        {{-- <span class="text-50">5 MB</span> --}}
                                                    </span>
                                                </a>
                                            @endforeach
                                        @endif
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
                        @else
                            <li class="d-inline-flex">
                                <div style="margin-right: 1rem;">
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
                                                class="text-body"><strong>{{$chat->user->full_name}}</strong></a>
                                            </div>
                                            <div>
                                                <small class="text-50">{{$chat->created_at->diffForHumans()}}</small>
                                            </div>
                                        </div>
                                        <span class="text-70">{{$chat->message}}</span>
                                        @if ($chat->files)
                                            @php
                                                $files_array = explode(",",$chat->files)
                                            @endphp
                                            @foreach ($files_array as$file)
                                                <a href='{{asset("storage/tickets/messages/{$file}")}}' target="_blank" class="media align-items-center mt-2 text-decoration-0 px-3">
                                                    <span class="avatar mr-12pt">
                                                        <span class="avatar-title rounded-circle">
                                                            <i class="material-icons font-size-24pt">attach_file</i>
                                                        </span>
                                                    </span>
                                                    <span class="media-body"
                                                        style="line-height: 1.5">
                                                        <span class="text-primary">{{$file}}</span><br>
                                                        {{-- <span class="text-50">5 MB</span> --}}
                                                    </span>
                                                </a>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </li>
                        @endif
                    @endforeach
                </ul>

            </div>
            <div class="container page__container page__container">
                <form action="{{ route('dashboard.tickets.sendmessage',$active_ticket->id) }}" method="POST" id="message-reply" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group input-group-merge">
                        <input type="text"
                            class="form-control form-control-appended"
                            name="message"
                            autofocus=""
                            required
                            placeholder="{{ __('dashboard.Type message') }}">
                        <div class="input-group-append">
                            <div class="input-group-text pl-0">
                                <div class="custom-file custom-file-naked d-flex"
                                    style="width: 24px; overflow: hidden;">
                                    <input type="file"
                                        class="custom-file-input"
                                        name="files[]"
                                        multiple
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
                            placeholder="{{ __('dashboard.Search for ticket') }}..."
                            id="searchSample02">
                    <button class="btn"
                            type="button"><i class="material-icons">search</i></button>
                </div>
            </div>
            <p style="margin-bottom: 5px">{{ __('dashboard.Tickets') }} ({{count($tickets)}})</p>
            <div class="list-group list-group-flush"
                    style="position: relative; z-index: 0;border-top:1px solid #ebedf0">
                @foreach ($tickets as $ticket)
                <a href="{{request()->ticket_id != $ticket->id? route('dashboard.tickets.index',['ticket_id' => $ticket->id]) : '#'}}">
                    <div class="list-group-item d-flex align-items-start bg-transparent">
                        <div class="flex">
                            <p class="m-0">
                                <span class="d-flex align-items-center mb-1">
                                    <strong class="text-body text-muted">{{$ticket->TicketIssue->issue}}</strong>
                                        
                                    <span class="badge {{$ticket->status_color}} ml-auto">{{__("dashboard.{$ticket->status_name}")}}</span>
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
