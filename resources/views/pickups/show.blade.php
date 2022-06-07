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
                @can('edit courier')
                    <div class="row mb-lg-8pt">

                        <div class="col-lg-7">

                            <div class="page-separator">
                                <div class="page-separator__text">Overview</div>
                            </div>

                            <div class="">

                                <div class="card card-sm card--elevated p-relative o-hidden {{--overlay overlay--primary--}} js-overlay mdk-reveal js-mdk-reveal "
                                     {{--data-overlay-onload-show
                                     data-popover-onload-show
                                     data-force-reveal--}}
                                     data-partial-height="44"
                                     data-toggle="popover"
                                     data-trigger="click">
                                    <a href="#"
                                       class="js-image"
                                       data-position="">
                                        <img src="{{ asset('backend/images/paths/angular_430x168 copy.png') }}"
                                             alt="course">
                                        <span class="overlay__content align-items-start justify-content-start">
                                            <span class="overlay__action card-body d-flex align-items-center">
                                                <i class="material-icons mr-4pt">edit</i>
                                                <span class="card-title text-white">Edit</span>
                                            </span>
                                        </span>
                                    </a>
                                    <div class="mdk-reveal__content">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div class="flex">
                                                    <a class="card-title mb-4pt"
                                                       href="#">Edit the courier</a>
                                                </div>
                                                <a href="#"
                                                   class="ml-4pt material-icons text-20 card-course__icon-favorite">edit</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="popoverContainer d-none">
                                    @if($pickup->courier)
                                        <div class="media">
                                            <div class="media-left mr-12pt">
                                                <img src="{{ asset('backend/images/icon/client.png') }}"
                                                     width="40"
                                                     height="40"
                                                     alt="Angular"
                                                     class="rounded">
                                            </div>
                                            <div class="media-body">
                                                <div class="card-title mb-0">{{ $pickup->courier ? $pickup->courier->full_name:'' }}</div>
                                                <p class="lh-1">
                                                    <span class="text-50 small">created</span>
                                                    <span class="text-50 small font-weight-bold">{{ $pickup->updated_at }}</span>
                                                </p>
                                            </div>
                                        </div>
                                    @endif
                                    {{-- <p class="my-16pt text-70">Learn the fundamentals of working with Angular and how to create basic applications.</p>

                                     <div class="mb-16pt">
                                         <div class="d-flex align-items-center">
                                             <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                                             <p class="flex text-50 lh-1 mb-0"><small>Fundamentals of working with Angular</small></p>
                                         </div>
                                         <div class="d-flex align-items-center">
                                             <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                                             <p class="flex text-50 lh-1 mb-0"><small>Create complete Angular applications</small></p>
                                         </div>
                                         <div class="d-flex align-items-center">
                                             <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                                             <p class="flex text-50 lh-1 mb-0"><small>Working with the Angular CLI</small></p>
                                         </div>
                                         <div class="d-flex align-items-center">
                                             <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                                             <p class="flex text-50 lh-1 mb-0"><small>Understanding Dependency Injection</small></p>
                                         </div>
                                         <div class="d-flex align-items-center">
                                             <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                                             <p class="flex text-50 lh-1 mb-0"><small>Testing with Angular</small></p>
                                         </div>
                                     </div>--}}

                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            {{--<div class="d-flex align-items-center mb-4pt">
                                                <span class="material-icons icon-16pt text-50 mr-4pt">access_time</span>
                                                <p class="flex text-50 lh-1 mb-0"><small>6 hours</small></p>
                                            </div>
                                            <div class="d-flex align-items-center mb-4pt">
                                                <span class="material-icons icon-16pt text-50 mr-4pt">play_circle_outline</span>
                                                <p class="flex text-50 lh-1 mb-0"><small>12 lessons</small></p>
                                            </div>--}}
                                            {{--<div class="d-flex align-items-center">
                                                <span class="material-icons icon-16pt text-50 mr-4pt">assessment</span>
                                                <p class="flex text-50 lh-1 mb-0"><small>Beginner</small></p>
                                            </div>--}}
                                        </div>
                                        <div class="col text-right">
                                            <a href="{{ route('dashboard.orders.courier',$pickup->id) }}"
                                               class="btn btn-primary">Edit Courier</a>
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class=" card-group-row__col">

                                <div class="card js-overlay card-sm overlay--primary-dodger-blue stack stack--1 card-group-row__card"
                                     data-toggle="popover"
                                     data-trigger="click">

                                    <div class="card-body d-flex flex-column">
                                        <div class="d-flex align-items-center">
                                            <div class="flex">
                                                <div class="d-flex align-items-center">
                                                    @if($pickup->courier)
                                                        <div class="rounded mr-12pt z-0 o-hidden">
                                                            <div class="overlay">
                                                                <img src="{{ asset('backend/images/icon/client.png') }}"
                                                                     width="40"
                                                                     height="40"
                                                                     alt="Angular"
                                                                     class="rounded">
                                                                <span class="overlay__content overlay__content-transparent">
                                                                    <span class="overlay__action d-flex flex-column text-center lh-1">
                                                                        <small class="h6 small text-white mb-0"
                                                                               style="font-weight: 500;">100%</small>
                                                                    </span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="flex">
                                                            <div class="card-title">{{ $pickup->courier ? $pickup->courier->full_name:'' }}</div>
                                                            <p class="flex text-50 lh-1 mb-0"><small>{{ $pickup->courier ? $count_order = \App\Models\Order::where('courier_user_id',$pickup->courier_user_id)->count(): $count_order ='' }} order(s)</small></p>
                                                        </div>
                                                    @else
                                                        <a href="{{ route('dashboard.orders.courier',$pickup->id) }}"
                                                           class="btn btn-primary">Edit Courier</a>
                                                    @endif

                                                </div>
                                            </div>

                                            {{--   <a href="#"
                                                  data-toggle="tooltip"
                                                  data-title="Add Favorite"
                                                  data-placement="top"
                                                  data-boundary="window"
                                                  class="ml-4pt material-icons text-20 card-course__icon-favorite">favorite_border</a>--}}

                                        </div>

                                    </div>
                                </div>
                                @if($pickup->courier)
                                    <div class="popoverContainer d-none">
                                        <div class="media">
                                            <div class="media-left mr-12pt">
                                                <img src="{{ asset('backend/images/icon/client.png') }}"
                                                     width="40"
                                                     height="40"
                                                     alt="Angular"
                                                     class="rounded">
                                            </div>
                                            <div class="media-body">
                                                <div class="card-title">{{ $pickup->courier ? $pickup->courier->full_name:'' }}</div>
                                                <p class="text-50 d-flex lh-1 mb-0 small">{{ $count_order }} order(s)</p>
                                            </div>
                                        </div>
                                        {{--<p class="mt-16pt text-70">Learn the fundamentals of working with Figma and how to create basic applications.</p>

                                        <div class="my-32pt">
                                            <div class="d-flex align-items-center mb-8pt justify-content-center">
                                                <div class="d-flex align-items-center mr-8pt">
                                                    <span class="material-icons icon-16pt text-50 mr-4pt">access_time</span>
                                                    <p class="flex text-50 lh-1 mb-0"><small>50 minutes left</small></p>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <span class="material-icons icon-16pt text-50 mr-4pt">play_circle_outline</span>
                                                    <p class="flex text-50 lh-1 mb-0"><small>12 lessons</small></p>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-center">
                                                <a href="#"
                                                   class="btn btn-primary mr-8pt">Resume</a>
                                                <a href="#"
                                                   class="btn btn-outline-secondary ml-0">Start over</a>
                                            </div>
                                        </div>

                                        <div class="d-flex align-items-center">
                                            <small class="text-50 mr-8pt">Your rating</small>
                                            <div class="rating mr-8pt">
                                                <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                                <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                                <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                                <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                                <span class="rating__item"><span class="material-icons text-primary">star_border</span></span>
                                            </div>
                                            <small class="text-50">4/5</small>
                                        </div>--}}
                                    </div>
                                @endif
                            </div>

                            <div class="row mb-lg-8pt">
                                <div class="col-md-4 col-lg-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="position-relative mr-16pt" style="cursor: pointer" onclick="location.href='{{ route('dashboard.users.index') }}'">
                                                    <div class="text-center fullbleed d-flex align-items-center justify-content-center flex-column z-0">
                                                        <i class="material-icons ">person</i>
                                                    </div>
                                                    <canvas width="48"
                                                            height="48">
                                                    </canvas>
                                                </div>
                                                <div class="flex">
                                                    <strong>{{ $pickup->business->full_name }}</strong>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="position-relative mr-16pt" style="cursor: pointer" onclick="location.href='{{ route('dashboard.orders.create.airwaybell',$pickup->id) }}'">
                                                    <div class="text-center fullbleed d-flex align-items-center justify-content-center flex-column z-0">
                                                        <i class="material-icons ">receipt</i>
                                                    </div>
                                                    <canvas width="48"
                                                            height="48">
                                                    </canvas>
                                                </div>
                                                <div class="flex">
                                                    <strong>Airway bell</strong>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @can('edit orders')
                                    <div class="col-md-4 col-lg-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="position-relative mr-16pt" style="cursor: pointer" onclick="location.href='{{ route('dashboard.orders.edit',$pickup->id) }}'">
                                                        <div class="text-center fullbleed d-flex align-items-center justify-content-center flex-column z-0">
                                                            <i class="material-icons ">edit</i>
                                                        </div>
                                                        <canvas width="48"
                                                                height="48">
                                                        </canvas>
                                                    </div>
                                                    <div class="flex">
                                                        <strong>Edit Order</strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endcan
                            </div>

                        </div>
                        <div class="col-lg-5">

                            <div class="page-separator">
                                <div class="page-separator__text">Codes</div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex align-items-center">
                                        <div class="flex">
                                            <strong class="card-title">Codes</strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body d-flex flex-column align-items-center justify-content-center p-24pt">
                                    <h3 class="text-accent">QR Code</h3>
                                    <div class="mb-24pt d-inline-flex flex-column text-center">
                                        <div class="d-flex align-items-center">
                                            <div class="mb-3">{!! $qr; !!}</div>
                                        </div>
                                    </div>
                                    <h3 class="text-accent">Barcode</h3>
                                    <div class="d-flex align-items-center">
                                        <div class="mb-3">{!! DNS1D::getBarcodeHTML('4445645656', 'C128') !!} <h5 class="text-spacing">{{ $pickup->tracking_no }}</h5></div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                @endcan
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
