@extends('layouts.website')
@php $locale = session()->get('locale'); @endphp

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
                    <li class="item" rel="my-packages">{{ __('content.My Packages') }}</li>
                    <li class="item" rel="edit-account">{{ __('content.Edit Account') }}</li>
                </ul>
                <div class="tab-container">
                    <div id="my-packages" class="tab-content">
                        <div class="title-text">
                            @if($locale == 'ar')
                                <h3><span>ش</span>حناتي</h3>
                            @else
                                <h3><span>M</span>y Packages</h3>
                            @endif
                        </div>
                        <!-- End title -->
                        <div class="upsell-product products">
                            @forelse($orders as $order)
                                <div class="item-inner">
                                    <div class="product ">
                                        {{--<span class="new lable">New</span>--}}
                                        <p class="product-title open-sans">#{{ $order->tracking_no }}</p>
                                        <p class="product-price">
                                            @switch($order->type)
                                                @case('Deliver')
                                                <span>{{ __('content.Cash on Delivery') }}</span>
                                                <span class="open-sans">
                                                    {{ $order->cash_on_delivery }} {{ __('content.EGP') }}
                                                </span>
                                                @break
                                                @case('Exchange')
                                                <span>{{ __('dashboard.Cash Exchange Amount') }}</span>
                                                <span class="open-sans">
                                                    {{ $order->cash_exchange_amount }} {{ __('content.EGP') }}
                                                </span>
                                                @break
                                                @case('Return')
                                                <span>{{ __('dashboard.Refund Amount') }}</span>
                                                <span class="open-sans">
                                                    {{ $order->refund_amount }} {{ __('content.EGP') }}
                                                </span>
                                                @break
                                                @case('Cash Collection')
                                                <span>{{ __('dashboard.Cash to Collect') }}</span>
                                                <span class="open-sans">
                                                    {{ $order->cash_to_collect }} {{ __('content.EGP') }}
                                                </span>
                                                @break
                                            @endswitch

                                        </p>
                                        <a class="product-images" href="#" title="">
                                            <img class="primary_image" src="{{ asset('frontend/assets/images/Dana-home1-product1 copy1.png') }}" alt="images"/>
                                            <img class="secondary_image" src="{{ asset('frontend/assets/images/Dana-home1-product1 copy1.png') }}" alt="images"/>
                                        </a>
                                        <p class="description">{{--Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.--}}</p>
                                        <div class="action">
                                            <a href="{{ route('website.track',$order->id) }}" class="link-button">{{ __('content.Track') }}</a>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <h3>{{ __('content.packages yet') }}</h3>
                            @endforelse
                        </div>
                    </div>
                    <div id="edit-account" class="tab-content">
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
                        @if($locale == 'ar')
                            <div class="col-md-6"></div>
                        @else
                        @endif
                        <div class="col-md-6">
                            <div class="title-ver2">
                                <h3>{{ __('content.Edit Account') }}</h3>
                            </div>
                            <form class="form-horizontal" method="POST" action="{{ route('website.account.edit',$user->id) }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class=" control-label" for="first_name">{{ __('content.First Name') }}*</label>
                                    <input type="text"
                                           class="form-control @error('first_name') is-invalid @enderror"
                                           value="{{ $user->first_name }}"
                                           id="first_name"
                                           name="first_name"
                                           required="required"
                                           autocomplete="first_name"
                                           placeholder="{{ __('content.First Name') }} ..."
                                           autofocus>
                                    @error('first_name')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class=" control-label" for="last_name">{{ __('content.Last Name') }}*</label>
                                    <input type="text"
                                           class="form-control @error('last_name') is-invalid @enderror"
                                           value="{{ $user->last_name }}"
                                           id="last_name"
                                           name="last_name"
                                           required="required"
                                           autocomplete="last_name"
                                           placeholder="{{ __('content.last Name') }} ..."
                                           autofocus>
                                    @error('last_name')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class=" control-label" for="full_name">{{ __('content.Full name') }}*</label>
                                    <input type="text"
                                           class="form-control @error('full_name') is-invalid @enderror"
                                           value="{{ $user->full_name }}"
                                           id="full_name"
                                           name="full_name"
                                           required="required"
                                           autocomplete="full_name"
                                           placeholder="{{ __('content.Full name') }} ..."
                                           autofocus>
                                    @error('full_name')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class=" control-label" for="email">{{ __('content.Email') }} *</label>
                                    <input type="email"
                                           id="email"
                                           class="form-control @error('email') is-invalid @enderror"
                                           value="{{ $user->email }}"
                                           required="required"
                                           name="email"
                                           autocomplete="email"
                                           placeholder="{{ __('content.Email') }} ...">
                                    @error('email')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class=" control-label" for="password">{{ __('content.Password') }} *</label>
                                    <input type="password"
                                           id="password"
                                           class="form-control @error('password') is-invalid @enderror"
                                           placeholder="{{ __('content.Password') }} ..."
                                           name="password"
                                           autocomplete="new-password">
                                    @error('password')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class=" control-label" for="password-confirm">{{ __('content.Confirm Password') }} *</label>
                                    <input type="password"
                                           id="password-confirm"
                                           name="password_confirmation"
                                           autocomplete="new-password"
                                           class="form-control"
                                           placeholder="{{ __('content.Confirm Password') }} ...">
                                    @error('password_confirmation')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class=" control-label" for="phone">{{ __('content.Phone') }} *</label>
                                    <input type="text"
                                           class="form-control @error('phone') is-invalid @enderror"
                                           value="{{ $user->phone }}"
                                           id="phone"
                                           name="phone"
                                           data-mask="00000000000"
                                           placeholder="{{ __('content.Phone') }}  ...">
                                    @error('phone')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class=" control-label" for="select05">{{ __('content.Gender') }} *</label>
                                    <select id="select05"
                                            data-toggle="select"
                                            name="gender"
                                            class="form-control form-control-sm @error('gender') is-invalid @enderror">
                                        <option value="Male" @if($user->gender == 'Male') selected @endif>{{ __('content.Male') }}</option>
                                        <option value="Female" @if($user->gender == 'Female') selected @endif>{{ __('content.Female') }}</option>
                                    </select>
                                    @error('gender')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class=" control-label" for="date_of_birth">{{ __('content.Birth date') }} *</label>
                                    <input type="date"
                                           class="form-control @error('date_of_birth') is-invalid @enderror "
                                           value="{{ $user->date_of_birth }}"
                                           id="date_of_birth"
                                           name="date_of_birth"
                                           placeholder="{{ __('content.Birth date') }} ...">
                                    @error('date_of_birth')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button class="btn link-button link-button-v2" type="submit">{{ __('content.Submit') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
