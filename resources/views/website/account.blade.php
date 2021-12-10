@extends('layouts.website')

@section('my-account')
    active
@endsection

@section('content')
    <header id="header" class="header-v3">
        @include('website.components.main-navigation')

        @include('website.components.search-top')

        @include('website.components.menu-mobile')

        @include('website.components.menu')
    </header><!-- /header -->

    <div class="breadcrumb">
        <div class="container">
            <ul>
                <li><a href="{{ route('website.index') }}">Home</a></li>
                <li class="active">My Account</li>
            </ul>
        </div>
        <!-- End container -->
    </div>
@endsection
