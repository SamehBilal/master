@extends('layouts.website')

@section('track')
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
                <li class="active">Search</li>
            </ul>
        </div>
        <!-- End container -->
    </div>
    <div class="main-content page-blog space-80">
        <div class="container">
            <div class="blog-post-container blog-page blog-post-columns-2 col-md-9">
                <div class="row margin-0">
                    @if(isset($_GET['s']) && !empty($_GET['s']))
                    <div class="blog-post-item">
                        <div class="blog-post-image effect-v6">
                            <a href="{{ route('website.track',$order[0]['id']) }}" title="Post"><img src="{{ asset('frontend/assets/images/ImgBlog/12.png') }}" alt="images"></a>
                        </div>
                        <p class="date">
                            <span class="COD">{{ $order[0]['cash_on_delivery'] }}</span>
                            <span class="EGP">EGP</span>
                        </p>
                        <h3><a href="{{ route('website.track',$order[0]['id']) }}" title="#{{ $order[0]['tracking_no'] }}">#{{ $order[0]['tracking_no'] }}</a></h3>
                        <p class="content"><i class="zmdi zmdi-map"></i> {{ $location->name }}</p>
                        <div class="bottom-tag">
                            <a class="read-more" href="{{ route('website.track',$order[0]['id']) }}" title="Track Package">Track Package</a>
                            <p class="tags">
                                <a class="user" href="#" title="Order Type"><i class="zmdi zmdi-shopping-cart"></i>{{ $order[0]['type'] }} </a>
                                <a class="comment" href="#" title="Number of Items"><i class="zmdi zmdi-collection-item-9-plus"></i>{{ $order[0]['no_of_items'] }} item(s)</a>
                            </p>
                        </div>
                    </div>
                    <!-- End blog-item -->
                    @else
                        <div class="col-md-12 coupon">
                            <div class="title-ver2">
                                <h3 style="color: #0A2B56">Search Package</h3>
                            </div>
                            <div class="contact-form" >
                                <form class="form-horizontal" action="{{ route('website.search') }}" method="GET">
                                    <div class="form-group col-md-12">
                                        <input type="text" autocomplete="off" placeholder="Tracking no." required name="s" class="form-control" id="inputfname" >
                                    </div>
                                    <div class="form-group col-md-12">
                                        <button value="Submit" class="btn link-button link-border-raidus" style="background: #FFAF00" type="submit">Search</button>
                                    </div>
                                </form>
                            </div>
                            <!-- <a class="btn link-button link-border-raidus bg-gray" href="#" title="Continue shopping">Continue shopping</a>
                             <a class="btn link-button link-border-raidus bg-gray" href="#" title="Update cart">Update cart</a>-->
                        </div>
                    @endif
                </div>
            </div>
            <!-- End blog-post-container -->
            <div class="widget-area col-xs-12 col-md-3 blog-colum-right">
                <aside class="widget">
                    <h4>Search Another Package</h4>
                    <div class="search">
                        <form action="{{ route('website.search') }}" method="GET">
                            <input type="text" autocomplete="off" placeholder="Tracking no." value="" class="ajax_autosuggest_input ac_input" name="s">
                            <button type="submit" class="icon-search">
                                <i class="zmdi zmdi-search"></i>
                            </button>
                        </form>
                    </div>
                </aside>
                <aside class="widget">
                    <h4>Links</h4>
                    <ul class="menu-category">
                        <li><a title="Home" href="{{ route('website.index') }}">Home</a></li>
                        <li><a title="Pricing" href="{{ route('website.pricing') }}">Pricing</a></li>
                        <li><a title="Contact Us" href="{{ route('website.contact-us') }}">Contact Us</a></li>
                        <li><a title="My Account" href="{{ route('website.account') }}">My Account</a></li>
                        <li><a title="Terms & Conditions" href="{{ route('website.terms') }}">Terms & Conditions</a></li>
                        <li><a href="{{ route('website.calculation') }}" title="Calculate time & cost">Calculate time & cost</a></li>
                    </ul>
                </aside>
            </div>
        </div>
        <!-- End container -->
    </div>

@endsection
