@extends('layouts.website')
@php $locale = session()->get('locale'); @endphp

@section('track')
    active
@endsection

@section('extra-scripts')
    <style>
        /* Import */
        @font-face {
            font-family: 'Chivo';
            font-style: italic;
            font-weight: 300;
            src: url(https://fonts.gstatic.com/s/chivo/v12/va9D4kzIxd1KFrBteUp9gK_uQQ.ttf) format('truetype');
        }
        @font-face {
            font-family: 'Chivo';
            font-style: italic;
            font-weight: 400;
            src: url(https://fonts.gstatic.com/s/chivo/v12/va9G4kzIxd1KFrBtceFfkA.ttf) format('truetype');
        }
        @font-face {
            font-family: 'Chivo';
            font-style: italic;
            font-weight: 700;
            src: url(https://fonts.gstatic.com/s/chivo/v12/va9D4kzIxd1KFrBteVp6gK_uQQ.ttf) format('truetype');
        }
        @font-face {
            font-family: 'Chivo';
            font-style: italic;
            font-weight: 900;
            src: url(https://fonts.gstatic.com/s/chivo/v12/va9D4kzIxd1KFrBteWJ4gK_uQQ.ttf) format('truetype');
        }
        @font-face {
            font-family: 'Chivo';
            font-style: normal;
            font-weight: 300;
            src: url(https://fonts.gstatic.com/s/chivo/v12/va9F4kzIxd1KFrjDY_Z4sKg.ttf) format('truetype');
        }
        @font-face {
            font-family: 'Chivo';
            font-style: normal;
            font-weight: 400;
            src: url(https://fonts.gstatic.com/s/chivo/v12/va9I4kzIxd1KFrBoQeY.ttf) format('truetype');
        }
        @font-face {
            font-family: 'Chivo';
            font-style: normal;
            font-weight: 700;
            src: url(https://fonts.gstatic.com/s/chivo/v12/va9F4kzIxd1KFrjTZPZ4sKg.ttf) format('truetype');
        }
        @font-face {
            font-family: 'Chivo';
            font-style: normal;
            font-weight: 900;
            src: url(https://fonts.gstatic.com/s/chivo/v12/va9F4kzIxd1KFrjrZvZ4sKg.ttf) format('truetype');
        }
        @font-face {
            font-family: 'Saira';
            font-style: normal;
            font-weight: 100;
            font-stretch: normal;
            src: url(https://fonts.gstatic.com/s/saira/v8/memWYa2wxmKQyPMrZX79wwYZQMhsyuShhKMjjbU9uXuA71rDks8xkw.ttf) format('truetype');
        }
        @font-face {
            font-family: 'Saira';
            font-style: normal;
            font-weight: 200;
            font-stretch: normal;
            src: url(https://fonts.gstatic.com/s/saira/v8/memWYa2wxmKQyPMrZX79wwYZQMhsyuShhKMjjbU9uXuA79rCks8xkw.ttf) format('truetype');
        }
        @font-face {
            font-family: 'Saira';
            font-style: normal;
            font-weight: 300;
            font-stretch: normal;
            src: url(https://fonts.gstatic.com/s/saira/v8/memWYa2wxmKQyPMrZX79wwYZQMhsyuShhKMjjbU9uXuA7wTCks8xkw.ttf) format('truetype');
        }
        @font-face {
            font-family: 'Saira';
            font-style: normal;
            font-weight: 400;
            font-stretch: normal;
            src: url(https://fonts.gstatic.com/s/saira/v8/memWYa2wxmKQyPMrZX79wwYZQMhsyuShhKMjjbU9uXuA71rCks8xkw.ttf) format('truetype');
        }
        @font-face {
            font-family: 'Saira';
            font-style: normal;
            font-weight: 500;
            font-stretch: normal;
            src: url(https://fonts.gstatic.com/s/saira/v8/memWYa2wxmKQyPMrZX79wwYZQMhsyuShhKMjjbU9uXuA72jCks8xkw.ttf) format('truetype');
        }
        @font-face {
            font-family: 'Saira';
            font-style: normal;
            font-weight: 600;
            font-stretch: normal;
            src: url(https://fonts.gstatic.com/s/saira/v8/memWYa2wxmKQyPMrZX79wwYZQMhsyuShhKMjjbU9uXuA74TFks8xkw.ttf) format('truetype');
        }
        @font-face {
            font-family: 'Saira';
            font-style: normal;
            font-weight: 700;
            font-stretch: normal;
            src: url(https://fonts.gstatic.com/s/saira/v8/memWYa2wxmKQyPMrZX79wwYZQMhsyuShhKMjjbU9uXuA773Fks8xkw.ttf) format('truetype');
        }
        @font-face {
            font-family: 'Saira';
            font-style: normal;
            font-weight: 800;
            font-stretch: normal;
            src: url(https://fonts.gstatic.com/s/saira/v8/memWYa2wxmKQyPMrZX79wwYZQMhsyuShhKMjjbU9uXuA79rFks8xkw.ttf) format('truetype');
        }
        @font-face {
            font-family: 'Saira Extra Condensed';
            font-style: normal;
            font-weight: 100;
            src: url(https://fonts.gstatic.com/s/sairaextracondensed/v6/-nFsOHYr-vcC7h8MklGBkrvmUG9rbpkisrTri3j2_Co.ttf) format('truetype');
        }
        @font-face {
            font-family: 'Saira Extra Condensed';
            font-style: normal;
            font-weight: 200;
            src: url(https://fonts.gstatic.com/s/sairaextracondensed/v6/-nFvOHYr-vcC7h8MklGBkrvmUG9rbpkisrTrJ2nh2wpk.ttf) format('truetype');
        }
        @font-face {
            font-family: 'Saira Extra Condensed';
            font-style: normal;
            font-weight: 300;
            src: url(https://fonts.gstatic.com/s/sairaextracondensed/v6/-nFvOHYr-vcC7h8MklGBkrvmUG9rbpkisrTrQ2rh2wpk.ttf) format('truetype');
        }
        @font-face {
            font-family: 'Saira Extra Condensed';
            font-style: normal;
            font-weight: 400;
            src: url(https://fonts.gstatic.com/s/sairaextracondensed/v6/-nFiOHYr-vcC7h8MklGBkrvmUG9rbpkisrTj6Ejx.ttf) format('truetype');
        }
        @font-face {
            font-family: 'Saira Extra Condensed';
            font-style: normal;
            font-weight: 500;
            src: url(https://fonts.gstatic.com/s/sairaextracondensed/v6/-nFvOHYr-vcC7h8MklGBkrvmUG9rbpkisrTrG2vh2wpk.ttf) format('truetype');
        }
        @font-face {
            font-family: 'Saira Extra Condensed';
            font-style: normal;
            font-weight: 600;
            src: url(https://fonts.gstatic.com/s/sairaextracondensed/v6/-nFvOHYr-vcC7h8MklGBkrvmUG9rbpkisrTrN2zh2wpk.ttf) format('truetype');
        }
        @font-face {
            font-family: 'Saira Extra Condensed';
            font-style: normal;
            font-weight: 700;
            src: url(https://fonts.gstatic.com/s/sairaextracondensed/v6/-nFvOHYr-vcC7h8MklGBkrvmUG9rbpkisrTrU23h2wpk.ttf) format('truetype');
        }
        @font-face {
            font-family: 'Saira Extra Condensed';
            font-style: normal;
            font-weight: 800;
            src: url(https://fonts.gstatic.com/s/sairaextracondensed/v6/-nFvOHYr-vcC7h8MklGBkrvmUG9rbpkisrTrT27h2wpk.ttf) format('truetype');
        }
        /* Variables */
        /* Base */
        /*body {
            background: #252827;
            font-size: 16px;
        }*/
        p {
            font-weight: 300;
        }

        strong {
            font-weight: 600;
        }
        h1 {
            font-family: 'Saira', sans-serif;
            letter-spacing: 1.5px;
            color: white;
            font-weight: 400;
            font-size: 2.4em;
        }
        #timeline-content {
            margin-top: 50px;
            text-align: center;
        }
        @if($locale == 'ar')
        /* Timeline */
        .timeline {
            border-right: 4px solid #FCAF00;
            border-bottom-left-radius: 4px;
            border-top-left-radius: 4px;
            background: rgba(255, 255, 255, 0.03);
            color: rgba(255, 255, 255, 0.8);
            font-family: 'Chivo', sans-serif;
            margin: 50px auto;
            letter-spacing: 0.5px;
            position: relative;
            line-height: 1.4em;
            font-size: 1.03em;
            padding: 50px;
            list-style: none;
            text-align: right;
            font-weight: 100;
            /*max-width: 30%;*/
        }

        .timeline h1 {
            font-family: 'Saira', sans-serif;
            letter-spacing: 1.5px;
            font-weight: 100;
            font-size: 1.4em;
        }
        .timeline h2,
        .timeline h3 {
            font-family: 'Saira', sans-serif;
            letter-spacing: 1.5px;
            font-weight: 400;
            font-size: 1.4em;
        }
        .timeline .event {
            border-bottom: 1px dashed rgba(255, 255, 255, 0.1);
            padding-bottom: 25px;
            margin-bottom: 50px;
            position: relative;
        }
        .timeline .event:last-of-type {
            padding-bottom: 0;
            margin-bottom: 0;
            border: none;
        }
        .timeline .event:before,
        .timeline .event:after {
            position: absolute;
            display: block;
            top: 0;
        }
        .timeline .event:before {
            right: -217.5px;
            color: rgba(255, 255, 255, 0.4);
            content: attr(data-date);
            text-align: left;
            font-weight: 100;
            font-size: 0.9em;
            min-width: 120px;
            font-family: 'Saira', sans-serif;
        }
        .timeline .event:after {
            box-shadow: 0 0 0 4px #FCAF00;
            right: -57.85px;
            background: #313534;
            border-radius: 50%;
            height: 11px;
            width: 11px;
            content: "";
            top: 5px;
        }

        .New:after{
            box-shadow: 0 0 0 4px #FCAF00!important;
        }
        .New{
            color: #FCAF00;
        }

        .Picked-up:after{
            box-shadow: 0 0 0 4px #ea6710!important;
        }
        .Picked-up{
            color: #ea6710;
        }

        .In-transit:after{
            box-shadow: 0 0 0 4px #00f9dc!important;
        }
        .In-transit{
            color: #00f9dc;
        }

        .Out-for-delivery:after{
            box-shadow: 0 0 0 4px #00f981!important;
        }
        .Out-for-delivery{
            color: #00f981;
        }

        .Delivered{
            color: green;
        }
        .Delivered:after{
            box-shadow: 0 0 0 4px green!important;
        }
        @else
             /* Timeline */
        .timeline {
            border-left: 4px solid #FCAF00;
            border-bottom-right-radius: 4px;
            border-top-right-radius: 4px;
            background: rgba(255, 255, 255, 0.03);
            color: rgba(255, 255, 255, 0.8);
            font-family: 'Chivo', sans-serif;
            margin: 50px auto;
            letter-spacing: 0.5px;
            position: relative;
            line-height: 1.4em;
            font-size: 1.03em;
            padding: 50px;
            list-style: none;
            text-align: left;
            font-weight: 100;
            /*max-width: 30%;*/
        }
        .timeline h1 {
            font-family: 'Saira', sans-serif;
            letter-spacing: 1.5px;
            font-weight: 100;
            font-size: 1.4em;
        }
        .timeline h2,
        .timeline h3 {
            font-family: 'Saira', sans-serif;
            letter-spacing: 1.5px;
            font-weight: 400;
            font-size: 1.4em;
        }
        .timeline .event {
            border-bottom: 1px dashed rgba(255, 255, 255, 0.1);
            padding-bottom: 25px;
            margin-bottom: 50px;
            position: relative;
        }
        .timeline .event:last-of-type {
            padding-bottom: 0;
            margin-bottom: 0;
            border: none;
        }
        .timeline .event:before,
        .timeline .event:after {
            position: absolute;
            display: block;
            top: 0;
        }
        .timeline .event:before {
            left: -217.5px;
            color: rgba(255, 255, 255, 0.4);
            content: attr(data-date);
            text-align: right;
            font-weight: 100;
            font-size: 0.9em;
            min-width: 120px;
            font-family: 'Saira', sans-serif;
        }
        .timeline .event:after {
            box-shadow: 0 0 0 4px #FCAF00;
            left: -57.85px;
            background: #313534;
            border-radius: 50%;
            height: 11px;
            width: 11px;
            content: "";
            top: 5px;
        }

        .New:after{
            box-shadow: 0 0 0 4px #FCAF00!important;
        }
        .New{
            color: #FCAF00;
        }

        .Picked-up:after{
            box-shadow: 0 0 0 4px #ea6710!important;
        }
        .Picked-up{
            color: #ea6710;
        }

        .In-transit:after{
            box-shadow: 0 0 0 4px #00f9dc!important;
        }
        .In-transit{
            color: #00f9dc;
        }

        .Out-for-delivery:after{
            box-shadow: 0 0 0 4px #00f981!important;
        }
        .Out-for-delivery{
            color: #00f981;
        }

        .Delivered{
            color: green;
        }
        .Delivered:after{
            box-shadow: 0 0 0 4px green!important;
        }
        @endif
    </style>
@endsection

@section('content')
    <header id="header" class="header-v3">
        @include('website.components.main-navigation')

        @include('website.components.search-top')

        @include('website.components.menu-mobile')

        @include('website.components.menu')
    </header>

    <div class="breadcrumb">
        <div class="container">
            <ul>
                <li><a href="{{ route('website.index') }}">{{ __('content.Home') }}</a></li>
                <li class="active">{{ __('content.Track') }} <span class="open-sans">#{{ $order->tracking_no }}</span></li>
            </ul>
        </div>
        <!-- End container -->
    </div>
    <div class="main-content">
        <div class="container">
            <div class="product-details-content">
                @if($locale == 'ar')
                    <div class="col-md-6 col-sm-6" style="margin-bottom: 1em!important;">
                        <div class="product-box-content">
                            <div id="timeline-content">
                                <h1>{{ __('content.Timeline') }}</h1>

                                <ul class="timeline">
                                    @foreach($order->log as $log)
                                        <li class="event {{ str_replace(' ', '-', $log->status ) }}" data-date="2005">
                                            <h3>{{ date("F j, Y g:i A", strtotime($log->created_at)) }}</h3>
                                            <p>"{{ $log->notes }}" 📣</p>
                                            <p><i class="zmdi zmdi-info"></i>
                                                <a href="#" class="{{ str_replace(' ', '-', $log->status ) }}">{{ $log->status }}</a></p>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- End Options -->
                        </div>
                        <!-- End product box -->
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="hoz-tab-container space-padding-tb-40">
                            <ul class="tabs">
                                {{--<li class="item" rel="overview">Overview</li>--}}
                                <li class="item" rel="Specification">{{ __('content.Specification') }}</li>
                            </ul>
                            <div class="tab-container">
                                {{--<div id="overview" class="tab-content">
                                    <h2>About This Product</h2>
                                    <p><b>The Next Big Thing Is Here</b> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                        unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic
                                        typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages.</p>
                                    <div class="panel-body">
                                        <div class="media images col-md-6">
                                            <div class="pull-right">
                                                <img src="{{ asset('frontend/assets/images/product-details-tab-1.jpg') }}" class="media-object img-circle" alt="images">
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading">Circular Interface</h4>
                                                <p>A revolutionary design keeps everything you need at your fingertips. The circular interface and unique rotating bezel let you navigate through notifications, apps and widgets quickly without covering the display.</p>
                                                <!-- Nested media object -->
                                            </div>
                                        </div>
                                        <div class="media images col-md-6">
                                            <div class="pull-right">
                                                <img src="{{ asset('frontend/assets/images/product-details-tab-1.jpg') }}" class="media-object img-circle" alt="images">
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading">3G or 4G2 Network Connectivity</h4>
                                                <p>A revolutionary design keeps everything you need at your fingertips. The circular interface and unique rotating bezel let you navigate through notifications, apps and widgets quickly without covering the display.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>--}}
                                <div id="Specification" class="tab-content">
                                    <table class="table">
                                        <tr>
                                            <td>{{ __('content.tracking No') }}</td>
                                            <td class="open-sans"><b>{{ $order->tracking_no }}</b></td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('content.Type') }}</td>
                                            <td class="open-sans"><b>{{ $order->type }}</b></td>
                                        </tr>
                                        <tr>
                                            @switch($order->type)
                                                @case('Deliver')
                                                    <td>{{ __('content.Cash on Delivery') }}</td>
                                                    <td class="open-sans">
                                                        {{ $order->cash_on_delivery }} {{ __('content.EGP') }}
                                                    </td>
                                                @break
                                                @case('Exchange')
                                                    <td>{{ __('dashboard.Cash Exchange Amount') }}</td>
                                                    <td class="open-sans">
                                                        {{ $order->cash_exchange_amount }} {{ __('content.EGP') }}
                                                    </td>
                                                @break
                                                @case('Return')
                                                    <td>{{ __('dashboard.Refund Amount') }}</td>
                                                    <td class="open-sans">
                                                        {{ $order->refund_amount }} {{ __('content.EGP') }}
                                                    </td>
                                                @break
                                                @case('Cash Collection')
                                                    <td>{{ __('dashboard.Cash to Collect') }}</td>
                                                    <td class="open-sans">
                                                        {{ $order->cash_to_collect }} {{ __('content.EGP') }}
                                                    </td>
                                                @break
                                            @endswitch
                                        </tr>
                                        <tr>
                                            <td>{{ __('content.No of Items') }}</td>
                                            <td class="open-sans"><b>{{ $order->no_of_items }}</b></td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('content.Customer') }}</td>
                                            <td class="open-sans"><b>{{ $order->customer->user->full_name }}</b></td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('content.Customer Phone') }}</td>
                                            <td class="open-sans"><b>{{ $order->customer->user->phone }}</b></td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('content.Customer Other Phone') }}</td>
                                            <td class="open-sans"><b>{{ $order->customer->user->other_phone }}</b></td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('content.Location') }}</td>
                                            <td class="open-sans"><b>{{ $order->location->name }}</b></td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('content.Street') }}</td>
                                            <td class="open-sans"><b>{{ $order->location->street }}</b></td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('content.Building') }}</td>
                                            <td class="open-sans"><b>{{ $order->location->building }}</b></td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('content.Floor') }}</td>
                                            <td class="open-sans"><b>{{ $order->location->floor }}</b></td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('content.Apartment') }}</td>
                                            <td class="open-sans"><b>{{ $order->location->apartment }}</b></td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('content.Open Package') }}</td>
                                            <td class="open-sans"><b>{{ $order->open_package == 1 ? 'Allowed':'Not Allowed' }}</b></td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('content.Delivery Notes') }}</td>
                                            <td class="open-sans"><b>{{ $order->delivery_notes }} </b></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- tab-container -->
                    </div>
                @else
                    <div class="col-md-6 col-sm-6">
                        <div class="hoz-tab-container space-padding-tb-40">
                            <ul class="tabs">
                                {{--<li class="item" rel="overview">Overview</li>--}}
                                <li class="item" rel="Specification">{{ __('content.Specification') }}</li>
                            </ul>
                            <div class="tab-container">
                                {{--<div id="overview" class="tab-content">
                                    <h2>About This Product</h2>
                                    <p><b>The Next Big Thing Is Here</b> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                        unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic
                                        typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages.</p>
                                    <div class="panel-body">
                                        <div class="media images col-md-6">
                                            <div class="pull-right">
                                                <img src="{{ asset('frontend/assets/images/product-details-tab-1.jpg') }}" class="media-object img-circle" alt="images">
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading">Circular Interface</h4>
                                                <p>A revolutionary design keeps everything you need at your fingertips. The circular interface and unique rotating bezel let you navigate through notifications, apps and widgets quickly without covering the display.</p>
                                                <!-- Nested media object -->
                                            </div>
                                        </div>
                                        <div class="media images col-md-6">
                                            <div class="pull-right">
                                                <img src="{{ asset('frontend/assets/images/product-details-tab-1.jpg') }}" class="media-object img-circle" alt="images">
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading">3G or 4G2 Network Connectivity</h4>
                                                <p>A revolutionary design keeps everything you need at your fingertips. The circular interface and unique rotating bezel let you navigate through notifications, apps and widgets quickly without covering the display.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>--}}
                                <div id="Specification" class="tab-content">
                                    <table class="table">
                                        <tr>
                                            <td>{{ __('content.tracking No') }}</td>
                                            <td><b>{{ $order->tracking_no }}</b></td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('content.Type') }}</td>
                                            <td><b>{{ $order->type }}</b></td>
                                        </tr>
                                        <tr>
                                            @switch($order->type)
                                                @case('Deliver')
                                                <td>{{ __('content.Cash on Delivery') }}</td>
                                                <td class="open-sans">
                                                    {{ $order->cash_on_delivery }} {{ __('content.EGP') }}
                                                </td>
                                                @break
                                                @case('Exchange')
                                                <td>{{ __('dashboard.Cash Exchange Amount') }}</td>
                                                <td class="open-sans">
                                                    {{ $order->cash_exchange_amount }} {{ __('content.EGP') }}
                                                </td>
                                                @break
                                                @case('Return')
                                                <td>{{ __('dashboard.Refund Amount') }}</td>
                                                <td class="open-sans">
                                                    {{ $order->refund_amount }} {{ __('content.EGP') }}
                                                </td>
                                                @break
                                                @case('Cash Collection')
                                                <td>{{ __('dashboard.Cash to Collect') }}</td>
                                                <td class="open-sans">
                                                    {{ $order->cash_to_collect }} {{ __('content.EGP') }}
                                                </td>
                                                @break
                                            @endswitch
                                        </tr>
                                        <tr>
                                            <td>{{ __('content.No of Items') }}</td>
                                            <td><b>{{ $order->no_of_items }}</b></td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('content.Customer') }}</td>
                                            <td><b>{{ $order->customer->user->full_name }}</b></td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('content.Customer Phone') }}</td>
                                            <td><b>{{ $order->customer->user->phone }}</b></td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('content.Customer Other Phone') }}</td>
                                            <td><b>{{ $order->customer->user->other_phone }}</b></td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('content.Location') }}</td>
                                            <td><b>{{ $order->location->name }}</b></td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('content.Street') }}</td>
                                            <td><b>{{ $order->location->street }}</b></td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('content.Building') }}</td>
                                            <td><b>{{ $order->location->building }}</b></td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('content.Floor') }}</td>
                                            <td><b>{{ $order->location->floor }}</b></td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('content.Apartment') }}</td>
                                            <td><b>{{ $order->location->apartment }}</b></td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('content.Open Package') }}</td>
                                            <td><b>{{ $order->open_package == 1 ? 'Allowed':'Not Allowed' }}</b></td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('content.Delivery Notes') }}</td>
                                            <td><b>{{ $order->delivery_notes }} </b></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- tab-container -->
                    </div>
                    <div class="col-md-6 col-sm-6" style="margin-bottom: 1em!important;">
                        <div class="product-box-content">
                            <div id="timeline-content">
                                <h1>{{ __('content.Timeline') }}</h1>

                                <ul class="timeline">
                                    @foreach($order->log as $log)
                                        <li class="event {{ str_replace(' ', '-', $log->status ) }}" data-date="2005">
                                            <h3>{{ date("F j, Y g:i A", strtotime($log->created_at)) }}</h3>
                                            <p>"{{ $log->description }}" 📣</p>
                                            <p><i class="zmdi zmdi-info"></i>
                                                <a href="#" class="{{ str_replace(' ', '-', $log->status ) }}">{{ $log->status }}</a></p>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- End Options -->
                        </div>
                        <!-- End product box -->
                    </div>
                @endif
                <!-- End col-md-6 -->
            </div>
            <!-- End product-details-content -->
        </div>
        <!-- End container -->
    </div>
@endsection
