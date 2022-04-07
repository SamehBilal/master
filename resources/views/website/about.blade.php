@extends('layouts.website')
@php $locale = session()->get('locale'); @endphp

@section('about-us')
    active
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
                <li class="active">{{ __('content.About-us') }}</li>
            </ul>
        </div>
        <!-- End container -->
    </div>
    <div class="content-about">
        <div class="col-md-6">
            <img src="{{ asset('frontend/assets/images/about-content1.png') }}" alt="About">
        </div>
        <div class="col-md-6">
            <div class="text-about">
                <div class="title-text ">
                    <h3><span>{{ $locale == 'ar' ? 'م':'A' }}</span>{{ __('content.bout') }} {{ $locale == 'ar' ? 'نحن ؟':'' }}</h3>
                    @if($locale != 'ar')
                        <h4 style="color: #134E9E">us</h4>
                    @endif
                </div>
                <!-- End title -->
                <div class="col-md-6">
                    <h4>{{ __('content.Our vision') }}</h4>
                    @if($locale == 'ar')
                        <p>{{ $info != '' ? $info->ar_vision:__('content.vision') }}</p>
                    @else
                        <p>{{ $info != '' ? $info->en_vision:__('content.vision') }}</p>
                    @endif
                </div>
                <div class="col-md-6">
                    <h4>{{ __('content.Our mission') }}</h4>
                    @if($locale == 'ar')
                        <p>{{ $info ? $info->ar_mission:__('content.mission') }}</p>
                    @else
                        <p>{{ $info ? $info->en_mission:__('content.mission') }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
