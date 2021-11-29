@extends('layouts.website')

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
                <li><a href="{{ route('website.index') }}">Home</a></li>
                <li class="active">About</li>
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
                <div class="title-text title-about">
                    <h3><span>A</span>bout</h3>
                    <h4 style="color: #134E9E">us</h4>
                </div>
                <!-- End title -->
                <div class="col-md-6">
                    <h4>our vision</h4>
                    <p>
                        Di Cantina Valpolicella Negrar  la storia di uomini e donne dediti alla creazio Nullam dui  lum ante ipsum primis in faucibus orci luctus et ultrices Nulla mattis enim ut sagittis Curalum ante ipsum primis in faucibus orci luctus
                    </p>
                    <p>rutrum. Sed molestie justo et turpis placerat, blandit molestie ex condimentum. Phasellus et laoreet lacus, sed</p>
                </div>
                <div class="col-md-6">
                    <h4>Our mission</h4>
                    <p>Valpolicella Negrar la storia di uomini e donne dediti alla creazio Nullam dui dolor, sagittis ut ante eget Aliquam hendrerit vitae urna ornare semper. Ut congue condimentum nisl. Nam eu nulla libero. Curabitur lum ante ipsum primis in faucibus orci luctus et ultrices Nulla mattis enim </p>
                </div>
            </div>
        </div>
    </div>
@endsection
