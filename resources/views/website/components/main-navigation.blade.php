<div id="topbar">
    <div class="container">
        <div class="topbar-left">
            <a class="refresh" href="#" title="Refresh"><i class="zmdi zmdi-refresh-sync"></i></a>
            <div class="cart dropdown">
                <a class="icon-cart" href="#" title="Search">
                    <i class="zmdi zmdi-search"></i>
                    <!--<span class="cart-count">4</span>-->
                </a>
                <div class="cart-list dropdown-menu">
                <!--<ul class="list">
                                <li>
                                    <a href="#" title="" class="cart-product-image"><img src="{{ asset('frontend/assets/images/products/1.jpg') }}" alt="Product"></a>
                                    <div class="text">
                                        <p class="product-name">Duma #2145</p>
                                        <p class="product-price">1 x $69.90</p>
                                    </div>
                                    &lt;!&ndash;<a href="#" class="delete-item">
                                        <i class="zmdi zmdi-close-circle-o"></i>
                                    </a>&ndash;&gt;
                                </li>
                            </ul>-->
                    <p class="total"><span>Track Your Shipment</span> </p><br>
                    <p>Enter your tracking No.</p>
                    <input type="text" placeholder="tracking No" class="checkout" href="#" title="Search">
                    <a class="checkout bg-black" href="#" title="Search">Search</a>
                </div>
            </div>
        </div>
        <!-- End topBar-left -->
        <div class="topbar-right">
            <a href="#" title="Adress"><i class="zmdi zmdi-pin"></i>locations</a>
            <div class="wrap-dollar-box dropdown">
                <a href="#" title="Dollar"><i class="zmdi zmdi-money-box"></i>Language<i class="zmdi zmdi-chevron-down"></i></a>
                <div class="dollar-list dropdown-menu" style="background-color: white">
                    <ul>
                        <li><a href="{{ url('lang/en') }}" title="English" style="color: #1b1b1b">English</a></li>
                        <li><a href="{{ url('lang/ar') }}" title="Arabic" style="color: #1b1b1b">Arabic</a></li>
                    </ul>
                </div>
            </div>
            <div class="wrap-sign-in cart dropdown">
                <a class="sign-in" href="#" title="user"><i class="zmdi zmdi-account"></i>My account</a>
                <div class="register-list cart-list dropdown-menu ">
                    <h3>My account</h3>
                    <form class="form-horizontal" method="POST">
                        <div class="acc-name">
                            <input class="form-control" type="text" placeholder="Account name" id="inputacname">
                        </div>
                        <div class="acc-pass">
                            <input class="form-control" type="text" placeholder="Password" id="inputpass">
                        </div>
                        <div class="remember">
                            <input type="checkbox" id="me" name="nar" />
                            <label for="me">remember me</label>
                            <a class="help" href="#" title="help ?">help?</a>
                        </div>
                        <button type="submit" class="link-button">Submit</button>
                    </form>
                    <h3>Or register</h3>
                    <form class="form-horizontal" method="POST">
                        <input type="text" placeholder="Your mail" id="inputmail" class="form-control">
                        <input type="password" placeholder="Password" id="inputpass1" class="form-control">
                        <button type="submit" class="link-button">register</button>
                    </form>
                    <h4>or register to</h4>
                    <div class="social">
                        <a class="facebook" href="#" title="facebook"><i class="zmdi zmdi-facebook"></i></a>
                        <a class="google" href="#" title="google"><i class="zmdi zmdi-google-glass"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End topbar-right -->
    </div>
    <!-- End container -->
</div>
<!-- End Top Bar -->
