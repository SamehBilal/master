<div id="topbar">
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
            <a href="{{ route('website.locations') }}" title="Locations"><i class="zmdi zmdi-pin"></i>locations</a>
            <div class="wrap-dollar-box dropdown">
                <a href="#" title="Dollar"><i class="zmdi zmdi-money-box"></i>Language<i class="zmdi zmdi-chevron-down"></i></a>
                <div class="dollar-list dropdown-menu" style="background-color: white">
                    <ul>
                        <li><a href="{{ url('lang/en') }}" title="English" class="language_title" style="color: #1b1b1b;" >English</a></li>
                        <li><a href="{{ url('lang/ar') }}" title="Arabic" style="color: #1b1b1b;" >Arabic</a></li>
                    </ul>
                </div>
            </div>
            <div class="wrap-sign-in cart dropdown">
                <a class="sign-in" href="{{ route('website.account') }}" title="My account"><i class="zmdi zmdi-account"></i>My account</a>
                @auth
                    <div class="register-list cart-list dropdown-menu ">
                        <h3>My account</h3>
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
                                <p class="total"><span>Latest Package</span> </p>
                            @endif
                            @break
                        @endforeach
                        <a class="checkout" href="{{ route('website.account') }}" title="My Account">My Account</a>
                    </div>
                @else
                    <div class="register-list cart-list dropdown-menu ">
                        <h3>My account</h3>
                        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="acc-name">
                                <input class="form-control" value="{{ old('email') }}" type="email" placeholder="{{ __('Email') }}" name="email" id="email" required autofocus>
                            </div>
                            <div class="acc-pass">
                                <input class="form-control" type="password" placeholder="Password" name="password" id="inputpass" required autocomplete="current-password">
                            </div>
                            <div class="remember">
                                <input type="checkbox" id="me" name="remember" />
                                <label for="me">{{ __('Remember me') }}</label>
                                @if (Route::has('password.request'))
                                    <a class="help" href="{{ route('password.request') }}" title="{{ __('Forgot your password?') }}">{{ __('Forgot your password?') }}</a>
                                @endif
                            </div>
                            <button type="submit" class="link-button">Submit</button>
                        </form>
                        <h3>Or register</h3>
                        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                            @csrf
                            <input type="text" placeholder="{{ __('Full name') }}"  value="{{ old('full_name') }}" name="full_name" id="full_name" class="form-control" required autofocus>
                            <input type="email" placeholder="{{ __('Email') }}"  value="{{ old('email') }}" name="email" id="email" class="form-control" required >
                            <input class="form-control" type="password" placeholder="{{ __('Password') }}" name="password" id="inputpass" required autocomplete="current-password">
                            <input class="form-control" type="password" placeholder="{{ __('Confirm Password') }}" name="password_confirmation" id="inputpass" required>
                            <button type="submit" class="link-button">register</button>
                        </form>
                        <h4>or register to</h4>
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
