@extends('layouts.backend')

@section('title')
    Tracking No. {{ $order->tracking_no }}
@endsection

@section('links')
    <li class="breadcrumb-item ">
        <a href="{{ route('orders.index') }}">Orders</a>
    </li>
    <li class="breadcrumb-item active">
        {{ $order->tracking_no }}
    </li>
@endsection

@section('button-link')
    {{ route('orders.index') }}
@endsection

@section('button-icon')
    format_list_bulleted
@endsection

@section('button-title')
    All Orders
@endsection

@section('main_content')

    <div class="page-section bg-white mt-4 border-bottom-2 ">
        <div class="container page__container">
            <div class="row">
                <div class="col-lg-5 mb-24pt mb-lg-0">
                    <div class="border-left-3 border-left-primary pl-24pt pl-md-32pt">
                        <h4 class="mb-8pt">Pending pickup</h4>
                        <p class="text-70 mb-24pt">It is expected to be pickup your order at pickup date.</p>
                        {{--<a href="student-path-assessment.html"
                           class="btn btn-primary">Start assessment</a>--}}
                    </div>
                </div>
                <div class="col-lg-7 d-flex align-items-center">
                    <div class="page-num-timeline d-flex flex-column flex-sm-row align-items-center justify-content-center flex">
                        <a href=""
                           data-toggle="tooltip"
                           data-placement="top"
                           data-title="New"
                           class="page-num-timeline__item page-num-timeline__item-current">
                            <span class="page-num-timeline__item-tip"></span>
                            <span class="page-num"><i class="material-icons">new_releases</i></span>
                        </a>
                        <a href=""
                           data-toggle="tooltip"
                           data-placement="top"
                           data-title="Picked up"
                           class="page-num-timeline__item">
                            <span class="page-num-timeline__item-tip"></span>
                            <span class="page-num"><i class="material-icons">hail</i></span>
                        </a>
                        <a href=""
                           data-toggle="tooltip"
                           data-placement="top"
                           data-title="In transit"
                           class="page-num-timeline__item">
                            <span class="page-num-timeline__item-tip"></span>
                            <span class="page-num"><i class="material-icons">home_work</i></span>
                        </a>
                        <a href=""
                           data-toggle="tooltip"
                           data-placement="top"
                           data-title="Out for delivery"
                           class="page-num-timeline__item">
                            <span class="page-num-timeline__item-tip"></span>
                            <span class="page-num"><i class="material-icons">local_shipping</i></span>
                        </a>
                        <a href=""
                           data-toggle="tooltip"
                           data-placement="top"
                           data-title="Delivered"
                           class="page-num-timeline__item">
                            <span class="page-num-timeline__item-tip"></span>
                            <span class="page-num"><i class="material-icons">check</i></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container page__container">

        <div class="page-section">

            <div class="row mb-lg-8pt">

                <div class="col-lg-8">

                    <div class="page-separator">
                        <div class="page-separator__text">Overview</div>
                    </div>

                    <div class="card">
                        <div class="card-body p-24pt">
                            <div class="row">
                                <div class="col-6">
                                    <div class="chart"
                                         style="height: 262px;">
                                        <div class="text-center fullbleed d-flex align-items-center justify-content-center flex-column z-0">
                                            <h2 class="m-0">25%</h2>
                                            <strong>In-time</strong>
                                        </div>
                                        <canvas class="chart-canvas position-relative z-1"
                                                id="attendanceDoughnutChart"
                                                data-chart-legend="#attendanceDoughnutChartLegend"
                                                data-chart-line-background-color="primary;accent;gray.700;gray">
                                                        <span style="font-size: 1rem;"
                                                              class="text-muted"><strong>Attendance</strong> doughnut chart goes here.</span>
                                        </canvas>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="nav border-0">
                                        <div class="row no-gutters flex"
                                             role="tablist">
                                            <div class="col-auto">
                                                <div class="d-flex align-items-center">
                                                    <div class="h2 mb-0 mr-3">17</div>
                                                    <div class="flex">
                                                        <p class="card-title">Leave requests</p>
                                                        <p class="card-subtitle text-50">
                                                            <small>Last 30 days</small>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto ml-sm-auto">
                                                <a href="#"><i class="material-icons text-50">more_horiz</i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="attendanceDoughnutChartLegend"
                                         class="chart-legend chart-legend--vertical mt-24pt"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-lg-8pt">
                        <div class="col-md-6 col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="position-relative mr-16pt">
                                            <div class="text-center fullbleed d-flex align-items-center justify-content-center flex-column z-0">
                                                <small>92%</small>
                                            </div>
                                            <canvas width="48"
                                                    height="48"
                                                    class="chart-canvas position-relative z-1 js-update-chart-progress"
                                                    id="inTimeProgressChart"
                                                    data-chart-line-background-color="primary;gray"
                                                    data-chart-disable-tooltips="true"></canvas>
                                        </div>
                                        <div class="flex">
                                            <strong>In Time</strong>
                                        </div>
                                        <div class="text-50">60</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="position-relative mr-16pt">
                                            <div class="text-center fullbleed d-flex align-items-center justify-content-center flex-column z-0">
                                                <small>23%</small>
                                            </div>
                                            <canvas width="48"
                                                    height="48"
                                                    class="chart-canvas position-relative z-1 js-update-chart-progress-accent"
                                                    id="lateProgressChart"
                                                    data-chart-line-background-color="accent;gray"
                                                    data-chart-disable-tooltips="true"></canvas>
                                        </div>
                                        <div class="flex">
                                            <strong>In Time</strong>
                                        </div>
                                        <div class="text-50">15</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">

                    <div class="page-separator">
                        <div class="page-separator__text">Codes</div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <div class="flex">
                                    <strong class="card-title">Codes</strong>
                                </div>
                                <i class="material-icons text-50">more_horiz</i>
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
                                <div class="mb-3">{!! DNS1D::getBarcodeHTML('4445645656', 'C128') !!} <h5 class="text-spacing">{{ $order->tracking_no }}</h5></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="page-separator">
                <div class="page-separator__text">Order Details</div>
            </div>

            <div class="row card-group-row mb-lg-8pt">
                <div class="col-lg-12 card-group-row__col">

                    <div class="card card-group-row__card d-flex flex-column">
                        <div class="row no-gutters flex">
                            <div class="col-lg-2 col-sm-4">
                                <div class="card-body">
                                    <h6 class="text-50">Type</h6>

                                    <div class="h2 mb-0">{{ $order->type }}</div>
                                    {{--<div class="d-flex flex-column">
                                        <strong>Total Posts</strong>
                                        <small class="text-50">13 this week</small>
                                    </div>--}}
                                </div>
                                <div class="card-body">
                                    <div class="h2 mb-0"></div>
                                    <div class="d-flex flex-column">
                                        <small class="text-50">Last update date</small>
                                        <strong>{{ $order->updated_at }}</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-4 border-left">
                                <div class="card-body">
                                    <h6 class="text-50">Order reference</h6>

                                    <div class="h2 mb-0">{{ $order->order_reference ? $order->order_reference:'None' }}</div>
                                    {{--<div class="d-flex flex-column">
                                        <strong>Total Views</strong>
                                        <small class="text-50">1.3k today</small>
                                    </div>--}}
                                </div>
                                <div class="card-body">
                                    <div class="h2 mb-0"></div>
                                    <small class="text-50">Package description</small>
                                    <strong>{{ $order->package_description }}</strong>
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-4 border-left">
                                <div class="card-body">
                                    <h6 class="text-50">Cash on delivery</h6>

                                    <div class="h2 mb-0">{{ $order->cash_on_delivery }} <small>EGP</small></div>
                                    {{--<div class="d-flex flex-column">
                                        <strong>Total Views</strong>
                                        <small class="text-50">1.3k today</small>
                                    </div>--}}
                                </div>
                                <div class="card-body">
                                    <div class="h2 mb-0"></div>
                                    <small class="text-50">Delivery notes</small>
                                    <strong>{{ $order->delivery_notes }}</strong>
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-4 border-left">
                                <div class="card-body">
                                    <h6 class="text-50">Package Type</h6>

                                    <div class="h2 mb-0">{{ $order->package_type }}</div>
                                    {{--<div class="d-flex flex-column">
                                        <strong>Total Views</strong>
                                        <small class="text-50">1.3k today</small>
                                    </div>--}}
                                </div>
                                {{--<div class="card-body">
                                    <div class="h2 mb-0">113</div>
                                    <strong>Comments</strong>
                                </div>--}}
                            </div>
                            <div class="col-lg-2 col-sm-4 border-left">
                                <div class="card-body">
                                    <h6 class="text-50">No. of items</h6>

                                    <div class="h2 mb-0">{{ $order->no_of_items > 1 ? $order->no_of_items:1 }}</div>
                                    {{--<div class="d-flex flex-column">
                                        <strong>Total Views</strong>
                                        <small class="text-50">1.3k today</small>
                                    </div>--}}
                                </div>
                               {{-- <div class="card-body">
                                    <div class="h2 mb-0">113</div>
                                    <strong>Comments</strong>
                                </div>--}}
                            </div>
                            <div class="col-lg-2 col-sm-4 border-left">
                                <div class="card-body">
                                    <h6 class="text-50">Opening Package</h6>

                                    <div class="h2 mb-0">{{ $order->open_package == 1 ? 'Yes':'No' }}</div>
                                    {{--<div class="d-flex flex-column">
                                        <strong>Total Views</strong>
                                        <small class="text-50">1.3k today</small>
                                    </div>--}}
                                </div>
                                {{--<div class="card-body">
                                    <div class="h2 mb-0">113</div>
                                    <strong>Comments</strong>
                                </div>--}}
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row mb-lg-8pt">
                <div class="col-lg-6">

                    <div class="page-separator">
                        <div class="page-separator__text">Customer Info</div>
                    </div>

                    <div class=" card-group-row__col">

                        <div class="card card-lg overlay--primary-dodger-blue stack stack--1 card-group-row__card">

                            <div class="card-body d-flex flex-column">
                                <div class="d-flex align-items-center">
                                    <div class="flex">
                                        <div class="d-flex align-items-center">
                                            <div class="rounded mr-12pt z-0 o-hidden">
                                                <div class="overlay">
                                                    {{--<img src="{{ asset('backend/images/paths/wordpress_40x40@2x.png') }}"
                                                         width="40"
                                                         height="40"
                                                         alt="Angular"
                                                         class="rounded">--}}
                                                    <div class="avatar avatar-sm mr-8pt">

                                                        <span class="avatar-title rounded-circle">{{ initials($order->customer->user->full_name) }}</span>

                                                    </div>
                                                   {{-- <span class="overlay__content overlay__content-transparent">
                                                                <span class="overlay__action d-flex flex-column text-center lh-1">
                                                                    <small class="h6 small text-white mb-0"
                                                                           style="font-weight: 500;">80%</small>
                                                                </span>
                                                            </span>--}}
                                                </div>
                                            </div>
                                            <div class="flex">
                                                <div class="card-title">{{ $order->customer->user->full_name }}</div>
                                                <p class="flex text-50 lh-1 mb-0"><small>{{ $order->customer->status }}</small></p>
                                                <span class="indicator-line rounded {{ $order->customer->status == 'active' ? 'bg-success':'bg-danger' }}"></span>
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

                                <p class="mt-16pt text-70 flex">{{ $order->customer->user->email }}</p>

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
                                            <span class="material-icons icon-16pt text-50 mr-4pt">phone</span>
                                            <p class="flex text-50 lh-1 mb-0"><small>Phone: {{ $order->customer->user->phone }}</small></p>
                                        </div>
                                        <div class="d-flex align-items-center mb-4pt">
                                            <span class="material-icons icon-16pt text-50 mr-4pt">phone</span>
                                            <p class="flex text-50 lh-1 mb-0"><small>Other phone: {{ $order->customer->user->other_phone }}</small></p>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <span class="material-icons icon-16pt text-50 mr-4pt">event</span>
                                            <p class="flex text-50 lh-1 mb-0"><small>Joined: {{ $order->customer->user->created_at }}</small></p>
                                        </div>
                                    </div>
                                    <div class="col text-right">
                                        <a href="{{ route('customers.show',$order->customer->id) }}"
                                           class="btn btn-outline-secondary">View Customer</a>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="page-separator">
                        <div class="page-separator__text">Customer Location</div>
                    </div>

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
                                                <div class="card-title">{{ $order->location->name }}</div>
                                                <p class="flex text-50 lh-1 mb-0"><small>{{ $order->location->state->name }}</small></p>
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

                                <p class="mt-16pt text-70 flex">{{ $order->location->apartment }} {{ $order->location->building }}, {{ $order->location->street }}, {{ $order->location->state->name }}, {{ $order->location->country->name }}</p>

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
                                            <p class="flex text-50 lh-1 mb-0"><small>Apartment: {{ $order->location->apartment }}</small></p>
                                        </div>
                                        <div class="d-flex align-items-center mb-4pt">
                                            <span class="material-icons icon-16pt text-50 mr-4pt">home_work</span>
                                            <p class="flex text-50 lh-1 mb-0"><small>Home: {{ $order->location->building }}</small></p>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <span class="material-icons icon-16pt text-50 mr-4pt">local_convenience_store</span>
                                            <p class="flex text-50 lh-1 mb-0"><small>Floor: {{ $order->location->floor }}</small></p>
                                        </div>
                                    </div>
                                    <div class="col text-right">
                                        <a href="{{ route('locations.show',$order->location->id) }}"
                                           class="btn btn-outline-secondary">View Location</a>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

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

                                    <div class="h2 mb-0">{{ $order->pickup->pickup_id }}</div>
                                    {{--<div class="d-flex flex-column">
                                        <strong>Total Posts</strong>
                                        <small class="text-50">13 this week</small>
                                    </div>--}}
                                </div>
                                <div class="card-body">
                                    <div class="h2 mb-0"></div>
                                    <div class="d-flex flex-column">
                                        <small class="text-50">Scheduled date</small>
                                        <strong>{{  $order->pickup->scheduled_date }}</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-4 border-left">
                                <div class="card-body">
                                    <h6 class="text-50">Pickup type</h6>

                                    <div class="h2 mb-0">{{ $order->pickup->type }}</div>
                                    {{--<div class="d-flex flex-column">
                                        <strong>Total Views</strong>
                                        <small class="text-50">1.3k today</small>
                                    </div>--}}
                                </div>
                                <div class="card-body">
                                    <div class="h2 mb-0"></div>
                                    <small class="text-50">Status</small>
                                    <strong>{{ $order->pickup->status }}</strong>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-4 border-left">
                                <div class="card-body">
                                    <h6 class="text-50">Contact person</h6>

                                    <div class="h2 mb-0">{{ $order->pickup->contact->contact_name }} </div>
                                    <div class="d-flex flex-column">
                                        <strong>{{ $order->pickup->contact->contact_phone }}</strong>
                                        <small class="text-50">{{ $order->pickup->contact->contact_job_title }}</small>
                                    </div>
                                </div>
                                {{--<div class="card-body">
                                    <div class="h2 mb-0"></div>
                                    <small class="text-50">Delivery notes</small>
                                    <strong>{{ $order->delivery_notes }}</strong>
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
                                                <div class="card-title">{{ $order->pickup->location->name }}</div>
                                                <p class="flex text-50 lh-1 mb-0"><small>{{ $order->pickup->location->state->name }}</small></p>
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

                                <p class="mt-16pt text-70 flex">{{ $order->pickup->location->apartment }} {{ $order->pickup->location->building }}, {{ $order->pickup->location->street }}, {{ $order->pickup->location->state->name }}, {{ $order->pickup->location->country->name }}</p>

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
                                            <p class="flex text-50 lh-1 mb-0"><small>Apartment: {{ $order->pickup->location->apartment }}</small></p>
                                        </div>
                                        <div class="d-flex align-items-center mb-4pt">
                                            <span class="material-icons icon-16pt text-50 mr-4pt">home_work</span>
                                            <p class="flex text-50 lh-1 mb-0"><small>Home: {{ $order->pickup->location->building }}</small></p>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <span class="material-icons icon-16pt text-50 mr-4pt">local_convenience_store</span>
                                            <p class="flex text-50 lh-1 mb-0"><small>Floor: {{ $order->pickup->location->floor }}</small></p>
                                        </div>
                                    </div>
                                    <div class="col text-right">
                                        <a href="{{ route('locations.show',$order->pickup->location->id) }}"
                                           class="btn btn-outline-secondary">View Location</a>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
