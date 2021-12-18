@extends('layouts.website')

@section('pricing')
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
                <li><a href="{{ route('website.index') }}">{{ __('content.Home') }}</a></li>
                <li class="active">Pricing</li>
            </ul>
        </div>
        <!-- End container -->
    </div>
    <div class="main-content">
        <div class="featured-product featured-product-home2 slider-product space-padding-tb-80" data-wow-duration="0.5s" data-wow-delay="400ms">
            <div class="container">
                <div class="images">
                    <img src="{{ asset('frontend/assets/images/home3-banner.png') }}" alt="Product-Featured">
                </div>
                <!-- end images -->
                <div class="wrap-time">
                   {{-- <h3>iphone 6s silver-64gb</h3>
                    <p>Lorem Ipsum is simply dummy text of the</p>
                    <div class="time" data-countdown="countdown" data-date="12-20-2016-10-20-30"></div>--}}
                    <p class="best-price"><span>Best price:</span>69 EGP</p>
                </div>
                <!-- End wrap-time -->

                <div class="products">
                    <div class="product">
                        <div class="wrap-title">
                            <a title="headphone" href="#" class="icon-cat"></a>
                            <p class="product-title">Package 1</p>
                            <p class="product-price"><span>Duration: </span>3 months</p>
                        </div>
                        <!-- End wrap-title -->
                        <a title="" href="#" class="product-images">
                            <h1 style="font-size: 8em;color: #3a3a3a">29</h1><small> EGP</small>
                        </a>
                        <div class="action">
                            <a href="#" class="link-button">Join Now</a>
                        </div>
                    </div>
                    <!-- End product -->
                    <div class="product">
                        <div class="wrap-title">
                            <a title="headphone" href="#" class="icon-cat"></a>
                            <p class="product-title">Package 2</p>
                            <p class="product-price"><span>Duration: </span>6 months</p>
                        </div>
                        <!-- End wrap-title -->
                        <a title="" href="#" class="product-images">
                            <h1 style="font-size: 8em;color: #3a3a3a">69</h1><small> EGP</small>
                        </a>
                        <div class="action">
                            <a href="#" class="link-button">Join Now</a>
                        </div>
                    </div>
                    <!-- End product -->
                    <div class="product">
                        <div class="wrap-title">
                            <a title="headphone" href="#" class="icon-cat"></a>
                            <p class="product-title">Package 3</p>
                            <p class="product-price"><span>Duration: </span>9 months</p>
                        </div>
                        <!-- End wrap-title -->
                        <a title="" href="#" class="product-images">
                            <h1 style="font-size: 8em;color: #3a3a3a">99</h1><small> EGP</small>
                        </a>
                        <div class="action">
                            <a href="#" class="link-button">Join Now</a>
                        </div>
                    </div>
                    <!-- End product -->
                    <div class="product">
                        <div class="wrap-title">
                            <a title="headphone" href="#" class="icon-cat"></a>
                            <p class="product-title">Package 4</p>
                            <p class="product-price"><span>Duration: </span>12 months</p>
                        </div>
                        <!-- End wrap-title -->
                        <a title="" href="#" class="product-images">
                            <h1 style="font-size: 8em;color: #3a3a3a">119</h1><small> EGP</small>
                        </a>
                        <div class="action">
                            <a href="#" class="btn-sm link-button">Join Now</a>
                        </div>
                    </div>
                    <!-- End product -->
                </div>
                <!-- End product -->
            </div>
            <!-- End container -->
        </div>
        <!-- End popular-product -->
    </div>
@endsection
