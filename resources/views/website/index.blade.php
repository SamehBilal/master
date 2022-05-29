@extends('layouts.website')

@php $locale = session()->get('locale'); @endphp

@section('content')
    <header id="header" class="header-v1">
        <div id="topbar" dir="ltr">
            <div class="container">
                <div class="topbar-left">
                    <a class="refresh" href="{{ route('website.index') }}" title="Refresh"><i class="zmdi zmdi-refresh-sync"></i></a>
                    <div class="cart dropdown">
                        <a class="icon-cart" href="#" title="{{ __('content.search') }}">
                            <i class="zmdi zmdi-search"></i>
                        </a>
                        <div class="cart-list dropdown-menu">
                            <p class="total"><span>{{ __('content.Track Your Shipment') }}</span> </p><br>
                            <p>{{ __('content.Enter your tracking No.') }}</p>
                            <form action="{{ route('website.search') }}" method="GET">
                                <input type="text" placeholder="{{ __('content.tracking No') }}" class="checkout" name="s" title="{{ __('content.search') }}">
                                <button class="checkout bg-black"  title="{{ __('content.search') }}">{{ __('content.search') }}</button>
                            </form>

                        </div>
                    </div>
                </div>
                <!-- End topBar-left -->
                <div class="topbar-right">
                    <a href="{{ route('website.locations') }}" title="{{ __('content.locations') }}"><i class="zmdi zmdi-pin"></i>{{ __('content.locations') }}</a>
                    <div class="wrap-dollar-box dropdown">
                        <a href="#" title="{{ __('content.Language') }}"><i class="zmdi zmdi-money-box"></i>{{ __('content.Language') }}<i class="zmdi zmdi-chevron-down"></i></a>
                        <div class="dollar-list dropdown-menu" style="background-color: white">
                            <ul>
                                <li><a href="{{ url('lang/en') }}" title="{{ __('content.English') }}" class="language_title" style="color: #1b1b1b;" >{{ __('content.English') }}</a></li>
                                <li><a href="{{ url('lang/ar') }}" title="{{ __('content.Arabic') }}" style="color: #1b1b1b;" >{{ __('content.Arabic') }}</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="wrap-sign-in cart dropdown">
                        <a class="sign-in" href="@auth{{ route('website.account') }} @else # @endauth" title="{{ __('content.my_account') }}"><i class="zmdi zmdi-account"></i>{{ __('content.my_account') }}</a>
                        @auth
                            <div class="register-list cart-list dropdown-menu ">
                                <h3>{{ __('content.my_account') }}</h3>
                                @foreach($orders = \App\Models\Order::all() as $order)
                                    @if($order->customer->user->id == auth()->user()->id)
                                        <ul class="list">
                                            <li>
                                                <a href="{{ route('website.track',$order->id) }}" title="" class="cart-product-image"><img src="{{ asset('frontend/assets/images/products/home4-slideshow.png') }}" alt="Product"></a>
                                                <div class="text">
                                                    <p class="product-name">#{{ $order->tracking_no }}</p>
                                                    <p class="product-price">{{ $order->type }}</p>
                                                </div>
                                                <a href="{{ route('website.track',$order->id) }}" class="delete-item">
                                                    <i class="zmdi zmdi-open-in-new"></i>
                                                </a>
                                            </li>
                                        </ul>
                                        <p class="total"><span>{{ __('content.Latest Package') }}</span> </p>
                                    @endif
                                    @break
                                @endforeach
                                <a class="checkout" href="{{ route('website.account') }}" title="{{ __('content.my_account') }}">{{ __('content.my_account') }}</a>
                                <a class="checkout bg-black" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                $('#logout-form').submit();" title="{{ __('content.Logout') }}">{{ __('content.Logout') }}</a>
                                <form method="POST" id="logout-form" action="{{ route('logout') }}">
                                    @csrf
                                </form>
                            </div>
                        @else
                            <div class="register-list cart-list dropdown-menu ">
                                <h3>{{ __('content.my_account') }}</h3>
                                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="acc-name">
                                        <input class="form-control" value="{{ old('email') }}" type="email" placeholder="{{ __('content.Email') }}" name="email" id="email" required autofocus>
                                    </div>
                                    <div class="acc-pass">
                                        <input class="form-control" type="password" placeholder="{{ __('content.Password') }}" name="password" id="inputpass" required autocomplete="current-password">
                                    </div>
                                    <div class="remember">
                                        <input type="checkbox" id="me" name="remember" />
                                        <label for="me">{{ __('content.Remember me') }}</label>
                                        @if (Route::has('password.request'))
                                            <a class="help" href="{{ route('password.request') }}" title="{{ __('content.Forgot your password?') }}">{{ __('content.Forgot your password?') }}</a>
                                        @endif
                                    </div>
                                    <button type="submit" class="link-button">{{ __('content.Login') }}</button>
                                </form>
                                <h3>{{ __('content.Or register') }}</h3>
                                <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <input type="text" placeholder="{{ __('content.Full name') }}"  value="{{ old('full_name') }}" name="full_name" id="full_name" class="form-control" required autofocus>
                                    <input type="email" placeholder="{{ __('content.Email') }}"  value="{{ old('email') }}" name="email" id="email" class="form-control" required >
                                    <input class="form-control" type="password" placeholder="{{ __('content.Password') }}" name="password" id="inputpass" required autocomplete="current-password">
                                    <input class="form-control" type="password" placeholder="{{ __('content.Confirm Password') }}" name="password_confirmation" id="inputpass" required>
                                    <button type="submit" class="link-button">{{ __('content.Register') }}</button>
                                </form>
                                <h4>{{ __('content.or register with') }}</h4>
                                {{--<div class="social">
                                    <a class="facebook" href="#" title="facebook"><i class="zmdi zmdi-facebook"></i></a>
                                    <a class="google" href="#" title="google"><i class="zmdi zmdi-google-glass"></i></a>
                                </div>--}}
                            </div>
                        @endauth
                    </div>
                </div>
                <!-- End topbar-right -->
            </div>
            <!-- End container -->
        </div>
        <!-- End Top Bar -->

        <div class="header-top">
            <div class="container">
                <div class="inner-container">
                    <p class="icon-menu-mobile"><span class="icon-bar"></span></p>
                    <div class="logo"><a href="#" title="Dana-Logo"><img src="{{ asset('frontend/assets/images/Dana-menu-logo1.png') }}" alt="Dana-Logo" height="50"></a></div>
                    <div class="social social-home2">
                        <a class="facebook" href="#" title="facebook"><i class="zmdi zmdi-facebook"></i></a>
                        <a class="twitter" href="#" title="twitter"><i class="zmdi zmdi-twitter"></i></a>
                        <a class="instagram" href="#" title="instagram"><i class="zmdi zmdi-instagram"></i></a>
                        <a class="google" href="#" title="google"><i class="zmdi zmdi-google-glass"></i></a>
                    </div>
                    <div class="search">
                        <div class="search-form">
                            <form action="{{ route('website.search') }}" method="GET">
                                <div class="search-select">
                                    Search Package
                                </div>
                                <!-- End search Select -->
                                <input type="text" autocomplete="off" placeholder="Tracking no." value="@isset($_GET['s']) {{ $_GET['s'] }} @endisset" class="ajax_autosuggest_input ac_input" name="s">
                                <button type="submit" class="icon-search">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="menu-top menu-top-v2">
                        <ul class="nav-top">
                            <li class="level1 active"><a href="{{ route('website.index') }}" title="{{ __('content.Home') }}">{{ __('content.Home') }}</a></li>
                            <li class="level1"><a href="{{ route('website.search') }}" title="{{ __('content.Tracking') }}">{{ __('content.Tracking') }}</a></li>
                            <li class="level1 "><a href="{{ route('website.pricing') }}" title="{{ __('content.Pricing') }}">{{ __('content.Pricing') }}</a></li>
                            <li class="level1 "><a href="{{ route('website.about-us') }}" title="{{ __('content.About-us') }}">{{ __('content.About-us') }}</a></li>
                        </ul>
                    </div>
                    <!-- End menutop -->
                </div>
                <!-- End inner container -->
                <nav class="mega-menu mega-menu-v2">
                    <!-- Brand and toggle get grouped for better mobile display -->

                    <ul class="nav navbar-nav" id="navbar">

                        <li class="level1 dropdown">
                            {{-- <a href="#" title="men"><span class="icon-menu-header"></span></a> --}}
                            <span class="icon-menu-header ver2" style="background-color: #ffaf00;cursor: pointer"></span>
                            <div class="sub-menu dropdown-menu">
                                <ul class="menu-level-1">
                                    <li class="level2"><a href="#">{{ __('content.Links') }}</a>
                                        <ul class="menu-level-2">
                                            <li class="level3"><a href="{{ route('website.index') }}" title="{{ __('content.Home') }}">{{ __('content.Home') }}</a></li>
                                            <li class="level3"><a href="{{ route('website.pricing') }}" title="{{ __('content.Pricing') }}">{{ __('content.Pricing') }}</a></li>
                                            <li class="level3"><a href="{{ route('website.about-us') }}" title="{{ __('content.About-us') }}">{{ __('content.About-us') }}</a></li>
                                            <li class="level3"><a href="{{ route('website.contact-us') }}" title="{{ __('content.Contact-us') }}">{{ __('content.Contact-us') }}</a></li>
                                        </ul>
                                    </li>
                                    <li class="level2">
                                        <a href="#">{{ __('content.Specification') }}</a>
                                        <ul class="menu-level-2">
                                            <li class="level3"><a href="{{ route('website.search') }}" title="{{ __('content.Search a package') }}">{{ __('content.Search a package') }}</a></li>
{{--
                                            <li class="level3"><a href="{{ route('website.calculation') }}" title="{{ __('content.Calculate time & cost') }}">{{ __('content.Calculate time & cost') }}</a></li>
--}}
                                            @auth()
                                                @php
                                                    $user = \App\Models\User::find(auth()->user()->id);
                                                @endphp
                                                @if($user->hasRole('customer'))
                                                    <li class="level3"><a href="{{ route('dashboard.orders.create') }}" title="{{ __('content.Create a shipment') }}">{{ __('content.Create a shipment') }}</a></li>
                                                    <li class="level3"><a href="{{ route('dashboard.orders.index') }}" title="{{ __('content.Change my delivery') }}">{{ __('content.Change my delivery') }}</a></li>
                                                    <li class="level3"><a href="{{ route('dashboard.pickups.create') }}" title="{{ __('content.Schedule a pickup') }}">{{ __('content.Schedule a pickup') }}</a></li>
                                                @else
                                                    <li class="level3"><a href="{{ route('dashboard.business.create_front') }}" title="{{ __('content.Create a shipment') }}">{{ __('content.Create a shipment') }}</a></li>
                                                    <li class="level3"><a href="{{ route('dashboard.business.create_front') }}" title="{{ __('content.Change my delivery') }}">{{ __('content.Change my delivery') }}</a></li>
                                                    <li class="level3"><a href="{{ route('dashboard.business.create_front') }}" title="{{ __('content.Schedule a pickup') }}">{{ __('content.Schedule a pickup') }}</a></li>
                                                @endif
                                            @else
                                                <li class="level3"><a href="{{ route('dashboard.business.create_front') }}" title="{{ __('content.Create a shipment') }}">{{ __('content.Create a shipment') }}</a></li>
                                                <li class="level3"><a href="{{ route('dashboard.business.create_front') }}" title="{{ __('content.Change my delivery') }}">{{ __('content.Change my delivery') }}</a></li>
                                                <li class="level3"><a href="{{ route('dashboard.business.create_front') }}" title="{{ __('content.Schedule a pickup') }}">{{ __('content.Schedule a pickup') }}</a></li>
                                            @endauth
                                        </ul>
                                    </li>
                                    <li class="level2">
                                        <img src="{{ asset('frontend/assets/images/images-menu.jpg') }}" alt="Sub-Menu" />
                                    </li>
                                </ul>
                            </div>
                            <!-- End Dropdow Menu -->
                        </li>
                        <li class="level1">
                        </li>
                        <li class="level1 dropdown">

                        </li>
                        <li class="level1"></li>
                        <li class="level1"></li>
                        <li class="level1"></li>
                    </ul>
                </nav>
                <!-- End mega menu -->
               {{-- <div class="search search-v2">
                    <div class="search-form">
                        <form action="{{ route('website.search') }}" method="GET">
                            <div class="search-select dropdown">
                                {{ __('content.Search a package') }}
                            </div>
                            <!-- End search Select -->
                            <input type="text"  class="ajax_autosuggest_input ac_input" name="s" placeholder="{{ __('content.tracking No') }}" autocomplete="off">
                            <button type="submit" class="icon-search">
                                <i class="zmdi zmdi-search"></i>
                            </button>
                        </form>
                    </div>
                </div>--}}
            </div>
            <!-- End container -->
        </div>
        <!-- End header-top -->

        @include('website.components.menu-mobile')
        <!-- End menu mobile -->

    </header>
    <div class="slide-show-ver2">
        <div class="container">
            <div class="tp-banner-container">
                <div class="tp-banner tp-banner-ver2" >
                    <ul>
                        <!-- SLIDE  -->
                        <li data-transition="notransition" data-slotamount="6" data-masterspeed="1000" >
                            <!-- MAIN IMAGE -->
                            <img src="{{ asset('frontend/assets/images/bg-slide-show.png') }}" alt="bg-slide-show.png') }}"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
                            <!-- LAYER NR. 3 -->

                            <div class="tp-caption large_bold_orange weight-800 color-white skewfromleft customout size-123 text-shadow"
                                 data-x="{{ $locale == 'ar' ? '360':'180' }}"
                                 data-y="380"
                                 data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                 data-speed="800"
                                 data-start="1600"
                                 data-easing="Power4.easeOut"
                                 data-endspeed="300"
                                 data-endeasing="Power1.easeIn"
                                 data-captionhidden="on"
                                 style="z-index: 9">{{ __('content.fast shipping') }}
                            </div>
                            <!-- LAYER NR. 4 -->

                            <!-- LAYER NR. 5 -->
                            <div class="tp-caption large_bold_orange size-20 center color-white skewfromright customout transform-none"
                                 data-x="400"
                                 data-y="560"
                                 data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                 data-speed="800"
                                 data-start="1800"
                                 data-easing="Power4.easeOut"
                                 data-endspeed="300"
                                 data-endeasing="Power1.easeIn"
                                 data-captionhidden="on"
                                 style="z-index: 7">{{ __('content.cover all of Egypt') }}
                            </div>


                            <!-- LAYER NR. 8s -->
                            <div class="tp-caption skewfromright customout link-1 link-2 height-50"
                                 data-x="515"
                                 data-y="670"
                                 data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                 data-speed="1000"
                                 data-start="1500"
                                 data-easing="Power4.easeOut"
                                 data-endspeed="300"
                                 data-endeasing="Power1.easeIn"
                                 data-captionhidden="on"
                                 style="z-index: 8"><a href="#" title="Start Now">{{ __('content.Start Now') }}</a>
                            </div>

                            <div class="tp-caption skewfromleft customout link-1 link-2 icons height-50"
                                 data-x="500"
                                 data-y="673"
                                 data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                 data-speed="1000"
                                 data-start="1500"
                                 data-easing="Power4.easeOut"
                                 data-endspeed="300"
                                 data-endeasing="Power1.easeIn"
                                 data-captionhidden="on"
                                 style="z-index: 8"><a href="#" title="link"></a>
                            </div>

                            <!-- LAYER NR. 9 -->
                            <div class="tp-caption skewfromright customout"
                                 data-x="{{ $locale == 'ar' ? '900':'300' }}"
                                 data-y="320"
                                 data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                 data-speed="1000"
                                 data-start="1500"
                                 data-easing="Power4.easeOut"
                                 data-endspeed="300"
                                 data-endeasing="Power1.easeIn"
                                 data-captionhidden="on"
                                 style="z-index: 1"><img src="{{ asset('frontend/assets/images/home5-slideshow.png') }}" alt="headephone">
                            </div>
                        </li>
                        <!-- SLIDER -->
                        <!-- SLIDE  -->
                        <li data-transition="notransition" data-slotamount="6" data-masterspeed="1000" >
                            <!-- MAIN IMAGE -->
                            <img src="{{ asset('frontend/assets/images/bg-slide-show.png') }}" alt="bg-slide-show.png') }}"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
                            <!-- LAYER NR. 3 -->

                            <div class="tp-caption large_bold_orange weight-800 color-white skewfromleft customout size-123 text-shadow"
                                 data-x="180"
                                 data-y="380"
                                 data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                 data-speed="800"
                                 data-start="1600"
                                 data-easing="Power4.easeOut"
                                 data-endspeed="300"
                                 data-endeasing="Power1.easeIn"
                                 data-captionhidden="on"
                                 style="z-index: 9">{{ __('content.On Time') }}
                            </div>
                            <!-- LAYER NR. 4 -->

                            <!-- LAYER NR. 5 -->
                            <div class="tp-caption large_bold_orange size-20 center color-white skewfromright customout transform-none"
                                 data-x="400"
                                 data-y="560"
                                 data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                 data-speed="800"
                                 data-start="1800"
                                 data-easing="Power4.easeOut"
                                 data-endspeed="300"
                                 data-endeasing="Power1.easeIn"
                                 data-captionhidden="on"
                                 style="z-index: 7">{{ __('content.any location in Egypt') }}
                            </div>


                            <!-- LAYER NR. 8s -->
                            <div class="tp-caption skewfromright customout link-1 link-2 height-50"
                                 data-x="515"
                                 data-y="670"
                                 data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                 data-speed="1000"
                                 data-start="1500"
                                 data-easing="Power4.easeOut"
                                 data-endspeed="300"
                                 data-endeasing="Power1.easeIn"
                                 data-captionhidden="on"
                                 style="z-index: 8"><a href="#" title="Start Now">{{ __('content.Start Now') }}</a>
                            </div>

                            <div class="tp-caption skewfromleft customout link-1 link-2 icons height-50"
                                 data-x="500"
                                 data-y="673"
                                 data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                 data-speed="1000"
                                 data-start="1500"
                                 data-easing="Power4.easeOut"
                                 data-endspeed="300"
                                 data-endeasing="Power1.easeIn"
                                 data-captionhidden="on"
                                 style="z-index: 8"><a href="#" title="link"></a>
                            </div>

                            <!-- LAYER NR. 9 -->
                            <div class="tp-caption skewfromright customout"
                                 data-x="{{ $locale == 'ar' ? '900':'300' }}"
                                 data-y="320"
                                 data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                 data-speed="1000"
                                 data-start="1500"
                                 data-easing="Power4.easeOut"
                                 data-endspeed="300"
                                 data-endeasing="Power1.easeIn"
                                 data-captionhidden="on"
                                 style="z-index: 1"><img src="{{ asset('frontend/assets/images/home4-slideshow.png') }}" alt="headephone">
                            </div>
                        </li>
                        <!-- SLIDER -->
                    </ul>
                    <div class="tp-bannertimer"></div>
                </div>
                <!-- End container -->
            </div>
        </div>
    </div>
    <!-- <div class="slide-show-ver1">
            <div class="container">
                <div class="tp-banner-container">
                    <div class="tp-banner tp-banner-ver1" >
                        <ul>
                            &lt;!&ndash; SLIDE  &ndash;&gt;
                            <li data-transition="notransition" data-slotamount="6" data-masterspeed="1000" >
                                &lt;!&ndash; MAIN IMAGE &ndash;&gt;
                                <img src="{{ asset('frontend/assets/images/bg-slide-show.png') }}" alt="bg-slide-show.png') }}"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
                                &lt;!&ndash; LAYER NR. 3 &ndash;&gt;

                                <div class="tp-caption large_bold_orange weight-600 capitalize color-white skewfromleft customout size-60 weight-800 uppercase"
                                    data-x="155"
                                    data-y="260"
                                    data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                    data-speed="800"
                                    data-start="1600"
                                    data-easing="Power4.easeOut"
                                    data-endspeed="300"
                                    data-endeasing="Power1.easeIn"
                                    data-captionhidden="on"
                                    style="z-index: 9">Fast Shipping
                                </div>
                                &lt;!&ndash; LAYER NR. 4 &ndash;&gt;

                                &lt;!&ndash; LAYER NR. 5 &ndash;&gt;
                                <div class="tp-caption large_bold_orange size-18 color-white skewfromright customout transform-none"
                                    data-x="155"
                                    data-y="370"
                                    data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                    data-speed="800"
                                    data-start="1800"
                                    data-easing="Power4.easeOut"
                                    data-endspeed="300"
                                    data-endeasing="Power1.easeIn"
                                    data-captionhidden="on"
                                    style="z-index: 7">Lorem Ipsum and typesetting industry. Lorem Ipsum<br> the industry's <span class="text-span">Sale up to 40%</span> text ever<br> since the 1500s
                                </div>


                                &lt;!&ndash; LAYER NR. 8s &ndash;&gt;
                                <div class="tp-caption skewfromleft customout link-1 link-2 height-50"
                                    data-x="155"
                                    data-y="500"
                                    data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                    data-speed="1000"
                                    data-start="1500"
                                    data-easing="Power4.easeOut"
                                    data-endspeed="300"
                                    data-endeasing="Power1.easeIn"
                                    data-captionhidden="on"
                                    style="z-index: 8"><a href="#" title="Follow">Start Now</a>
                                </div>
                                 &lt;!&ndash; LAYER NR. 8s &ndash;&gt;
                                <div class="tp-caption skewfromleft customout link-1 link-2 icons height-50"
                                    data-x="270"
                                    data-y="500"
                                    data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                    data-speed="1000"
                                    data-start="1500"
                                    data-easing="Power4.easeOut"
                                    data-endspeed="300"
                                    data-endeasing="Power1.easeIn"
                                    data-captionhidden="on"
                                    style="z-index: 8"><a href="#" title="link"></a>
                                </div>

                                &lt;!&ndash; LAYER NR. 9 &ndash;&gt;
                                <div class="tp-caption skewfromright customout"
                                    data-x="590"
                                    data-y="130"
                                    data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                    data-speed="1000"
                                    data-start="1500"
                                    data-easing="Power4.easeOut"
                                    data-endspeed="300"
                                    data-endeasing="Power1.easeIn"
                                    data-captionhidden="on"
                                    style="z-index: 1"><img src="{{ asset('frontend/assets/images/Dana-home10.bg-feagtured.png') }}" alt="galaxy s7">
                                </div>
                            </li>
                            &lt;!&ndash; SLIDER &ndash;&gt;
                            &lt;!&ndash; SLIDE  &ndash;&gt;
                            <li data-transition="notransition" data-slotamount="6" data-masterspeed="1000" >
                                <img src="{{ asset('frontend/assets/images/bg-slide-show.png') }}" alt="bg-slide-show.png') }}"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">

                                <div class="tp-caption large_bold_orange weight-600 capitalize color-white skewfromleft customout size-60 weight-800 uppercase"
                                    data-x="155"
                                    data-y="260"
                                    data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                    data-speed="800"
                                    data-start="1600"
                                    data-easing="Power4.easeOut"
                                    data-endspeed="300"
                                    data-endeasing="Power1.easeIn"
                                    data-captionhidden="on"
                                    style="z-index: 9">Fast Shipping
                                </div>

                                <div class="tp-caption large_bold_orange size-18 color-white skewfromright customout transform-none"
                                    data-x="155"
                                    data-y="370"
                                    data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                    data-speed="800"
                                    data-start="1800"
                                    data-easing="Power4.easeOut"
                                    data-endspeed="300"
                                    data-endeasing="Power1.easeIn"
                                    data-captionhidden="on"
                                    style="z-index: 7">Lorem Ipsum and typesetting industry. Lorem Ipsum<br> the industry's <span class="text-span">Sale up to 40%</span> text ever<br> since the 1500s
                                </div>


                                <div class="tp-caption skewfromleft customout link-1 link-2 height-50"
                                    data-x="155"
                                    data-y="500"
                                    data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                    data-speed="1000"
                                    data-start="1500"
                                    data-easing="Power4.easeOut"
                                    data-endspeed="300"
                                    data-endeasing="Power1.easeIn"
                                    data-captionhidden="on"
                                    style="z-index: 8"><a href="#" title="Follow">Start Now</a>
                                </div>

                                <div class="tp-caption skewfromleft customout link-1 link-2 icons height-50"
                                    data-x="270"
                                    data-y="500"
                                    data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                    data-speed="1000"
                                    data-start="1500"
                                    data-easing="Power4.easeOut"
                                    data-endspeed="300"
                                    data-endeasing="Power1.easeIn"
                                    data-captionhidden="on"
                                    style="z-index: 8"><a href="#" title="link"></a>
                                </div>

                                <div class="tp-caption skewfromright customout"
                                    data-x="590"
                                    data-y="130"
                                    data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                    data-speed="1000"
                                    data-start="1500"
                                    data-easing="Power4.easeOut"
                                    data-endspeed="300"
                                    data-endeasing="Power1.easeIn"
                                    data-captionhidden="on"
                                    style="z-index: 1"><img src="{{ asset('frontend/assets/images/Dana-home1.bg-feagtured.png') }}" alt="galaxy s7">
                                </div>
                            </li>
                            &lt;!&ndash; SLIDER &ndash;&gt;
                        </ul>
                        <div class="tp-bannertimer"></div>
                </div>
                &lt;!&ndash; End container &ndash;&gt;
                </div>

            </div>
        </div>-->
    <!-- End Slide-Show -->
    <div class="banner-home3">
        <div class="container">
            <div class="col-md-12 coupon">
                <div class="title-ver2">
                    <h3 style="color: #0A2B56">{{ __('content.Search package') }}</h3>
                </div>
                <div class="contact-form" style="background-image: url({{ $locale == 'ar' ? asset('frontend/assets/images/search_background1.png'):asset('frontend/assets/images/search_background.png') }})">
                    <form class="form-horizontal" action="{{ route('website.search') }}" method="GET">
                        <div class="form-group col-md-12">
                            <input type="text" autocomplete="off" placeholder="{{ __('content.tracking No') }}" required name="s" class="form-control" id="inputfname" >
                        </div>
                        <div class="form-group col-md-12">
                            <button value="Submit" class="btn link-button link-border-raidus" style="background: #FFAF00" type="submit">
                                {{ __('content.search') }}
                            </button>
                        </div>
                    </form>
                </div>
                <!-- <a class="btn link-button link-border-raidus bg-gray" href="#" title="Continue shopping">Continue shopping</a>
                 <a class="btn link-button link-border-raidus bg-gray" href="#" title="Update cart">Update cart</a>-->
            </div>
        </div>
        <!-- End container -->
    </div>

   {{-- <div class="shipping-total">
        <div class="container">
            <div class="col-md-6 coupon">
                <div class="title-ver2">
                    <h3>Calculate Shipment</h3>
                </div>
                <div class="contact-form">
                    <form class="form-horizontal" action="{{ route('website.index') }}" method="GET">
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
                    <h3>Shipment Total</h3>
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
    </div>--}}
    <!-- End conainer -->

    <div class="main-content">
        <div class="featured-product slider-product space-padding-tb-80" data-wow-delay="0.1s">
            <div class="container">
                <div class="title-text size-64">
                    @if($locale == 'ar')
                        <h3><span>خ</span>دمات Droplin</h3>
                    @else
                        <h3><span>D</span>roplin {{ __('content.services') }}</h3>
                    @endif
                </div>
                <div class="images">
                    <img src="{{ asset('frontend/assets/images/Dana-home2.bg-featured.png') }}" alt="Product-Featured">
                </div>
                <!-- end images -->

                <div class="products">
                    <div class="product">
                        <span class="icon-cat headphone"></span>
                        <a class="product-images" href="#" title="">
                            <img class="primary_image" src="{{ asset('frontend/assets/images/Dana-home1-product-featured1.jpg') }}" alt="Product"/>
                        </a>
                        <div class="product-content">
                            <p>{{ __('content.Delivery') }} </p>
                            <p class="title"> {{ __('content.Next Day Delivery') }}</p>
                            <ul>

                                <p>{{ __('content.deliver the next day') }}</p>
                            </ul>
                        </div>
                        <!-- End product content -->
                        {{--<div class="action">
                            <a href="#" class="refresh"><i class="zmdi zmdi-refresh-sync"></i></a>
                            <a title="Like" href="#"><i class="zmdi zmdi-favorite-outline"></i></a>
                            <a title="add-to-cart" href="#"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                        </div> --}}
                    </div>
                    <!-- End product -->
                    <div class="product">
                        <span class="icon-cat headphone"></span>
                        <a class="product-images" href="#" title="">
                            <img class="primary_image" src="{{ asset('frontend/assets/images/Dana-home1-product-featured2.jpg') }}" alt="Product"/>
                        </a>
                        <div class="product-content">
                            <p>{{ __('content.Exchange Shipments') }} </p>
                            <p class="title"> {{ __('content.Exchange Shipments') }}</p>
                            <ul>
                                <p>{{ __('content.Exchange a shipment') }}</p>
                            </ul>
                        </div>
                        <!-- End product content -->
                        <!-- <div class="action">
                            <a href="#" class="refresh"><i class="zmdi zmdi-refresh-sync"></i></a>
                            <a title="Like" href="#"><i class="zmdi zmdi-favorite-outline"></i></a>
                            <a title="add-to-cart" href="#"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                        </div> -->
                    </div>
                    <!-- End product -->
                    <div class="product">
                        <span class="icon-cat headphone"></span>
                        <a class="product-images" href="#" title="">
                            <img class="primary_image" src="{{ asset('frontend/assets/images/Dana-home1-product-featured4.jpg') }}" alt="Product"/>
                        </a>
                        <div class="product-content">
                            <p>{{ __('content.Customer Returns') }} </p>
                            <p class="title"> {{ __('content.Customer Returns') }} </p>
                            <ul>
                                <p>{{ __('content.From second thoughts') }} </p>
                            </ul>
                        </div>
                        <!-- End product content -->
                        <!-- <div class="action">
                            <a href="#" class="refresh"><i class="zmdi zmdi-refresh-sync"></i></a>
                            <a title="Like" href="#"><i class="zmdi zmdi-favorite-outline"></i></a>
                            <a title="add-to-cart" href="#"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                        </div> -->
                    </div>
                    <!-- End product -->
                    <div class="product">
                        <span class="icon-cat headphone"></span>
                        <a class="product-images" href="#" title="">
                            <img class="primary_image" src="{{ asset('frontend/assets/images/Dana-home1-product-featured3.jpg') }}" alt="Product"/>
                        </a>
                        <div class="product-content">
                            <p>{{ __('content.Cash Collection') }}</p>
                            <p class="title"> {{ __('content.Cash Collection') }}</p>
                            <ul>
                                <p>{{ __('content.Real-time insights') }}</p>
                            </ul>
                        </div>
                        <!-- End product content -->
                        <!-- <div class="action">
                            <a href="#" class="refresh"><i class="zmdi zmdi-refresh-sync"></i></a>
                            <a title="Like" href="#"><i class="zmdi zmdi-favorite-outline"></i></a>
                            <a title="add-to-cart" href="#"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                        </div> -->
                    </div>
                    <!-- End product -->
                </div>
                <!-- End product -->

                <div class="wrap-time">
                    <h3>{{ __('content.From documents to products') }}</h3>
                    <p>{{ __('content.deliver shipments') }}</p>
                </div>
                <!-- End wrap-time -->
            </div>
            <!-- End container -->
        </div>
        <!-- End popular-product -->
        <div class="hot-deals">
            <div class="container">
                <div data-ride="carousel" class="vertical-slider carousel vertical slide" id="myCarousel">
                    <span class="btn-vertical-slider zmdi zmdi-favorite-outline next" data-slide="next"></span>
                    <!-- Carousel items -->
                    <div class="carousel-inner">
                        @php $count = 0; @endphp
                        @foreach($deals as $deal)
                            <div class="item {{ $count == 0 ? 'active':'' }}">
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6" dir="ltr">
                                        <div class="product-images">
                                            <div class="slide-product-images">
                                                @php
                                                    $lastChar = substr($deal->images, -1);
                                                    if($lastChar == '/'){
                                                        $images = substr_replace($deal->images ,"", -1);
                                                    }
                                                @endphp
                                                @foreach(explode("/",$images) as $image)
                                                    <div class="items" data-thumb='<img class="primary_image" src="{{ asset("storage/deals/{$deal->id}/{$image}") }}" alt=""/>'>
                                                        <a href="#" title="products">
                                                            <img class="primary_image" src="{{ asset("storage/deals/{$deal->id}/{$image}") }}" alt=""/>
                                                        </a>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="title-text color-white">
                                            <h3><span>{{ $locale == 'ar' ? $deal->ar_title[0]:$deal->en_title[0]  }}</span>{{ $locale == 'ar' ? substr($deal->ar_title, 1):substr($deal->en_title, 1)  }}</h3>
                                        </div>
                                        <p>{{ $locale == 'ar' ? $deal->ar_description:$deal->en_description  }}</p>
                                        @if($locale == 'ar')
                                            {!! $deal->ar_details !!}
                                        @else
                                            {!! $deal->en_details !!}
                                        @endif
                                        <p class="wrap-price">{{ __('content.Start') }} <span class="price">{{ __('content.Now') }} </span></p>
                                    </div>
                                </div>
                                <!--/row-fluid-->
                            </div>
                            @php $count++ @endphp
                        @endforeach
                    </div>
                    <span class="btn-vertical-slider zmdi zmdi-favorite-outline prev" data-slide="prev"></span>
                </div>
            </div>
            <!-- End container -->
        </div>
        <!-- End hot deals -->
        <!-- End OurNewProduct -->
    <!-- <div class="banner-home1-bottom">
                        <div class="container">
                            <div class="images" data-wow-duration="0.5s" data-wow-delay="400ms">
                                <img src="{{ asset('frontend/assets/images/Dana-home2-banner-bottom.png') }}" alt="Banner">
                            </div> -->
        <!-- End image -->
        <!-- <div class="text" data-wow-duration="0.5s" data-wow-delay="400ms">
            <p>Shipping overview</p>
            <p class="product-title">Why you should use our shipping ?</p>
            <div class="description">
                <ul>
                    <li>sed do eiusmod tempor incididunt ut labore et dolore magna.</li>
                    <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit </li>
                    <li>Duis aute irure dolor in reprehenderit  </li>
                    <li>Sed ut perspiciatis unde omnis iste </li>
                    <li>SUPC: 1517704</li>
                </ul>
            </div>
            <div class="product-price">
                <span class="price">Start</span>
                <span class="title"> Now</span>
                <span class="price-old">$250.00</span>-->
        <!-- </div>
        <div class="product"> -->
        <!-- <div class="action">
            <a class="refresh" href="#"><i class="zmdi zmdi-refresh-sync"></i></a>
            <a href="#" title="Like"><i class="zmdi zmdi-favorite-outline"></i></a>
            <a href="#" title="add-to-cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
        </div> -->
        <!--  </div>
     </div> -->
        <!-- End text -->
        <!--  </div> -->
        <!-- End container -->
        <!--  </div> -->
        <!-- End Banner Home1 Bottom -->

    </div>

    <!-- End product-footer -->
    <div class="brand-container space-50">
        <div class="container">
            <div class="slider-brand" dir="ltr">
                <div class="item">
                    <a href="#" title="Brand">
                        <img src="{{ asset('frontend/assets/images/Dama-brand1.jpg') }}" alt="Brand" >
                    </a>
                </div>
                <!-- End item -->
                <div class="item">
                    <a href="#" title="Brand">
                        <img src="{{ asset('frontend/assets/images/Dama-brand2.jpg') }}" alt="Brand" >
                    </a>
                </div>
                <!-- End item -->
                <div class="item">
                    <a href="#" title="Brand">
                        <img src="{{ asset('frontend/assets/images/Dama-brand3.jpg') }}" alt="Brand" >
                    </a>
                </div>
                <!-- End item -->
                <div class="item">
                    <a href="#" title="Brand">
                        <img src="{{ asset('frontend/assets/images/Dama-brand4.jpg') }}" alt="Brand" >
                    </a>
                </div>
                <!-- End item -->
                <div class="item">
                    <a href="#" title="Brand">
                        <img src="{{ asset('frontend/assets/images/Dama-brand5.jpg') }}" alt="Brand" >
                    </a>
                </div>
                <!-- End item -->
                <div class="item">
                    <a href="#" title="Brand">
                        <img src="{{ asset('frontend/assets/images/Dama-brand6.jpg') }}" alt="Brand" >
                    </a>
                </div>
                <!-- End item -->
            </div>
            <!-- End brand slider -->
        </div>
        <!-- End Container -->
    </div>
    <!-- End Brand Container -->
@endsection
