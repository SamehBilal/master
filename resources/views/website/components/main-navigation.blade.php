@php $locale = session()->get('locale'); @endphp
<div id="topbar" dir="ltr">
    <div class="container">
        <div class="topbar-left">
            <a class="facebook" href="#" title="facebook"><i class="zmdi zmdi-facebook"></i></a>
            <a class="twitter" href="#" title="twitter"><i class="zmdi zmdi-twitter"></i></a>
            <a class="instagram" href="#" title="instagram"><i class="zmdi zmdi-instagram"></i></a>
            <a class="google" href="#" title="google"><i class="zmdi zmdi-google-glass"></i></a>

            <!-- End cart -->
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
                        <div class="social">
                            <a class="facebook" href="#" title="facebook"><i class="zmdi zmdi-facebook"></i></a>
                            <a class="google" href="#" title="google"><i class="zmdi zmdi-google-glass"></i></a>
                        </div>
                    </div>
                @endauth
            </div>
        </div>
        <!-- End topbar-right -->
    </div>
    <!-- End container -->
</div>
<!-- End Top Bar -->
