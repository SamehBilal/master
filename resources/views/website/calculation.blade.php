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
                <li><a href="{{ route('website.index') }}">{{ __('content.Home') }}</a></li>
                <li class="active">Track</li>
            </ul>
        </div>
        <!-- End container -->
    </div>

    <div class="shipping-total" style="background-image: url('{{ asset('frontend/assets/images/Dana-home2-slideshow1.jpg') }}')">
        <div class="container">
            <div class="col-md-6 coupon">
                <div class="title-ver2">
                    <h3 style="color: #0A2B56">Calculate Shipment</h3>
                </div>
                <div class="contact-form" style="background: #0A2B56">
                    <form class="form-horizontal" action="{{ route('website.calculation') }}" method="GET">
                        <div class="form-group col-md-6">
                            <select name="from" class="form-control" id="" >
                                <option >From</option>
                                <option value="Cairo">Cairo</option>
                                <option value="Giza">Giza</option>
                                <option value="Alexandria">Alexandria</option>
                            </select>
                            <!--                                <input type="text" class="form-control" id="inputfname" placeholder="Enter your first name...">-->
                        </div>
                        <div class="form-group col-md-6">
                            <select name="to" class="form-control" id="">
                                <option >To</option>
                                <option value="Cairo">Cairo</option>
                                <option value="Giza">Giza</option>
                                <option value="Alexandria">Alexandria</option>
                            </select>
                            <!--                                <input type="text" class="form-control" id="inputfname" placeholder="Enter your first name...">-->
                        </div>
                        <div class="form-group col-md-6">
                            <select name="unit" class="form-control" id="">
                                <option >Unit</option>
                                <option value="Kg">Kg</option>
                                <option value="gm">gm</option>
                            </select>
                            <!--                                <input type="text" class="form-control" id="inputfname" placeholder="Enter your first name...">-->
                        </div>
                        <div class="form-group col-md-6">
                            <input type="number" step="0.01" name="value" class="form-control" id="inputfname" placeholder="Value...">
                        </div>
                        <div class="form-group col-md-12">
                            <button value="Submit" class="btn link-button link-border-raidus" style="background: #FFAF00" type="submit">Calculate</button>
                        </div>
                    </form>
                </div>
                <!-- <a class="btn link-button link-border-raidus bg-gray" href="#" title="Continue shopping">Continue shopping</a>
                 <a class="btn link-button link-border-raidus bg-gray" href="#" title="Update cart">Update cart</a>-->
            </div>
            <!-- End col-md-6 -->
            <div class="col-md-6 cart-totals text-price">
                <div class="title-ver2">
                    <h3 style="color: #0A2B56">Shipment Total</h3>
                </div>
                <ul>
                    <li><span class="text">Subtotal</span><span class="number"> {{ $subtotal }} EGP</span></li>
                    <li><span class="text">Tax</span><span class="number"> {{ $tax }} EGP</span></li>
                    <li><span class="text totals">Total</span><span class="number totals"> {{ $total }} EGP</span></li>
                </ul>
                <!--
                                    <a class="btn link-button link-border-raidus" href="#" title="Proceed to checkout">Proceed to checkout</a>
                -->
            </div>
            <!-- End col-md-6 -->
        </div>
        <!-- End shipping-total -->
    </div>
    <!-- End conainer -->

@endsection
