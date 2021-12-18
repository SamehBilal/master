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
                <li><a href="{{ route('website.index') }}">{{ __('content.Home') }}</a></li>
                <li class="active">{{ __('content.my_account') }}</li>
            </ul>
        </div>
        <!-- End container -->
    </div>
    <div class="main-content">
        <div class="container">
            <div class="hoz-tab-container space-padding-tb-40">
                <ul class="tabs">
                    <li class="item" rel="My-Packages">My Packages</li>
                    <li class="item" rel="Edit-Account">Edit Account</li>
                </ul>
                <div class="tab-container">
                    <div id="My-Packages" class="tab-content">
                        <div class="title-text">
                            <h3><span>M</span>y Packages</h3>
                        </div>
                        <!-- End title -->
                        <div class="upsell-product products">
                            @forelse($orders as $order)
                                <div class="item-inner">
                                    <div class="product ">
                                        {{--<span class="new lable">New</span>--}}
                                        <p class="product-title">#{{ $order->tracking_no }}</p>
                                        <p class="product-price"><span>Cash On Delivery: </span>{{ $order->cash_on_delivery }} EGP</p>
                                        <a class="product-images" href="#" title="">
                                            <img class="primary_image" src="{{ asset('frontend/assets/images/Dana-home1-product1 copy1.png') }}" alt="images"/>
                                            <img class="secondary_image" src="{{ asset('frontend/assets/images/Dana-home1-product1 copy1.png') }}" alt="images"/>
                                        </a>
                                        <p class="description">{{--Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.--}}</p>
                                        <div class="action">
                                            <a href="{{ route('website.track',$order->id) }}" class="link-button">Track Package</a>
                                        </div>
                                    </div>
                                </div>
                            @empty
                            @endforelse
                        </div>
                    </div>
                    <div id="Edit-Account" class="tab-content">
                       {{-- <div class="col-md-6">
                            <div class="coment-container">
                                <div class="panel-body">
                                    <ul class="media-list">
                                        <li class="media">
                                            <a class="pull-left" href="#">
                                                <img class="media-object img-circle" src="{{ asset('frontend/assets/images/avatar1.jpg') }}" alt="images">
                                            </a>
                                            <div class="media-body">
                                                <p class="date">April 9, 2016</p>
                                                <h4 class="media-heading">jennifer lopez</h4>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text</p>
                                                <p class="tags">
                                                    <a href="#" title="like"><i class="zmdi zmdi-favorite-outline"></i>3</a>
                                                    <a href="#" title="reply"><i class="zmdi zmdi-mail-reply"></i>3</a>
                                                </p>
                                                <!-- Nested media object -->
                                                <div class="media">
                                                    <a class="pull-left" href="#">
                                                        <img class="media-object img-circle" src="{{ asset('frontend/assets/images/avatar1.jpg') }}" alt="images">
                                                    </a>
                                                    <div class="media-body">
                                                        <p class="date">April 9, 2016</p>
                                                        <h4 class="media-heading">jennifer lopez</h4>
                                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text</p>
                                                        <p class="tags">
                                                            <a href="#" title="like"><i class="zmdi zmdi-favorite-outline"></i>3</a>
                                                            <a href="#" title="reply"><i class="zmdi zmdi-mail-reply"></i>3</a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <a class="pull-left" href="#">
                                                <img class="media-object img-circle" src="{{ asset('frontend/assets/images/avatar1.jpg') }}" alt="images">
                                            </a>
                                            <div class="media-body">
                                                <p class="date">April 9, 2016</p>
                                                <h4 class="media-heading">jennifer lopez</h4>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text</p>
                                                <p class="tags">
                                                    <a href="#" title="like"><i class="zmdi zmdi-favorite-outline"></i>3</a>
                                                    <a href="#" title="reply"><i class="zmdi zmdi-mail-reply"></i>3</a>
                                                </p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- End comment -->
                        </div>--}}
                        <div class="col-md-6">
                            <div class="title-ver2">
                                <h3>Edit your account</h3>
                            </div>
                            <form class="form-horizontal" method="POST" action="{{ route('website.account.edit',$user->id) }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class=" control-label" for="first_name">First Name*</label>
                                    <input type="text"
                                           class="form-control @error('first_name') is-invalid @enderror"
                                           value="{{ $user->first_name }}"
                                           id="first_name"
                                           name="first_name"
                                           required="required"
                                           autocomplete="first_name"
                                           placeholder="Your first name ..."
                                           autofocus>
                                    @error('first_name')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class=" control-label" for="last_name">Last Name*</label>
                                    <input type="text"
                                           class="form-control @error('last_name') is-invalid @enderror"
                                           value="{{ $user->last_name }}"
                                           id="last_name"
                                           name="last_name"
                                           required="required"
                                           autocomplete="last_name"
                                           placeholder="Your last name ..."
                                           autofocus>
                                    @error('last_name')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class=" control-label" for="full_name">Full Name*</label>
                                    <input type="text"
                                           class="form-control @error('full_name') is-invalid @enderror"
                                           value="{{ $user->full_name }}"
                                           id="full_name"
                                           name="full_name"
                                           required="required"
                                           autocomplete="full_name"
                                           placeholder="Your full name ..."
                                           autofocus>
                                    @error('full_name')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class=" control-label" for="email">Email *</label>
                                    <input type="email"
                                           id="email"
                                           class="form-control @error('email') is-invalid @enderror"
                                           value="{{ $user->email }}"
                                           required="required"
                                           name="email"
                                           autocomplete="email"
                                           placeholder="Your email address ...">
                                    @error('email')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class=" control-label" for="email">Password *</label>
                                    <input type="password"
                                           id="password"
                                           class="form-control @error('password') is-invalid @enderror"
                                           placeholder="Password ..."
                                           name="password"
                                           autocomplete="new-password">
                                    @error('password')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class=" control-label" for="email">Confirm Password *</label>
                                    <input type="password"
                                           id="password-confirm"
                                           name="password_confirmation"
                                           autocomplete="new-password"
                                           class="form-control"
                                           placeholder="Confirm password ...">
                                    @error('password_confirmation')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class=" control-label" for="phone">Phone *</label>
                                    <input type="text"
                                           class="form-control @error('phone') is-invalid @enderror"
                                           value="{{ $user->phone }}"
                                           id="phone"
                                           name="phone"
                                           data-mask="00000000000"
                                           placeholder="Your mobile phone ...">
                                    @error('phone')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class=" control-label" for="select05">Gender *</label>
                                    <select id="select05"
                                            data-toggle="select"
                                            name="gender"
                                            class="form-control form-control-sm @error('gender') is-invalid @enderror">
                                        <option value="Male" @if($user->gender == 'Male') selected @endif>Male</option>
                                        <option value="Female" @if($user->gender == 'Female') selected @endif>Female</option>
                                    </select>
                                    @error('gender')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class=" control-label" for="date_of_birth">Birth date *</label>
                                    <input type="date"
                                           class="form-control @error('date_of_birth') is-invalid @enderror "
                                           value="{{ $user->date_of_birth }}"
                                           id="date_of_birth"
                                           name="date_of_birth"
                                           placeholder="Your Birth date ...">
                                    @error('date_of_birth')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button class="btn link-button link-button-v2" type="submit">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
