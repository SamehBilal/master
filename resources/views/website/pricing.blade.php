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
                <li><a href="{{ route('website.index') }}">Home</a></li>
                <li class="active">Pricing</li>
            </ul>
        </div>
        <!-- End container -->
    </div>
    <div class="main-content">
        <div class="featured-product featured-product-home2 slider-product space-padding-tb-80" data-wow-duration="0.5s" data-wow-delay="400ms">
            <div class="container">
                <div class="images">
                    <img src="{{ asset('frontend/assets/images/home2-banner.png') }}" alt="Product-Featured">
                </div>
                <!-- end images -->
                <div class="wrap-time">
                    <h3>iphone 6s silver-64gb</h3>
                    <p>Lorem Ipsum is simply dummy text of the</p>
                    <div class="time" data-countdown="countdown" data-date="12-20-2016-10-20-30"></div>
                    <p class="best-price"><span>Best price:</span>$250.00</p>
                </div>
                <!-- End wrap-time -->

                <div class="products">
                    <div class="product">
                        <div class="wrap-title">
                            <a title="headphone" href="#" class="icon-cat">Watch</a>
                            <p class="product-title">Sony smartwatch 2 sw2</p>
                            <p class="product-price"><span>Price: </span>$ 250.00</p>
                        </div>
                        <!-- End wrap-title -->
                        <a title="" href="#" class="product-images">
                            <img alt="" src="{{ asset('frontend/assets/images/Dana-home1-product1.jpg') }}" class="primary_image">
                        </a>
                        <div class="action">
                            <a class="refresh" href="#"><i class="zmdi zmdi-refresh-sync"></i></a>
                            <a href="#" title="Like"><i class="zmdi zmdi-favorite-outline"></i></a>
                            <a href="#" title="add-to-cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                        </div>
                    </div>
                    <!-- End product -->
                    <div class="product">
                        <div class="wrap-title">
                            <a title="headphone" href="#" class="icon-cat">smart phone</a>
                            <p class="product-title">Galaxy S6 edge</p>
                            <p class="product-price"><span>Price: </span>$ 250.00</p>
                        </div>
                        <!-- End wrap-title -->
                        <a title="" href="#" class="product-images">
                            <img alt="" src="{{ asset('frontend/assets/images/products/1.jpg') }}" class="primary_image">
                        </a>
                        <div class="action">
                            <a class="refresh" href="#"><i class="zmdi zmdi-refresh-sync"></i></a>
                            <a href="#" title="Like"><i class="zmdi zmdi-favorite-outline"></i></a>
                            <a href="#" title="add-to-cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                        </div>
                    </div>
                    <!-- End product -->
                    <div class="product">
                        <div class="wrap-title">
                            <a title="headphone" href="#" class="icon-cat">Watch</a>
                            <p class="product-title">Apple watch sport green</p>
                            <p class="product-price"><span>Price: </span>$ 250.00</p>
                        </div>
                        <!-- End wrap-title -->
                        <a title="" href="#" class="product-images">
                            <img alt="" src="{{ asset('frontend/assets/images/products/1.jpg') }}" class="primary_image">
                        </a>
                        <div class="action">
                            <a class="refresh" href="#"><i class="zmdi zmdi-refresh-sync"></i></a>
                            <a href="#" title="Like"><i class="zmdi zmdi-favorite-outline"></i></a>
                            <a href="#" title="add-to-cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                        </div>
                    </div>
                    <!-- End product -->
                    <div class="product">
                        <div class="wrap-title">
                            <a title="headphone" href="#" class="icon-cat">Laptop</a>
                            <p class="product-title">HP Spectre x360 - 15t</p>
                            <p class="product-price"><span>Price: </span>$ 250.00</p>
                        </div>
                        <!-- End wrap-title -->
                        <a title="" href="#" class="product-images">
                            <img alt="" src="{{ asset('frontend/assets/images/products/1.jpg') }}" class="primary_image">
                        </a>
                        <div class="action">
                            <a class="refresh" href="#"><i class="zmdi zmdi-refresh-sync"></i></a>
                            <a href="#" title="Like"><i class="zmdi zmdi-favorite-outline"></i></a>
                            <a href="#" title="add-to-cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
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
