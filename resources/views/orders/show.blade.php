@extends('layouts.backend')
@php $locale = session()->get('locale'); @endphp

@section('title')
    {{ __('dashboard.Tracking_No') }} {{ $order->tracking_no }}
@endsection

@section('links')
    <li class="breadcrumb-item ">
        <a href="{{ route('dashboard.orders.index') }}">{{ __('dashboard.Orders') }}</a>
    </li>
    <li class="breadcrumb-item active">
        {{ $order->tracking_no }}
    </li>
@endsection

@section('button-link')
    {{ route('dashboard.orders.index') }}
@endsection

@section('button-icon')
    format_list_bulleted
@endsection

@section('button-title')
    {{ __('dashboard.All_orders') }}
@endsection

@section('main_content')

    <div class="page-section bg-white mt-4 border-bottom-2 ">
        <div class="container page__container">
            <div class="row">
                <div class="col-lg-5 mb-24pt mb-lg-0">
                    <div class="border-left-3 border-left-primary pl-24pt pl-md-32pt">
                        <h4 class="mb-8pt">{{ $log ? __('dashboard.'.$log->status):'' }} {{ $log->hub ? ($locale == 'ar' ? '('.$log->hub->ar_name.')':'('.$log->hub->en_name.')'):'' }}</h4>
                        <p class="text-70 mb-24pt">{{ $log ? __('dashboard.'.$log->description):'' }}</p>
                        @can('edit log')
                        <a href="{{ route("dashboard.order-logs.index",$order->id) }}"
                           class="btn btn-primary">{{ __('dashboard.Order Logs') }}</a>
                        @endcan
                    </div>
                </div>
                <div class="col-lg-7 d-flex align-items-center">
                    <div class="page-num-timeline d-flex flex-column flex-sm-row align-items-center justify-content-center flex">
                        @foreach($logs as $icon)
                            <a href="#"
                               data-toggle="tooltip"
                               data-placement="top"
                               data-title="{{ __('dashboard.'.$icon['type']) }}"
                               class="page-num-timeline__item {{ $icon['type'] ==  ($log ? $log->status:'')  ? 'page-num-timeline__item-current':''}}">
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


                <div class="row mb-lg-8pt">
                    @can('edit courier')
                    <div class="col-lg-7">

                        <div class="page-separator">
                            <div class="page-separator__text">{{ __('dashboard.Couriers') }}</div>
                        </div>

                        <div class="">

                            <div class="card card-sm card--elevated p-relative o-hidden overlay overlay--primary js-overlay mdk-reveal js-mdk-reveal "
                                 data-overlay-onload-show
                                 data-popover-onload-show
                                 data-force-reveal
                                 data-partial-height="44"
                                 data-toggle="popover"
                                 data-trigger="click">
                                <a href="#"
                                   class="js-image"
                                   data-position="">
                                    <img src="{{ asset('backend/images/paths/angular_430x168 copy.png') }}"
                                         alt="course">
                                </a>
                                <div class="mdk-reveal__content">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex">
                                                <a class="card-title mb-4pt"
                                                   href="#">{{ __('dashboard.Couriers') }}</a>
                                            </div>
                                            <a href="#"
                                               class="ml-4pt material-icons text-20 card-course__icon-favorite">arrow_forward</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="popoverContainer d-none">

                                @forelse($order->couriers as $courier)
                                    <div class="col-sm-12 card-group-row__col">

                                        <div class="card js-overlay card-sm overlay--primary-dodger-blue stack stack--1 card-group-row__card"
                                             data-toggle="popover"
                                             data-trigger="click">

                                            <div class="card-body d-flex flex-column">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex">
                                                        <div class="d-flex align-items-center">
                                                            <div class="rounded mr-12pt z-0 o-hidden">
                                                                <div class="overlay">
                                                                    <img src="{{ $courier->courier->avatar ? asset("storage/user/{$courier->courier_id}/{$courier->courier->avatar}"):asset('backend/images/icon/client.png') }}"
                                                                         width="40"
                                                                         height="40"
                                                                         alt="Angular"
                                                                         class="rounded">
                                                                </div>
                                                            </div>
                                                            <div class="flex">
                                                                <div class="card-title">{{ $courier->courier->full_name }}</div>
                                                                @if($courier->courier->phone)
                                                                    <p class="flex text-50 lh-1 mb-0"><small>{{ __('dashboard.Phone') }}: {{ $courier->courier->phone }}</small></p>
                                                                @endif
                                                                <p class="flex text-50 lh-1 mb-0"><small>{{ __('dashboard.Assigned') }}: {{ date("F j, Y g:i A", strtotime($courier->updated_at)) }}</small></p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <a href="{{ route('dashboard.orders.courier.edit',[$order->id,$courier->id]) }}"
                                                       data-toggle="tooltip"
                                                       data-title="Edit"
                                                       data-placement="top"
                                                       data-boundary="window"
                                                       class="ml-4pt material-icons text-20 card-course__icon-favorite">arrow_forward</a>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class=" mb-lg-16pt">
                                        <a href="{{ route('dashboard.orders.courier',$order->id) }}"
                                           class="btn btn-primary"><i class="material-icons icon--left">add</i> {{ __('dashboard.Add Courier') }}</a>
                                        <br>
                                    </div>
                                @endforelse
                            </div>

                        </div>

                        <div class=" mb-lg-16pt">
                            <a href="{{ route('dashboard.orders.courier',$order->id) }}"
                               class="btn btn-primary"><i class="material-icons icon--left">add</i> {{ __('dashboard.Add Courier') }}</a>
                            <br>
                        </div>

                        <div class="row mb-lg-8pt">
                            <div class="{{ $no_edit == 0 ? 'col-md-4 col-lg-4':'col-md-6 col-lg-6' }}">
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
                                                <strong>{{ $order->business->full_name }}</strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="{{ $no_edit == 0 ? 'col-md-4 col-lg-4':'col-md-6 col-lg-6' }}">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="position-relative mr-16pt" style="cursor: pointer" onclick="location.href='{{ route('dashboard.orders.create.airwaybell',$order->id) }}'">
                                                <div class="text-center fullbleed d-flex align-items-center justify-content-center flex-column z-0">
                                                    <i class="material-icons ">receipt</i>
                                                </div>
                                                <canvas width="48"
                                                        height="48">
                                                </canvas>
                                            </div>
                                            <div class="flex">
                                                <strong>{{ __('dashboard.Airwaybell') }}</strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @can('edit orders')
                                @if($no_edit == 0)
                                    <div class="col-md-4 col-lg-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="position-relative mr-16pt" style="cursor: pointer" onclick="location.href='{{ route('dashboard.orders.edit',$order->id) }}'">
                                                        <div class="text-center fullbleed d-flex align-items-center justify-content-center flex-column z-0">
                                                            <i class="material-icons ">edit</i>
                                                        </div>
                                                        <canvas width="48"
                                                                height="48">
                                                        </canvas>
                                                    </div>
                                                    <div class="flex">
                                                        <strong>{{ __('dashboard.Edit_Order') }}</strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endcan
                        </div>

                    </div>
                    @endcan
                    @hasanyrole('operation courier|admin')
                    <div class=" @can('edit courier') col-lg-5 @else col-lg-12 @endcan">

                        <div class="page-separator">
                            <div class="page-separator__text">{{ __('dashboard.Codes') }}</div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <div class="flex">
                                        <strong class="card-title">{{ __('dashboard.Codes') }}</strong>
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
                                    <div class="mb-3">{!! DNS1D::getBarcodeHTML('4445645656', 'C128') !!} <h5 class="text-spacing">{{ $order->tracking_no }}</h5></div>
                                </div>
                            </div>
                        </div>

                    </div>
                    @endhasanyrole
                </div>

            <div class="page-separator">
                <div class="page-separator__text">{{ __('dashboard.Order Details') }}</div>
            </div>

            <div class="row card-group-row mb-lg-8pt">
                @hasanyrole('customer')
                <div class="col-lg-10 card-group-row__col">
                @else
                <div class="col-lg-12 card-group-row__col">
                    @endhasanyrole

                    <div class="card card-group-row__card d-flex flex-column">
                        <div class="row no-gutters flex">
                            <div class="{{ $order->type == 'Cash Collection' ? 'col-lg-4':'col-lg-2' }} col-sm-4">
                                <div class="card-body">
                                    <h6 class="text-50">{{ __('dashboard.Type') }}</h6>

                                    <div class="h2 mb-0">{{ $order->type }}</div>
                                    {{--<div class="d-flex flex-column">
                                        <strong>Total Posts</strong>
                                        <small class="text-50">13 this week</small>
                                    </div>--}}
                                </div>
                                <div class="card-body">
                                    <div class="h2 mb-0"></div>
                                    <div class="d-flex flex-column">
                                        <small class="text-50">{{ __('dashboard.Last updated date') }}</small>
                                        <strong>{{ $order->updated_at }}</strong>
                                    </div>
                                </div>
                            </div>
                            @switch($order->type)
                                @case('Deliver')
                                <div class="col-lg-2 col-sm-4 border-left">
                                    <div class="card-body">
                                        <h6 class="text-50">{{ __('dashboard.Order reference') }}</h6>

                                        <div class="h2 mb-0">{{ $order->order_reference ? $order->order_reference:'None' }}</div>
                                        {{--<div class="d-flex flex-column">
                                            <strong>Total Views</strong>
                                            <small class="text-50">1.3k today</small>
                                        </div>--}}
                                    </div>
                                    <div class="card-body">
                                        <div class="h2 mb-0"></div>
                                        <small class="text-50">{{ __('dashboard.Package Description') }}</small>
                                        <strong>{{ $order->package_description }}</strong>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-4 border-left">
                                    <div class="card-body">
                                        <h6 class="text-50">{{ __('dashboard.Cash on Delivery') }}</h6>

                                        <div class="h2 mb-0">{{ $order->cash_on_delivery }} <small>{{ __('dashboard.EGP') }}</small></div>
                                        {{--<div class="d-flex flex-column">
                                            <strong>Total Views</strong>
                                            <small class="text-50">1.3k today</small>
                                        </div>--}}
                                    </div>
                                    <div class="card-body">
                                        <div class="h2 mb-0"></div>
                                        <small class="text-50">{{ __('dashboard.Delivery Notes') }}</small>
                                        <strong>{{ $order->delivery_notes }}</strong>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-4 border-left">
                                    <div class="card-body">
                                        <h6 class="text-50">{{ __('dashboard.Package Type') }}</h6>

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
                                        <h6 class="text-50">{{ __('dashboard.Number of Items') }}</h6>

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
                                        <h6 class="text-50">{{ __('dashboard.Opening Package') }}</h6>

                                        <div class="h2 mb-0">{{ $order->open_package == 1 ? ($locale == 'ar' ?'نعم':'Yes'):($locale == 'ar' ?'لا':'No') }}</div>
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
                                @break
                                @case('Exchange')
                                <div class="col-lg-2 col-sm-4 border-left">
                                    <div class="card-body">
                                        <h6 class="text-50">{{ __('dashboard.Order reference') }}</h6>

                                        <div class="h2 mb-0">{{ $order->order_reference_exchange ? $order->order_reference_exchange:'None' }}</div>
                                        {{--<div class="d-flex flex-column">
                                            <strong>Total Views</strong>
                                            <small class="text-50">1.3k today</small>
                                        </div>--}}
                                    </div>
                                    <div class="card-body">
                                        <div class="h2 mb-0"></div>
                                        <small class="text-50">{{ __('dashboard.Package Description') }}</small>
                                        <strong>{{ $order->package_description_exchange }}</strong>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-4 border-left">
                                    <div class="card-body">
                                        <h6 class="text-50">{{ __('dashboard.Cash Exchange Amount') }}</h6>

                                        <div class="h2 mb-0">{{ $order->cash_exchange_amount }} <small>{{ __('dashboard.EGP') }}</small></div>
                                        {{--<div class="d-flex flex-column">
                                            <strong>Total Views</strong>
                                            <small class="text-50">1.3k today</small>
                                        </div>--}}
                                    </div>
                                    <div class="card-body">
                                        <div class="h2 mb-0"></div>
                                        <small class="text-50">{{ __('dashboard.Delivery Notes') }}</small>
                                        <strong>{{ $order->delivery_notes }}</strong>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-4 border-left">
                                    <div class="card-body">
                                        <h6 class="text-50">{{ __('dashboard.Number of Items') }}</h6>

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
                                        <h6 class="text-50">{{ __('dashboard.No. of items to return') }}</h6>

                                        <div class="h2 mb-0">{{ $order->no_of_items_of_return_package_exchange }}</div>
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
                                        <h6 class="text-50">{{ __('dashboard.Opening Package') }}</h6>

                                        <div class="h2 mb-0">{{ $order->allow_opening == 1 ? ($locale == 'ar' ?'نعم':'Yes'):($locale == 'ar' ?'لا':'No') }}</div>
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
                                @break
                                @case('Return')
                                <div class="col-lg-4 col-sm-4 border-left">
                                    <div class="card-body">
                                        <h6 class="text-50">{{ __('dashboard.Order reference') }}</h6>

                                        <div class="h2 mb-0">{{ $order->order_reference_return ? $order->order_reference_return:'None' }}</div>
                                        {{--<div class="d-flex flex-column">
                                            <strong>Total Views</strong>
                                            <small class="text-50">1.3k today</small>
                                        </div>--}}
                                    </div>
                                    <div class="card-body">
                                        <div class="h2 mb-0"></div>
                                        <small class="text-50">{{ __('dashboard.Package Description') }}</small>
                                        <strong>{{ $order->package_description_return }}</strong>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-4 border-left">
                                    <div class="card-body">
                                        <h6 class="text-50">{{ __('dashboard.Refund amount') }}</h6>

                                        <div class="h2 mb-0">{{ $order->refund_amount }} <small>{{ __('dashboard.EGP') }}</small></div>
                                        {{--<div class="d-flex flex-column">
                                            <strong>Total Views</strong>
                                            <small class="text-50">1.3k today</small>
                                        </div>--}}
                                    </div>
                                    <div class="card-body">
                                        <div class="h2 mb-0"></div>
                                        <small class="text-50">{{ __('dashboard.Delivery Notes') }}</small>
                                        <strong>{{ $order->delivery_notes }}</strong>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-4 border-left">
                                    <div class="card-body">
                                        <h6 class="text-50">{{ __('dashboard.No. of items to return') }}</h6>

                                        <div class="h2 mb-0">{{ $order->no_of_items_return > 1 ? $order->no_of_items_return:1 }}</div>
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
                                        <h6 class="text-50">{{ __('dashboard.Opening Package') }}</h6>

                                        <div class="h2 mb-0">{{ $order->open_package == 1 ? ($locale == 'ar' ?'نعم':'Yes'):($locale == 'ar' ?'لا':'No') }}</div>
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
                                @break
                                @case('Cash Collection')
                                <div class="col-lg-2 col-sm-4 border-left">
                                    <div class="card-body">
                                        <h6 class="text-50">{{ __('dashboard.Order reference') }}</h6>

                                        <div class="h2 mb-0">{{ $order->order_reference_cash_collection ? $order->order_reference_cash_collection:'None' }}</div>
                                        {{--<div class="d-flex flex-column">
                                            <strong>Total Views</strong>
                                            <small class="text-50">1.3k today</small>
                                        </div>--}}
                                    </div>
                                    {{--<div class="card-body">
                                        <div class="h2 mb-0"></div>
                                        <small class="text-50">Package description</small>
                                        <strong>{{ $order->package_description }}</strong>
                                    </div>--}}
                                </div>
                                <div class="col-lg-4 col-sm-4 border-left">
                                    <div class="card-body">
                                        <h6 class="text-50">{{ __('dashboard.Cash on Delivery') }}</h6>

                                        <div class="h2 mb-0">{{ $order->cash_to_collect }} <small>{{ __('EGP') }}</small></div>
                                        {{--<div class="d-flex flex-column">
                                            <strong>Total Views</strong>
                                            <small class="text-50">1.3k today</small>
                                        </div>--}}
                                    </div>
                                    <div class="card-body">
                                        <div class="h2 mb-0"></div>
                                        <small class="text-50">{{ __('dashboard.Delivery Notes') }}</small>
                                        <strong>{{ $order->delivery_notes }}</strong>
                                    </div>
                                </div>
                                {{--<div class="col-lg-2 col-sm-4 border-left">
                                    <div class="card-body">
                                        <h6 class="text-50">Package Type</h6>

                                        <div class="h2 mb-0">{{ $order->package_type }}</div>
                                        --}}{{--<div class="d-flex flex-column">
                                            <strong>Total Views</strong>
                                            <small class="text-50">1.3k today</small>
                                        </div>--}}{{--
                                    </div>
                                    --}}{{--<div class="card-body">
                                        <div class="h2 mb-0">113</div>
                                        <strong>Comments</strong>
                                    </div>--}}{{--
                                </div>--}}
                                <div class="col-lg-2 col-sm-4 border-left">
                                    <div class="card-body">
                                        <h6 class="text-50">{{ __('dashboard.Number of Items') }}</h6>

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
                                {{--<div class="col-lg-2 col-sm-4 border-left">
                                    <div class="card-body">
                                        <h6 class="text-50">Opening Package</h6>

                                        <div class="h2 mb-0">{{ $order->open_package == 1 ? 'Yes':'No' }}</div>
                                        --}}{{--<div class="d-flex flex-column">
                                            <strong>Total Views</strong>
                                            <small class="text-50">1.3k today</small>
                                        </div>--}}{{--
                                    </div>
                                    --}}{{--<div class="card-body">
                                        <div class="h2 mb-0">113</div>
                                        <strong>Comments</strong>
                                    </div>--}}{{--
                                </div>--}}
                                @break
                            @endswitch
                        </div>
                    </div>

                </div>
                @hasanyrole('customer')
                <div class="col-lg-2 card-group-row__col">
                    <div class="card card-group-row__card d-flex flex-column" style="cursor: pointer" onclick="location.href='{{ route('dashboard.orders.create.airwaybell',$order->id) }}'">
                        <div class="row no-gutters flex">
                            <button type="button" class="btn  " >
                                <i class="material-icons ">receipt</i>&nbsp; Airwaybell
                            </button>
                        </div>
                    </div>
                </div>
                @endhasanyrole
            </div>
        </div>
    </div>
        @hasanyrole('operation admin|admin')
            <div class="page-section bg-white mt-4 border-bottom-2 ">
                <div class="container page__container">
                    <div class="row">
                        <div class="col-lg-5 mb-24pt mb-lg-0">
                            <div class="border-left-3 border-left-primary pl-24pt pl-md-32pt">
                                <h4 class="mb-8pt text-secondary">{{ __('dashboard.Customer Order log') }}</h4>
                                <h4 class="mb-8pt">{{ $customerlog ? __('dashboard.'.$customerlog->status):'' }} {{ $customerlog->hub ? ($locale == 'ar' ? '('.$customerlog->hub->ar_name.')':'('.$customerlog->hub->en_name.')'):'' }}</h4>
                                <p class="text-70 mb-24pt">{{ $customerlog ? __('dashboard.'.$customerlog->description):'' }}</p>
                                @can('edit log')
                                <a href="{{ route("dashboard.order-customer-logs.index",$order->id) }}"
                                   class="btn btn-primary">{{ __('dashboard.Customer Order log') }}</a>
                                @endcan
                            </div>
                        </div>
                        <div class="col-lg-7 d-flex align-items-center">
                            <div class="page-num-timeline d-flex flex-column flex-sm-row align-items-center justify-content-center flex">
                                @foreach($logs as $icon)
                                    <a href="#"
                                       data-toggle="tooltip"
                                       data-placement="top"
                                       data-title="{{ __('dashboard.'.$icon['type']) }}"
                                       class="page-num-timeline__item {{ $icon['type'] ==  ($customerlog ? $customerlog->status:'')  ? 'page-num-timeline__item-current':''}}">
                                        <span class="page-num-timeline__item-tip"></span>
                                        <span class="page-num"><i class="material-icons">{{ $icon['icon'] }}</i></span>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endhasanyrole

            <div class="container page__container">



            <div class="page-section">

            <div class="row mb-lg-8pt">
                <div class="col-lg-6">

                    <div class="page-separator">
                        <div class="page-separator__text">{{ __('dashboard.Customer_Info') }}</div>
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

                                                        <span class="avatar-title rounded-circle">{{ initials($order->client->full_name) }}</span>

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
                                                <div class="card-title">{{ $order->client->full_name }}</div>
                                                <p class="flex text-50 lh-1 mb-0"><small>{{ $order->client->status }}</small></p>
                                                <span class="indicator-line rounded {{ $order->client->status == 'active' ? 'bg-success':'bg-danger' }}"></span>
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

                                <p class="mt-16pt text-70 flex">{{ $order->client->email }}</p>

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
                                            <p class="flex text-50 lh-1 mb-0"><small>{{ __('dashboard.Phone') }}: {{ $order->client->phone }}</small></p>
                                        </div>
                                        <div class="d-flex align-items-center mb-4pt">
                                            <span class="material-icons icon-16pt text-50 mr-4pt">phone</span>
                                            <p class="flex text-50 lh-1 mb-0"><small>{{ __('dashboard.Other Phone') }}: {{ $order->client->other_phone }}</small></p>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <span class="material-icons icon-16pt text-50 mr-4pt">event</span>
                                            <p class="flex text-50 lh-1 mb-0"><small>{{ __('dashboard.Joined') }}: {{ $order->client->created_at }}</small></p>
                                        </div>
                                    </div>
                                    <div class="col text-right">
                                        <a href="{{ route('dashboard.clients.show',$order->client->id) }}"
                                           class="btn btn-outline-secondary">{{ __('dashboard.View Customer') }}</a>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
                @if($order->location)
                    <div class="col-lg-6">
                        <div class="page-separator">
                            <div class="page-separator__text">{{ __('dashboard.Customer Location') }}</div>
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
                                                    <p class="flex text-50 lh-1 mb-0"><small>{{ $order->location->state ? $order->location->state->name:'' }}</small></p>
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

                                    <p class="mt-16pt text-70 flex">{{ $order->location->apartment }} {{ $order->location->building }}, {{ $order->location->street }}, {{ $order->location->state ? $order->location->state->name:'' }}, {{ $order->location->country ? $order->location->country->name:'' }}</p>

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
                                                <p class="flex text-50 lh-1 mb-0"><small>{{ __('dashboard.Apartment') }}: {{ $order->location->apartment }}</small></p>
                                            </div>
                                            <div class="d-flex align-items-center mb-4pt">
                                                <span class="material-icons icon-16pt text-50 mr-4pt">home_work</span>
                                                <p class="flex text-50 lh-1 mb-0"><small>{{ __('dashboard.Home') }}: {{ $order->location->building }}</small></p>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <span class="material-icons icon-16pt text-50 mr-4pt">local_convenience_store</span>
                                                <p class="flex text-50 lh-1 mb-0"><small>{{ __('dashboard.Floor') }}: {{ $order->location->floor }}</small></p>
                                            </div>
                                        </div>
                                        <div class="col text-right">
                                            <!-- Button trigger modal -->
                                            <button type="button" id="view_location1" class="btn view_modal btn-outline-secondary" {{--data-toggle="modal" data-target="#exampleModalCenter1"--}}>
                                                {{ __('dashboard.View Location') }}
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Location Information</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
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
                                                                            <p class="flex text-50 lh-1 mb-0"><small>{{ __('dashboard.Apartment') }}: {{ $order->location->apartment }}</small></p>
                                                                        </div>
                                                                        <div class="d-flex align-items-center mb-4pt">
                                                                            <span class="material-icons icon-16pt text-50 mr-4pt">home_work</span>
                                                                            <p class="flex text-50 lh-1 mb-0"><small>{{ __('dashboard.Home') }}: {{ $order->location->building }}</small></p>
                                                                        </div>
                                                                        <div class="d-flex align-items-center mb-4pt">
                                                                            <span class="material-icons icon-16pt text-50 mr-4pt">local_convenience_store</span>
                                                                            <p class="flex text-50 lh-1 mb-0"><small>{{ __('dashboard.Floor') }}: {{ $order->location->floor }}</small></p>
                                                                        </div>
                                                                        <div class="d-flex align-items-center mb-4pt">
                                                                            <span class="material-icons icon-16pt text-50 mr-4pt">car_repair</span>
                                                                            <p class="flex text-50 lh-1 mb-0"><small>{{ __('dashboard.Street') }}: {{ $order->location->street }}</small></p>
                                                                        </div>
                                                                        <div class="d-flex align-items-center mb-4pt">
                                                                            <span class="material-icons icon-16pt text-50 mr-4pt">landscape</span>
                                                                            <p class="flex text-50 lh-1 mb-0"><small>{{ __('dashboard.Landmarks') }}: {{ $order->location->landmarks }}</small></p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col text-right"></div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="button" onclick="location.href='{{ route('dashboard.locations.show',$order->location->id).'?order='.$order->id }}'" class="btn btn-primary"> <i class="material-icons icon--left">edit</i> Edit Location</button>
                                                            <button type="button" onclick="location.href='{{ route('dashboard.orders.edit',$order->id) }}'" class="btn btn-success"> <i class="material-icons icon--left">edit</i> Change Order Location</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                @endif
            </div>
            @if(isset($order->pickup))
            <div class="page-separator">
                <div class="page-separator__text">{{ __('dashboard.Pickup Details') }}</div>
            </div>

            <div class="row card-group-row mb-lg-8pt">
                <div class="col-lg-8 card-group-row__col">

                    <div class="card card-group-row__card d-flex flex-column">
                        <div class="row no-gutters flex">
                            <div class="col-lg-4 col-sm-4">
                                <div class="card-body">
                                    <h6 class="text-50">{{ __('dashboard.Pickup ID') }}</h6>

                                    <div class="h2 mb-0">{{ $order->pickup->pickup_id }}</div>
                                    {{--<div class="d-flex flex-column">
                                        <strong>Total Posts</strong>
                                        <small class="text-50">13 this week</small>
                                    </div>--}}
                                </div>
                                <div class="card-body">
                                    <div class="h2 mb-0"></div>
                                    <div class="d-flex flex-column">
                                        <small class="text-50">{{ __('dashboard.Scheduled date') }}</small>
                                        <strong>{{  $order->pickup->scheduled_date }}</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-4 border-left">
                                <div class="card-body">
                                    <h6 class="text-50">{{ __('dashboard.Pickup type') }}</h6>

                                    <div class="h2 mb-0">{{ $order->pickup->type }}</div>
                                    {{--<div class="d-flex flex-column">
                                        <strong>Total Views</strong>
                                        <small class="text-50">1.3k today</small>
                                    </div>--}}
                                </div>
                                <div class="card-body">
                                    <div class="h2 mb-0"></div>
                                    <small class="text-50">{{ __('dashboard.Status') }}</small>
                                    <strong>{{ $order->pickup->status }}</strong>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-4 border-left">
                                <div class="card-body">
                                    <h6 class="text-50">{{ __('dashboard.Contact person') }}</h6>

                                    <div class="h2 mb-0">{{ $order->pickup->contact->contact_name }} </div>
                                    <div class="d-flex flex-column">
                                        <strong>{{ $order->pickup->contact->contact_phone }}</strong>
                                        <small class="text-50">{{ $order->pickup->contact->contact_job_title }}</small>
                                    </div>
                                </div>
                                {{--<div class="card-body">
                                    <div class="h2 mb-0"></div>
                                    <small class="text-50">Delivery Notes</small>
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
                                                <div class="card-title">{{ $order->pickup ? $order->pickup->location->name:'' }}</div>
                                                <p class="flex text-50 lh-1 mb-0"><small>{{ $order->pickup ? $order->pickup->location->state->name:'' }}</small></p>
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

                                <p class="mt-16pt text-70 flex">{{ $order->pickup ? $order->pickup->location->apartment:'' }} {{ $order->pickup ? $order->pickup->location->building:'' }}, {{ $order->pickup ? $order->pickup->location->street:'' }}, {{ $order->pickup ? $order->pickup->location->state->name:'' }}, {{ $order->pickup ? $order->pickup->location->country->name:'' }}</p>

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
                                            <p class="flex text-50 lh-1 mb-0"><small>{{ __('dashboard.Apartment') }}: {{ $order->pickup ? $order->pickup->location->apartment:'' }}</small></p>
                                        </div>
                                        <div class="d-flex align-items-center mb-4pt">
                                            <span class="material-icons icon-16pt text-50 mr-4pt">home_work</span>
                                            <p class="flex text-50 lh-1 mb-0"><small>{{ __('dashboard.Home') }}: {{ $order->pickup ? $order->pickup->location->building:'' }}</small></p>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <span class="material-icons icon-16pt text-50 mr-4pt">local_convenience_store</span>
                                            <p class="flex text-50 lh-1 mb-0"><small>{{ __('dashboard.Floor') }}: {{ $order->pickup ? $order->pickup->location->floor:'' }}</small></p>
                                        </div>
                                    </div>
                                    <div class="col text-right">
                                        <!-- Button trigger modal -->
                                        <button  type="button" id="view_location" class="btn view_modal btn-outline-secondary" {{--data-toggle="modal" data-target="#exampleModalCenter"--}}>
                                            {{ __('dashboard.View Location') }}
                                        </button>
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

@section('extra-scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.7.17/sweetalert2.min.js"></script>

    <script>
        $(document).ready(function() {
            var div = '<div class="card-body d-flex flex-column">'+
                '  <p class="mt-16pt text-70 flex">{{ $order->pickup ? $order->pickup->location->apartment:'' }} {{ $order->pickup ? $order->pickup->location->building:'' }}, {{ $order->pickup ? $order->pickup->location->street:'' }}, {{ $order->pickup ? $order->pickup->location->state->name:'' }}, {{ $order->pickup ? $order->pickup->location->country->name:'' }}</p>'+
                '  <div class="mb-16pt d-none">'+
                ' <div class="d-flex align-items-center">'+
                '      <span class="material-icons icon-16pt text-50 mr-8pt">check</span>'+
                '      <p class="flex text-50 lh-1 mb-0"><small>Fundamentals of working with WordPress</small></p>'+
                '   </div>'+
                '   <div class="d-flex align-items-center">'+
                '       <span class="material-icons icon-16pt text-50 mr-8pt">check</span>'+
                '       <p class="flex text-50 lh-1 mb-0"><small>Create complete WordPress applications</small></p>'+
                '  </div>'+
                '  <div class="d-flex align-items-center">'+
                '      <span class="material-icons icon-16pt text-50 mr-8pt">check</span>'+
                '      <p class="flex text-50 lh-1 mb-0"><small>Working with the WordPress CLI</small></p>'+
                '   </div>'+
                ' <div class="d-flex align-items-center">'+
                '    <span class="material-icons icon-16pt text-50 mr-8pt">check</span>'+
                '     <p class="flex text-50 lh-1 mb-0"><small>Understanding Dependency Injection</small></p>'+
                '  </div>'+
                '  <div class="d-flex align-items-center">'+
                '    <span class="material-icons icon-16pt text-50 mr-8pt">check</span>'+
                '    <p class="flex text-50 lh-1 mb-0"><small>Testing with WordPress</small></p>'+
                '  </div>'+
                '  </div>'+
                '  <div class="row align-items-center">'+
                '   <div class="col-auto">'+
                '      <div class="d-flex align-items-center mb-4pt">'+
                '          <span class="material-icons icon-16pt text-50 mr-4pt">apartment</span>'+
                '          <p class="flex text-50 lh-1 mb-0"><small>{{ __('dashboard.Apartment') }}: {{ $order->pickup ? $order->pickup->location->apartment:'' }}</small></p>'+
                '  </div>'+
                '    <div class="d-flex align-items-center mb-4pt">'+
                '      <span class="material-icons icon-16pt text-50 mr-4pt">home_work</span>'+
                '       <p class="flex text-50 lh-1 mb-0"><small>{{ __('dashboard.Home') }}: {{ $order->pickup ? $order->pickup->location->building:'' }}</small></p>'+
                '    </div>'+
                '    <div class="d-flex align-items-center mb-4pt">'+
                '        <span class="material-icons icon-16pt text-50 mr-4pt">local_convenience_store</span>'+
                '        <p class="flex text-50 lh-1 mb-0"><small>{{ __('dashboard.Floor') }}: {{ $order->pickup ? $order->pickup->location->floor:'' }}</small></p>'+
                '   </div>'+
                '   <div class="d-flex align-items-center mb-4pt">'+
                '      <span class="material-icons icon-16pt text-50 mr-4pt">car_repair</span>'+
                '       <p class="flex text-50 lh-1 mb-0"><small>{{ __('dashboard.Street') }}: {{ $order->pickup ? $order->pickup->location->street:'' }}</small></p>'+
                '    </div>'+
                '    <div class="d-flex align-items-center mb-4pt">'+
                '        <span class="material-icons icon-16pt text-50 mr-4pt">landscape</span>'+
                '       <p class="flex text-50 lh-1 mb-0"><small>{{ __('dashboard.Landmarks') }}: {{ $order->pickup ? $order->pickup->location->landmarks:'' }}</small></p>'+
                ' </div>'+
                ' </div>'+
                ' <div class="col text-right"></div>'+
                '</div>'+
                '</div>';
            $('#view_location').on('click',function () {

                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                })

                swalWithBootstrapButtons.fire({
                    title: "{{ $order->pickup ? $order->pickup->location->name:'' }}",
                    html: div,
                    imageUrl: '{{ asset('backend/images/icon/map.png') }}',
                    imageWidth: 64,
                    imageHeight: 64,
                    imageAlt: 'Custom image',
                    showCancelButton: true,
                    confirmButtonText: '<i class="material-icons icon--left">edit</i> {{ __('dashboard.Change Location') }}',
                    cancelButtonText: '<i class="material-icons icon--left">edit</i> {{ __('dashboard.Edit Location') }}',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = '{{ $order->pickup ? route('dashboard.pickups.edit',$order->pickup->id):'' }}';
                    } else if (
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        window.location = '{{ $order->pickup ? route('dashboard.locations.show',$order->pickup->location->id).'?order='.$order->id:'' }}';
                    }
                })

                $('.swal2-cancel').css('margin-right','1rem')

            })
        });




        $(document).ready(function() {
            var div = '<div class="card-body d-flex flex-column">'+
                '  <p class="mt-16pt text-70 flex">{{ $order->location->apartment }} {{ $order->location->building }}, {{ $order->location->street }}, {{ $order->location->state->name }}, {{ $order->location->country->name }}</p>'+
                '  <div class="mb-16pt d-none">'+
                ' <div class="d-flex align-items-center">'+
                '      <span class="material-icons icon-16pt text-50 mr-8pt">check</span>'+
                '      <p class="flex text-50 lh-1 mb-0"><small>Fundamentals of working with WordPress</small></p>'+
                '   </div>'+
                '   <div class="d-flex align-items-center">'+
                '       <span class="material-icons icon-16pt text-50 mr-8pt">check</span>'+
                '       <p class="flex text-50 lh-1 mb-0"><small>Create complete WordPress applications</small></p>'+
                '  </div>'+
                '  <div class="d-flex align-items-center">'+
                '      <span class="material-icons icon-16pt text-50 mr-8pt">check</span>'+
                '      <p class="flex text-50 lh-1 mb-0"><small>Working with the WordPress CLI</small></p>'+
                '   </div>'+
                ' <div class="d-flex align-items-center">'+
                '    <span class="material-icons icon-16pt text-50 mr-8pt">check</span>'+
                '     <p class="flex text-50 lh-1 mb-0"><small>Understanding Dependency Injection</small></p>'+
                '  </div>'+
                '  <div class="d-flex align-items-center">'+
                '    <span class="material-icons icon-16pt text-50 mr-8pt">check</span>'+
                '    <p class="flex text-50 lh-1 mb-0"><small>Testing with WordPress</small></p>'+
                '  </div>'+
                '  </div>'+
                '  <div class="row align-items-center">'+
                '   <div class="col-auto">'+
                '      <div class="d-flex align-items-center mb-4pt">'+
                '          <span class="material-icons icon-16pt text-50 mr-4pt">apartment</span>'+
                '          <p class="flex text-50 lh-1 mb-0"><small>{{ __('dashboard.Apartment') }}: {{ $order->location->apartment }}</small></p>'+
                '  </div>'+
                '    <div class="d-flex align-items-center mb-4pt">'+
                '      <span class="material-icons icon-16pt text-50 mr-4pt">home_work</span>'+
                '       <p class="flex text-50 lh-1 mb-0"><small>{{ __('dashboard.Home') }}: {{ $order->location->building }}</small></p>'+
                '    </div>'+
                '    <div class="d-flex align-items-center mb-4pt">'+
                '        <span class="material-icons icon-16pt text-50 mr-4pt">local_convenience_store</span>'+
                '        <p class="flex text-50 lh-1 mb-0"><small>{{ __('dashboard.Floor') }}: {{ $order->location->floor }}</small></p>'+
                '   </div>'+
                '   <div class="d-flex align-items-center mb-4pt">'+
                '      <span class="material-icons icon-16pt text-50 mr-4pt">car_repair</span>'+
                '       <p class="flex text-50 lh-1 mb-0"><small>{{ __('dashboard.Street') }}: {{ $order->location->street }}</small></p>'+
                '    </div>'+
                '    <div class="d-flex align-items-center mb-4pt">'+
                '        <span class="material-icons icon-16pt text-50 mr-4pt">landscape</span>'+
                '       <p class="flex text-50 lh-1 mb-0"><small>{{ __('dashboard.Landmarks') }}: {{ $order->location->landmarks }}</small></p>'+
                ' </div>'+
                ' </div>'+
                ' <div class="col text-right"></div>'+
                '</div>'+
                '</div>';
            $('#view_location1').on('click',function () {

                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                })

                swalWithBootstrapButtons.fire({
                    title: "{{ $order->location->name }}",
                    html: div,
                    imageUrl: '{{ asset('backend/images/icon/map.png') }}',
                    imageWidth: 64,
                    imageHeight: 64,
                    imageAlt: 'Custom image',
                    showCancelButton: true,
                    confirmButtonText: '<i class="material-icons icon--left">edit</i> {{ __('dashboard.Change Location') }}',
                    cancelButtonText: '<i class="material-icons icon--left">edit</i> {{ __('dashboard.Edit Location') }}',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = '{{ route('dashboard.orders.edit',$order->id) }}';
                    } else if (
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        window.location = '{{ route('dashboard.locations.show',$order->location->id).'?order='.$order->id }}';
                    }
                })

                $('.swal2-cancel').css('margin-right','1rem')

            })
        });

    </script>
@endsection
