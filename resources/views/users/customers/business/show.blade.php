@extends('layouts.backend')
@php $locale = session()->get('locale'); @endphp
@section('title')
    {{ $locale == 'ar' ? $business->ar_name:$business->en_name }}
@endsection

@section('links')
    <li class="breadcrumb-item ">
        <a href="{{ route('dashboard.businesses.index') }}">{{ __('dashboard.Businesses') }}</a>
    </li>
    <li class="breadcrumb-item active">
        {{ $locale == 'ar' ? $business->ar_name:$business->en_name }}
    </li>
@endsection

@section('button-link')
    {{ route('dashboard.businesses.index') }}
@endsection

@section('button-icon')
    format_list_bulleted
@endsection

@section('button-title')
    {{ __('dashboard.All Businesses') }}
@endsection

@section('main_content')
    <div class="page-section mt-2 bg-primary">
        <div class="container page__container d-flex flex-column flex-md-row align-items-center text-center text-md-left">
            <img src="{{ asset('backend/images/icon/briefcase.png') }}"
                 width="104"
                 class="mr-md-32pt mb-32pt mb-md-0"
                 alt="instructor">
            <div class="flex mb-32pt mb-md-0">
                <h2 class="text-white mb-0"> {{ $locale == 'ar' ? $business->ar_name:$business->en_name }}</h2>
                <p class="lead text-white-50 d-flex align-items-center"> {{ $business->UserCategory ? $business->UserCategory->name:'' }} <span class="ml-16pt d-flex align-items-center"><i class="material-icons icon-16pt mr-4pt">business</i> {{ $business->industry }}</span>
                    @if($business->store_url)<span class="ml-16pt d-flex align-items-center"><i class="material-icons icon-16pt mr-4pt">link</i> {{ $business->store_url }}</span>@endif
                    @if($business->sales_channel)<span class="ml-16pt d-flex align-items-center"><i class="material-icons icon-16pt mr-4pt">business</i> {{ $business->sales_channel }}</span>@endif
                </p>
            </div>
            @can('edit businesses')
                <a href="{{ route('dashboard.businesses.edit',$business->id) }}"
                   class="btn btn-outline-white"><i class="material-icons icon-16pt mr-4pt">edit</i> {{ __('dashboard.Edit') }}</a>
            @endcan
        </div>
    </div>

    {{-- <div class="page-section">
        <div class="container page__container">
            <div class="row">
                <div class="col-md-6">
                    <h4>About me</h4>
                    <p>Fueled by my passion for understanding the nuances of cross-cultural advertising, I consider myself a forever student, eager to both build on my academic foundations in psychology and sociology and stay in tune with the latest digital marketing strategies through continued coursework.</p>
                </div>
                <div class="col-md-6">
                    <h4>Connect</h4>
                    <p>I’m currently working as a freelance marketing director and always interested in a challenge. Here’s how to reach out and connect.</p>
                    <div class="d-flex align-items-center">
                        <a href=""
                           class="text-accent fab fa-facebook-square font-size-24pt mr-8pt"></a>
                        <a href=""
                           class="text-accent fab fa-twitter-square font-size-24pt"></a>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}


    <div class="container page__container">
        <div class="page-section">

            <div class="page-separator">
                <div class="page-separator__text">{{ __('dashboard.Customer') }}</div>
            </div>

            <div class="row card-group-row mb-lg-8pt">

                <div class="col-sm-4 card-group-row__col">

                        <div class="card js-overlay card-sm overlay--primary-dodger-blue stack stack--1 card-group-row__card"
                             data-toggle="popover"
                             data-trigger="click">

                            <div class="card-body d-flex flex-column">
                                <div class="d-flex align-items-center">
                                    <div class="flex">
                                        <div class="d-flex align-items-center">
                                            <div class="rounded mr-12pt z-0 o-hidden">
                                                <div class="overlay">
                                                    <img src="{{ asset('backend/images/icon/contacts.png') }}"
                                                         width="40"
                                                         height="40"
                                                         alt="Angular"
                                                         class="rounded">
                                                    {{-- <span class="overlay__content overlay__content-transparent">
                                                        <span class="overlay__action d-flex flex-column text-center lh-1">
                                                            <small class="h6 small text-white mb-0"
                                                                style="font-weight: 500;">80%</small>
                                                        </span>
                                                    </span> --}}
                                                </div>
                                            </div>
                                            <div class="flex">
                                                <div class="card-title">{{ $business->customer->user->full_name }}</div>
                                                <p class="flex text-50 lh-1 mb-0"><small>{{ $business->customer->user->email }}</small></p>
                                            </div>
                                        </div>
                                    </div>

                                    <a href="#"
                                       class="ml-4pt btn btn-sm btn-link text-secondary border-1 border-secondary">{{ __('dashboard.Details') }}</a>

                                </div>

                            </div>
                        </div>

                        <div class="popoverContainer d-none">
                            <div class="media">
                                <div class="media-left mr-12pt">
                                    <img src="{{ asset('backend/images/icon/customer.png') }}"
                                         width="40"
                                         height="40"
                                         alt="Angular"
                                         class="rounded">
                                </div>
                                <div class="media-body">
                                    <div class="card-title">{{ $business->customer->user->full_name }}</div>
                                    <p class="text-50 d-flex lh-1 mb-0 small">{{ $business->customer->user->email }}</p>
                                </div>
                            </div>

                            <p class="mt-16pt text-70">{{-- Angular is a platform for building mobile and desktop web applications. --}}</p>

                            <div class="my-32pt">
                                {{--<div class="d-flex align-items-center mb-8pt justify-content-center">
                                    <div class="d-flex align-items-center mr-8pt">
                                        <span class="material-icons icon-16pt text-50 mr-4pt">access_time</span>
                                        <p class="flex text-50 lh-1 mb-0"><small>50 minutes left</small></p>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <span class="material-icons icon-16pt text-50 mr-4pt">play_circle_outline</span>
                                        <p class="flex text-50 lh-1 mb-0"><small>12 lessons</small></p>
                                    </div>
                                </div>--}}
                                <div class="d-flex align-items-center justify-content-center">
                                    <a href="{{ route('dashboard.customers.show',$business->customer->id) }}"
                                       class="btn btn-primary mr-8pt">{{ __('dashboard.View') }}</a>
                                    <a href="{{ route('dashboard.customers.edit',$business->customer->id) }}"
                                       class="btn btn-outline-secondary ml-0">{{ __('dashboard.Edit') }}</a>
                                </div>
                            </div>
                        </div>

                    </div>

            </div>

            <div class="page-separator">
                <div class="page-separator__text">{{ __('dashboard.Contacts') }}</div>
            </div>

            <div class="row card-group-row mb-lg-8pt">

                @forelse ($business->customer->Contact as $contact)
                    <div class="col-sm-4 card-group-row__col">

                        <div class="card js-overlay card-sm overlay--primary-dodger-blue stack stack--1 card-group-row__card"
                             data-toggle="popover"
                             data-trigger="click">

                            <div class="card-body d-flex flex-column">
                                <div class="d-flex align-items-center">
                                    <div class="flex">
                                        <div class="d-flex align-items-center">
                                            <div class="rounded mr-12pt z-0 o-hidden">
                                                <div class="overlay">
                                                    <img src="{{ asset('backend/images/icon/contacts.png') }}"
                                                         width="40"
                                                         height="40"
                                                         alt="Angular"
                                                         class="rounded">
                                                    {{-- <span class="overlay__content overlay__content-transparent">
                                                        <span class="overlay__action d-flex flex-column text-center lh-1">
                                                            <small class="h6 small text-white mb-0"
                                                                style="font-weight: 500;">80%</small>
                                                        </span>
                                                    </span> --}}
                                                </div>
                                            </div>
                                            <div class="flex">
                                                <div class="card-title">{{ $contact->contact_name }}</div>
                                                <p class="flex text-50 lh-1 mb-0"><small>{{ $contact->contact_email }}</small></p>
                                            </div>
                                        </div>
                                    </div>

                                    <a href="#"
                                       class="ml-4pt btn btn-sm btn-link text-secondary border-1 border-secondary">{{ __('dashboard.Details') }}</a>

                                </div>

                            </div>
                        </div>

                        <div class="popoverContainer d-none">
                            <div class="media">
                                <div class="media-left mr-12pt">
                                    <img src="{{ asset('backend/images/icon/contacts.png') }}"
                                         width="40"
                                         height="40"
                                         alt="Angular"
                                         class="rounded">
                                </div>
                                <div class="media-body">
                                    <div class="card-title">{{ $contact->contact_name }}</div>
                                    <p class="text-50 d-flex lh-1 mb-0 small">{{ $contact->contact_email }}</p>
                                </div>
                            </div>

                            <p class="mt-16pt text-70">{{-- Angular is a platform for building mobile and desktop web applications. --}}</p>

                            <div class="my-32pt">
                                {{--<div class="d-flex align-items-center mb-8pt justify-content-center">
                                    <div class="d-flex align-items-center mr-8pt">
                                        <span class="material-icons icon-16pt text-50 mr-4pt">access_time</span>
                                        <p class="flex text-50 lh-1 mb-0"><small>50 minutes left</small></p>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <span class="material-icons icon-16pt text-50 mr-4pt">play_circle_outline</span>
                                        <p class="flex text-50 lh-1 mb-0"><small>12 lessons</small></p>
                                    </div>
                                </div>--}}
                                <div class="d-flex align-items-center justify-content-center">
                                    <a href="{{ route('dashboard.contacts.show',$contact->id) }}"
                                       class="btn btn-primary mr-8pt">{{ __('dashboard.View') }}</a>
                                    <a href="{{ route('dashboard.contacts.edit',$contact->id) }}"
                                       class="btn btn-outline-secondary ml-0">{{ __('dashboard.Edit') }}</a>
                                </div>
                            </div>
                        </div>

                    </div>
                @empty
                    <div class="col-sm-12 card-group-row__col">
                        <h5>{{ __('dashboard.There are no contacts for this business yet.') }}</h5>
                    </div>
                @endforelse

            </div>

            <div class="page-separator">
                <div class="page-separator__text">{{ __('dashboard.Latest') }} {{ __('dashboard.Orders') }}</div>
            </div>

            <div class="row card-group-row mb-lg-8pt">

                @foreach ($business->business->orders as $order)
                    <div class="col-sm-4 card-group-row__col">

                        <div class="card js-overlay card-sm overlay--primary-dodger-blue stack stack--1 card-group-row__card"
                             data-toggle="popover"
                             data-trigger="click">

                            <div class="card-body d-flex flex-column">
                                <div class="d-flex align-items-center">
                                    <div class="flex">
                                        <div class="d-flex align-items-center">
                                            <div class="rounded mr-12pt z-0 o-hidden">
                                                <div class="overlay">
                                                    <img src="{{ asset('backend/images/paths/angular_40x40@2x.png') }}"
                                                         width="40"
                                                         height="40"
                                                         alt="Angular"
                                                         class="rounded">
                                                    {{-- <span class="overlay__content overlay__content-transparent">
                                                        <span class="overlay__action d-flex flex-column text-center lh-1">
                                                            <small class="h6 small text-white mb-0"
                                                                style="font-weight: 500;">80%</small>
                                                        </span>
                                                    </span> --}}
                                                </div>
                                            </div>
                                            <div class="flex">
                                                <div class="card-title">#{{ $order->tracking_no }}</div>
                                                <p class="flex text-50 lh-1 mb-0"><small>{{ __('dashboard.'.$order->status) }}</small></p>
                                            </div>
                                        </div>
                                    </div>

                                    <a href="#"
                                       class="ml-4pt btn btn-sm btn-link text-secondary border-1 border-secondary">{{ __('dashboard.Details') }}</a>

                                </div>

                            </div>
                        </div>

                        <div class="popoverContainer d-none">
                            <div class="media">
                                <div class="media-left mr-12pt">
                                    <img src="{{ asset('backend/images/paths/angular_40x40@2x.png') }}"
                                         width="40"
                                         height="40"
                                         alt="Angular"
                                         class="rounded">
                                </div>
                                <div class="media-body">
                                    <div class="card-title">#{{ $order->tracking_no }}</div>
                                    <p class="text-50 d-flex lh-1 mb-0 small">{{ __('dashboard.'.$order->status) }}</p>
                                </div>
                            </div>

                            <p class="mt-16pt text-70">{{-- Angular is a platform for building mobile and desktop web applications. --}}</p>

                            <div class="my-32pt">
                                {{--<div class="d-flex align-items-center mb-8pt justify-content-center">
                                    <div class="d-flex align-items-center mr-8pt">
                                        <span class="material-icons icon-16pt text-50 mr-4pt">access_time</span>
                                        <p class="flex text-50 lh-1 mb-0"><small>50 minutes left</small></p>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <span class="material-icons icon-16pt text-50 mr-4pt">play_circle_outline</span>
                                        <p class="flex text-50 lh-1 mb-0"><small>12 lessons</small></p>
                                    </div>
                                </div>--}}
                                <div class="d-flex align-items-center justify-content-center">
                                    <a href="{{ route('dashboard.orders.show',$order->id) }}"
                                       class="btn btn-primary mr-8pt">{{ __('dashboard.View') }}</a>
                                    <a href="{{ route('dashboard.orders.edit',$order->id) }}"
                                       class="btn btn-outline-secondary ml-0">{{ __('dashboard.Edit') }}</a>
                                </div>
                            </div>
                        </div>

                    </div>
                @endforeach

            </div>

        </div>
    </div>


@endsection
