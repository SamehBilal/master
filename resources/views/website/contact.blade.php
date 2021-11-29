@extends('layouts.website')

@section('contact-us')
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
                <li class="active">Contact</li>
            </ul>
        </div>
        <!-- End container -->
    </div>

    <div class="main-content">
        <div class="container">
            <div class="title-ver3 title-ver4">
                <h4>Get in touch</h4>
                <h3 style="color: #134E9E"><span>C</span>ontact from</h3>
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto</p>
            </div>
            <div class="contact-content">
                <div class="contact-form contact-form-bg">
                    <form class="form-horizontal" action="{{ route('contact-forms.store') }}" method="POST">
                        <div class="form-group col-md-6">
                            @csrf
                            <label class=" control-label" for="inputName">Your name</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="inputName" placeholder="Name">
                        </div>
                        <div class="form-group col-md-6">
                            <label class=" control-label" for="inputEmail">Your Mail</label>
                            <input type="text" name="email" value="{{ old('email') }}" class="form-control" id="inputEmail" placeholder="Email">
                        </div>
                        <div class="form-group col-md-12">
                            <label class=" control-label" for="message">massage</label>
                            <textarea class="form-control" id="message" name="message">{{ old('message') }}</textarea>
                            <div class="checkbox space-10">
                            </div>
                            <button class="btn link-button width-100" type="submit">Send your message</button>
                        </div>
                    </form>
                </div>
                <!-- End col-md-9 -->
            </div>
        </div>
        <!-- End container -->
        <div class="title-ver3 title-ver4">
            <h4>Get in touch</h4>
            <h3><span>C</span>ontact info</h3>
            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto</p>
        </div>
        <!-- End contact content -->
        <div id="googleMap2"></div>
        <div class="container">
            <div class="box-icon-adress">
                <div class="col-md-4">
                    <div class="feature-box feature-box-v3 feature-box-center space-30">
                        <div class="fbox-icon">
                            <a href="#"><img src="{{ asset('frontend/assets/images/contact2-icon-adress1.png') }}" alt="icons"></a>
                        </div>
                        <div class="fbox-body">
                            <h4>Our Address</h4>
                            <p>150 - CUa dong - ba dinh - Ha Noi.</p>
                        </div>
                    </div>
                </div>
                <!-- End col-md-4 -->
                <div class="col-md-4">
                    <div class="feature-box feature-box-v3 feature-box-center space-30">
                        <div class="fbox-icon">
                            <a href="#"><img src="{{ asset('frontend/assets/images/contact2-icon-adress2.png') }}" alt="icons"></a>
                        </div>
                        <div class="fbox-body">
                            <h4>Phone number</h4>
                            <p>(+84) 8445.567 - (+84) 7564.7755</p>
                        </div>
                    </div>
                </div>
                <!-- End col-md-4 -->
                <div class="col-md-4">
                    <div class="feature-box feature-box-v3 feature-box-center space-30">
                        <div class="fbox-icon">
                            <a href="#"><img src="{{ asset('frontend/assets/images/contact2-icon-adress3.png') }}" alt="icons"></a>
                        </div>
                        <div class="fbox-body">
                            <h4>Email address</h4>
                            <p>Damastore@gmail.com.</p>
                        </div>
                    </div>
                </div>
                <!-- End col-md-4 -->
                <div class="border-cotact2">
                    <img src="{{ asset('frontend/assets/images/border-contact2.png') }}" alt="border">
                </div>
            </div>
            <!-- End container -->
        </div>
        <!-- End box-icon-adress -->
        <div class="container">
            <div class="adress-info">
                <div class="col-md-3">
                    <div class="items">
                        <span class="icon">1</span>
                        <h3>StoreDama 01</h3>
                        <p><span>Address: </span>47 Hao Nam - Dong Da - Ha Noi - Viet Nam</p>
                        <p><span>Phone: </span>(+84) 163.5545.42</p>
                    </div>
                </div>
                <!-- End col-md-3 -->
                <div class="col-md-3">
                    <div class="items">
                        <span class="icon">2</span>
                        <h3>StoreDama 02</h3>
                        <p><span>Address: </span>47 Hao Nam - Dong Da - Ha Noi - Viet Nam</p>
                        <p><span>Phone: </span>(+84) 163.5545.42</p>
                    </div>
                </div>
                <!-- End col-md-3 -->
                <div class="col-md-3">
                    <div class="items">
                        <span class="icon">3</span>
                        <h3>StoreDama 03</h3>
                        <p><span>Address: </span>47 Hao Nam - Dong Da - Ha Noi - Viet Nam</p>
                        <p><span>Phone: </span>(+84) 163.5545.42</p>
                    </div>
                </div>
                <!-- End col-md-3 -->
                <div class="col-md-3">
                    <div class="items">
                        <span class="icon">4</span>
                        <h3>StoreDama 04</h3>
                        <p><span>Address: </span>47 Hao Nam - Dong Da - Ha Noi - Viet Nam</p>
                        <p><span>Phone: </span>(+84) 163.5545.42</p>
                    </div>
                </div>
                <!-- End col-md-3 -->
            </div>
        </div>
        <!-- end adress Info -->
    </div>
@endsection
