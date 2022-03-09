@extends('layouts.backend')

@section('title')
    Tracking No. {{ $pickup->pickup_id }}
@endsection

@section('links')
    <li class="breadcrumb-item ">
        <a href="{{ route('dashboard.pickups.index') }}">Pickups</a>
    </li>
    <li class="breadcrumb-item active">
        {{ $pickup->pickup_id }}
    </li>
@endsection

@section('button-link')
    {{ route('dashboard.pickups.index') }}
@endsection

@section('button-icon')
    format_list_bulleted
@endsection

@section('button-title')
    All Pickups
@endsection

@section('main_content')

    <div class="page-section bg-white mt-4 border-bottom-2 ">
        <div class="container page__container">
            <div class="row">
                <div class="col-lg-5 mb-24pt mb-lg-0">
                    <div class="border-left-3 border-left-primary pl-24pt pl-md-32pt">
                        <h4 class="mb-8pt">{{ $pickup->status }}</h4>
                        <p class="text-70 mb-24pt">Edit pickup details from here</p>
                        <a href="{{ route("dashboard.pickups.edit",$pickup->id) }}"
                           class="btn btn-primary">Edit Pickup</a>
                    </div>
                </div>
                <div class="col-lg-7 d-flex align-items-center">
                    <div class="page-num-timeline d-flex flex-column flex-sm-row align-items-center justify-content-center flex">
                        @foreach($logs as $icon)
                            <a href="#"
                               data-toggle="tooltip"
                               data-placement="top"
                               data-title="{{ $icon['type'] }}"
                               class="page-num-timeline__item {{ $icon['type'] ==  $pickup->status  ? 'page-num-timeline__item-current':''}}">
                                <span class="page-num-timeline__item-tip"></span>
                                <span class="page-num"><i class="material-icons">{{ $icon['icon'] }}</i></span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container page__container">

        <div class="page-section">


            @if(isset($pickup))
                <div class="page-separator">
                    <div class="page-separator__text">Pickup Details</div>
                </div>

                <div class="row card-group-row mb-lg-8pt">
                    <div class="col-lg-8 card-group-row__col">

                        <div class="card card-group-row__card d-flex flex-column">
                            <div class="row no-gutters flex">
                                <div class="col-lg-4 col-sm-4">
                                    <div class="card-body">
                                        <h6 class="text-50">Pickup Id</h6>

                                        <div class="h2 mb-0">{{ $pickup->pickup_id }}</div>
                                        {{--<div class="d-flex flex-column">
                                            <strong>Total Posts</strong>
                                            <small class="text-50">13 this week</small>
                                        </div>--}}
                                    </div>
                                    <div class="card-body">
                                        <div class="h2 mb-0"></div>
                                        <div class="d-flex flex-column">
                                            <small class="text-50">Scheduled date</small>
                                            <strong>{{  $pickup->scheduled_date }}</strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-4 border-left">
                                    <div class="card-body">
                                        <h6 class="text-50">Pickup type</h6>

                                        <div class="h2 mb-0">{{ $pickup->type }}</div>
                                        {{--<div class="d-flex flex-column">
                                            <strong>Total Views</strong>
                                            <small class="text-50">1.3k today</small>
                                        </div>--}}
                                    </div>
                                    <div class="card-body">
                                        <div class="h2 mb-0"></div>
                                        <small class="text-50">Status</small>
                                        <strong>{{ $pickup->status }}</strong>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-4 border-left">
                                    <div class="card-body">
                                        <h6 class="text-50">Contact person</h6>

                                        <div class="h2 mb-0">{{ $pickup->contact->contact_name }} </div>
                                        <div class="d-flex flex-column">
                                            <strong>{{ $pickup->contact->contact_phone }}</strong>
                                            <small class="text-50">{{ $pickup->contact->contact_job_title }}</small>
                                        </div>
                                    </div>
                                    {{--<div class="card-body">
                                        <div class="h2 mb-0"></div>
                                        <small class="text-50">Delivery notes</small>
                                        <strong>{{ $delivery_notes }}</strong>
                                    </div>--}}
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-4">

                        <div class=" card-group-row__col">

                            <div class="card card-lg overlay--primary-dodger-blue stack stack--1 card-group-row__card">

                                <div class="card-body d-flex flex-column">
                                    <div class="d-flex align-items-center">
                                        <div class="flex">
                                            <div class="d-flex align-items-center">
                                                <div class="rounded mr-12pt z-0 o-hidden">
                                                    <div class="overlay">
                                                        <img src="{{ asset('backend/images/icon/map.png') }}"
                                                             width="40"
                                                             height="40"
                                                             alt="Angular"
                                                             class="rounded">
                                                        {{--<span class="overlay__content overlay__content-transparent">
                                                                <span class="overlay__action d-flex flex-column text-center lh-1">
                                                                    <small class="h6 small text-white mb-0"
                                                                           style="font-weight: 500;">80%</small>
                                                                </span>
                                                            </span>--}}
                                                    </div>
                                                </div>
                                                <div class="flex">
                                                    <div class="card-title">{{ $pickup->location->name }}</div>
                                                    <p class="flex text-50 lh-1 mb-0"><small>{{ $pickup->location->state->name }}</small></p>
                                                </div>
                                            </div>
                                        </div>

                                        {{--<a href="undefinedstudent-path.html"
                                           data-toggle="tooltip"
                                           data-title="Add Favorite"
                                           data-placement="top"
                                           data-boundary="window"
                                           class="ml-4pt material-icons text-20 card-course__icon-favorite">favorite_border</a>--}}

                                    </div>

                                    {{--<div class="rating mt-8pt">
                                        <span class="rating__item"><span class="material-icons">star</span></span>
                                        <span class="rating__item"><span class="material-icons">star</span></span>
                                        <span class="rating__item"><span class="material-icons">star</span></span>
                                        <span class="rating__item"><span class="material-icons">star</span></span>
                                        <span class="rating__item"><span class="material-icons">star_border</span></span>
                                    </div>--}}

                                    <p class="mt-16pt text-70 flex">{{ $pickup->location->apartment }} {{ $pickup->location->building }}, {{ $pickup->location->street }}, {{ $pickup->location->state->name }}, {{ $pickup->location->country->name }}</p>

                                    <div class="mb-16pt d-none">
                                        <div class="d-flex align-items-center">
                                            <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                                            <p class="flex text-50 lh-1 mb-0"><small>Fundamentals of working with WordPress</small></p>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                                            <p class="flex text-50 lh-1 mb-0"><small>Create complete WordPress applications</small></p>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                                            <p class="flex text-50 lh-1 mb-0"><small>Working with the WordPress CLI</small></p>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                                            <p class="flex text-50 lh-1 mb-0"><small>Understanding Dependency Injection</small></p>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                                            <p class="flex text-50 lh-1 mb-0"><small>Testing with WordPress</small></p>
                                        </div>
                                    </div>

                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <div class="d-flex align-items-center mb-4pt">
                                                <span class="material-icons icon-16pt text-50 mr-4pt">apartment</span>
                                                <p class="flex text-50 lh-1 mb-0"><small>Apartment: {{ $pickup->location->apartment }}</small></p>
                                            </div>
                                            <div class="d-flex align-items-center mb-4pt">
                                                <span class="material-icons icon-16pt text-50 mr-4pt">home_work</span>
                                                <p class="flex text-50 lh-1 mb-0"><small>Home: {{ $pickup->location->building }}</small></p>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <span class="material-icons icon-16pt text-50 mr-4pt">local_convenience_store</span>
                                                <p class="flex text-50 lh-1 mb-0"><small>Floor: {{ $pickup->location->floor }}</small></p>
                                            </div>
                                        </div>
                                        <div class="col text-right">
                                            <a href="{{ route('dashboard.locations.show',$pickup->location->id) }}"
                                               class="btn btn-outline-secondary">View Location</a>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
