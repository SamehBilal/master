<nav class="mega-menu">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <ul class="nav navbar-nav" id="navbar">
            <li class="level1 @yield('home')"><a href="#" title="Headphone">Home</a>
                <ul class="menu-level-1">
                    <li class="level2"><a href="#" title="Home 1">Headphone 1</a></li>
                    <li class="level2"><a href="#" title="Home 2">Headphone 2</a></li>
                    <li class="level2"><a href="#" title="Home 3">Headphone 3</a></li>
                    <li class="level2"><a href="#" title="Home 4">Headphone 4</a></li>
                </ul>
            </li>
            <li class="level1 @yield('pricing')"><a href="{{ route('website.pricing') }}" title="Pricing">Pricing</a></li>
            <li class="level1 @yield('track') dropdown">
                <a href="#" title="men">Track</a>
                <div class="sub-menu dropdown-menu">
                    <ul class="menu-level-1">
                        <li class="level2"><a href="#">Laptop</a>
                            <ul class="menu-level-2">
                                <li class="level3"><a href="#" title="Apple">Apple</a></li>
                                <li class="level3"><a href="#" title="Samsung">Samsung</a></li>
                                <li class="level3"><a href="#" title="Sony">Sony</a></li>
                                <li class="level3"><a href="#" title="HTC">HTC</a></li>
                                <li class="level3"><a href="#" title="Xaomi">Xaomi</a></li>
                                <li class="level3"><a href="#" title="LG">LG</a></li>
                            </ul>
                        </li>
                        <li class="level2"><a href="#">Accessories</a>
                            <ul class="menu-level-2">
                                <li class="level3"><a href="#" title="Submenu1">Submenu1</a></li>
                                <li class="level3"><a href="#" title="Submenu2">Submenu2</a></li>
                                <li class="level3"><a href="#" title="Submenu3">Submenu3</a></li>
                                <li class="level3"><a href="#" title="Submenu4">Submenu4</a></li>
                                <li class="level3"><a href="#" title="Submenu5">Submenu5</a></li>
                            </ul>
                        </li>
                        <li class="level2">
                            <img src="{{ asset('frontend/assets/images/images-menu.jpg') }}" alt="Sub-Menu" />
                        </li>
                    </ul>
                </div>
                <!-- End Dropdow Menu -->
            </li>
            <li class="level1 @yield('about-us')"><a href="{{ route('website.about-us') }}" title="About Us">About Us</a></li>
            <li class="level1 @yield('contact-us')"><a href="{{ route('website.contact-us') }}" title="Contact Us">Contact Us</a></li>
        </ul>
        <div class="menu-icon-right">
            <a class="refresh" href="#" title="twitter"><i class="zmdi zmdi-refresh-sync"></i></a>
            <a class="favor" href="#" title="sky"><i class="zmdi zmdi-favorite-outline"></i></a>

            <div class="cart dropdown">
                <a class="icon-cart" href="#" title="Cart">
                    <i class="zmdi zmdi-shopping-cart-plus"></i>
                    <span class="cart-count">4</span>
                </a>
                <div class="cart-list dropdown-menu">
                    <ul class="list">
                        <li>
                            <a href="#" title="" class="cart-product-image"><img src="{{ asset('frontend/assets/images/products/1.jpg') }}" alt="Product"></a>
                            <div class="text">
                                <p class="product-name">Duma #2145</p>
                                <p class="product-price">1 x $69.90</p>
                            </div>
                            <a href="#" class="delete-item">
                                <i class="zmdi zmdi-close-circle-o"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" title="" class="cart-product-image"><img src="{{ asset('frontend/assets/images/products/1.jpg') }}" alt="Product"></a>
                            <div class="text">
                                <p class="product-name">Duma #2145</p>
                                <p class="product-price">1 x $69.90</p>
                            </div>
                            <a href="#" class="delete-item">
                                <i class="zmdi zmdi-close-circle-o"></i>
                            </a>
                        </li>
                    </ul>
                    <p class="total"><span>Total cost</span> $1121.98</p>
                    <a class="checkout" href="#" title="view cart">view cart</a>
                    <a class="checkout bg-black" href="#" title="check out">Check out</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End container -->
</nav>
<!-- End mega menu -->
