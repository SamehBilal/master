<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <link rel="shortcut icon" href="{{ asset('frontend/assets/images/favicon.png') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/bootstrap.css') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/style.css') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/vendor/owl-slider.css') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/vendor/settings.css') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/vendor/animate.css') }}"/>
        <title>Droplin</title>
    </head>
    <body>
        <header id="header" class="header-v1">
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
                                    <li><a href="#" title="English" style="color: #1b1b1b">English</a></li>
                                    <li><a href="#" title="Arabic" style="color: #1b1b1b">Arabic</a></li>
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
            <div class="header-top">
                <div class="container">
                <div class="inner-container">
                    <p class="icon-menu-mobile"><span class="icon-bar"></span></p>
                    <div class="logo"><a href="#" title="Dana-Logo"><img src="{{ asset('frontend/assets/images/Dana-menu-logo.png') }}" alt="Dana-Logo" height="50"></a></div>
                    <div class="social social-home2">
                        <a class="facebook" href="#" title="facebook"><i class="zmdi zmdi-facebook"></i></a>
                        <a class="twitter" href="#" title="twitter"><i class="zmdi zmdi-twitter"></i></a>
                        <a class="instagram" href="#" title="instagram"><i class="zmdi zmdi-instagram"></i></a>
                        <a class="google" href="#" title="google"><i class="zmdi zmdi-google-glass"></i></a>
                    </div>
                    <div class="search">
                        <div class="search-form">
                            <form method="get" action="#">
                                <div class="search-select">
                                    Search Package
                                   <!-- <select class="category-search" name="orderby">
                                        <option value="">Select Category</option>
                                        <option value="Headphone">Headphone</option>
                                        <option value="Smart phone">Smart phone</option>
                                        <option value="game consoles">game consoles</option>
                                        <option value="Laptop">Laptop</option>
                                        <option value="televison">televison</option>
                                    </select>-->
                                </div>
                                <!-- End search Select -->
                                <input type="text" name="search" class="ajax_autosuggest_input ac_input" value="" placeholder="search tracking no. " autocomplete="off">
                                <button class="icon-search" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="menu-top menu-top-v2">
                        <ul class="nav-top">
                                <li class="level1"><a href="#" title="Home">Home</a></li>
                                <li class="level1"><a href="#" title="Track Package">Track</a></li>
                                <li class="level1 active"><a href="#" title="Pricing">Pricing</a></li>
                                <li class="level1 active"><a href="#" title="About">About Us</a></li>
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
                                <li class="level2"><a href="#">Links</a>
                                    <ul class="menu-level-2">
                                        <li class="level3"><a href="#" title="Home">Home</a></li>
                                        <li class="level3"><a href="#" title="Pricing">Pricing</a></li>
                                        <li class="level3"><a href="#" title="About Us">About Us</a></li>
                                        <li class="level3"><a href="#" title="Contact Us">Contact Us</a></li>
                                    </ul>
                                </li>
                                <li class="level2"><a href="#">ACtions</a>
                                    <ul class="menu-level-2">
                                        <li class="level3"><a href="#" title="Apple">Track a package</a></li>
                                        <li class="level3"><a href="#" title="Samsung">Create a shipment</a></li>
                                        <li class="level3"><a href="#" title="Sony">Change my delivery</a></li>
                                        <li class="level3"><a href="#" title="HTC">Schedule a pickup</a></li>
                                        <li class="level3"><a href="#" title="Xaomi">Calculate time & cost</a></li>
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
                <div class="search search-v2">
                    <div class="search-form">
                        <form method="get" action="#">
                            <div class="search-select dropdown">
                                Search Package
                               <!-- <i class="zmdi zmdi-chevron-down"></i>
                                <ul class="dropdown-menu">
                                    <li><a href="#" title="category1">category1</a></li>
                                    <li><a href="#" title="category2">category2</a></li>
                                    <li><a href="#" title="category3">category3</a></li>
                                </ul>-->
                            </div>
                            <!-- End search Select -->
                            <input type="text" name="search" class="ajax_autosuggest_input ac_input" value="" placeholder="search tracking no. " autocomplete="off">
                            <button class="icon-search" type="submit">
                                <i class="zmdi zmdi-search"></i>
                            </button>
                        </form>
                    </div>
                </div>
                </div>
                <!-- End container -->
            </div>
            <!-- End header-top -->
            <nav class="menu-mobile">
                <ul class="nav">
                    <li class="level1"><a href="#" title="Home">Home</a>
                        <ul class="menu-level-1">
                            <li class="level2"><a href="#" title="Home" target="_blank">Home</a></li>
                            <li class="level2"><a href="#" title="about us" target="_blank">about us</a></li>
                            <li class="level2"><a href="#" title="contatc us" target="_blank">contatc us</a></li>
                        </ul>
                    </li>
                    <li class="level1"><a href="#" title="Track">Track</a>
                        <ul class="menu-level-1">
                            <li class="level2"><a href="#" title="Track" target="_blank">Track</a></li>
                        </ul>
                    </li>
                    <li class="level1"><a href="#" title="Pricing">Pricing</a>
                        <ul class="menu-level-1">
                            <li class="level2"><a href="#" title="Pricing" target="_blank">Pricing</a></li>
                        </ul>
                    </li>
                    <!--<li class="level1"><a href="#" title="Headphone">Headphone</a>
                        <ul class="menu-level-1">
                            <li class="level2"><a href="#" title="Home 1" target="_blank">Headphone 1</a></li>
                            <li class="level2"><a href="#" title="Home 2" target="_blank">Headphone 2</a></li>
                            <li class="level2"><a href="#" title="Home 3" target="_blank">Headphone 3</a></li>
                            <li class="level2"><a href="#" title="Home 4" target="_blank">Headphone 4</a></li>
                        </ul>
                    </li>
                    <li class="level1">
                        <a href="#" title="Smart watch">Smart watch</a>
                        <ul class="menu-level-1">
                            <li class="level2">
                            <a href="#">Laptop</a>
                                <ul class="menu-level-2">
                                    <li class="level3"><a href="#" title="Apple">Apple</a></li>
                                    <li class="level3"><a href="#" title="Samsung">Samsung</a></li>
                                    <li class="level3"><a href="#" title="Sony">Sony</a></li>
                                    <li class="level3"><a href="#" title="HTC">HTC</a></li>
                                    <li class="level3"><a href="#" title="Xaomi">Xaomi</a></li>
                                    <li class="level3"><a href="#" title="LG">LG</a></li>
                                </ul>
                            </li>
                            <li class="level2">
                            <a href="#">Accessories</a>
                                <ul class="menu-level-2">
                                    <li class="level3"><a href="#" title="Submenu1">Submenu1</a></li>
                                    <li class="level3"><a href="#" title="Submenu2">Submenu2</a></li>
                                    <li class="level3"><a href="#" title="Submenu3">Submenu3</a></li>
                                    <li class="level3"><a href="#" title="Submenu4">Submenu4</a></li>
                                    <li class="level3"><a href="#" title="Submenu5">Submenu5</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>-->
                    <!--<li class="level1"><a href="#" title="Smart phone ">Smart phone </a></li>
                    <li class="level1"><a href="#">game consoles</a></li>
                    <li class="level1"><a href="#" title="Laptop">Laptop</a></li>
                    <li class="level1"><a href="#" title="televison">televison</a></li>-->
                </ul>
            </nav>
            <!-- End menu mobile -->
        </header><!-- /header -->

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
                                     data-x="180"
                                     data-y="380"
                                     data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                     data-speed="800"
                                     data-start="1600"
                                     data-easing="Power4.easeOut"
                                     data-endspeed="300"
                                     data-endeasing="Power1.easeIn"
                                     data-captionhidden="on"
                                     style="z-index: 9">Fast Shipping
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
                                     style="z-index: 7">Lorem Ipsum and typesetting industry.<br>189usd
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
                                     style="z-index: 8"><a href="#" title="Follow">Start Now</a>
                                </div>

                                <div class="tp-caption skewfromleft customout link-1 link-2 icons height-50"
                                     data-x="620"
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
                                     data-x="300"
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
                                     style="z-index: 9">Fast Shipping
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
                                     style="z-index: 7">Lorem Ipsum and typesetting industry.<br>189usd
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
                                     style="z-index: 8"><a href="#" title="Follow">Start Now</a>
                                </div>

                                <div class="tp-caption skewfromleft customout link-1 link-2 icons height-50"
                                     data-x="620"
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
                                     data-x="300"
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
                <div class="col-md-4 " data-wow-duration="0.5s" data-wow-delay="200ms">
                    <div class="item">
                        <div class="images">
                            <img src="{{ asset('frontend/assets/images/banner-home3-4.png') }}" alt="Banner">
                        </div>
                        <div class="text">
                            <h4>Number one</h4>
                            <h3>Shipping Co. </h3>
                            <p>Lorem Ipsum is here asdsad</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 " data-wow-duration="0.5s" data-wow-delay="300ms">
                    <div class="item">
                        <div class="images">
                            <img src="{{ asset('frontend/assets/images/banner-home3-5.png') }}" alt="Banner">
                        </div>
                        <div class="text">
                            <h3>consectetur adipiscing </h3>
                            <h3>Lorem </h3>
                            <p>seut <span>perspiis</span> </p>
                            <a class="link-v1" href="#" title="link"><span>Start now</span><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 " data-wow-duration="0.5s" data-wow-delay="400ms">
                    <div class="item">
                        <div class="images">
                            <img src="{{ asset('frontend/assets/images/banner-home3-6.png') }}" alt="Banner">
                        </div>
                        <div class="text">
                            <h3>24 Hours</h3>
                            <p>Lorem Ipsum consect adipiscing elit.</p>
                            <h4>Lorem <span>24</span></h4>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End container -->
        </div>

        <div class="shipping-total">
            <div class="container">
                <div class="col-md-6 coupon">
                    <div class="title-ver2">
                        <h3>Calculate Shipment</h3>
                    </div>
                    <div class="contact-form">
                        <form class="form-horizontal">
                            <div class="form-group col-md-6">
                                <select name="" class="form-control" id="" >
                                    <option >From</option>
                                    <option value="">Cairo</option>
                                    <option value="">Giza</option>
                                    <option value="">Alexandria</option>
                                </select>
<!--                                <input type="text" class="form-control" id="inputfname" placeholder="Enter your first name...">-->
                            </div>
                            <div class="form-group col-md-6">
                                <select name="" class="form-control" id="">
                                    <option >To</option>
                                    <option value="">Cairo</option>
                                    <option value="">Giza</option>
                                    <option value="">Alexandria</option>
                                </select>
<!--                                <input type="text" class="form-control" id="inputfname" placeholder="Enter your first name...">-->
                            </div>
                            <div class="form-group col-md-6">
                                <select name="" class="form-control" id="">
                                    <option >Unit</option>
                                    <option value="">Kg</option>
                                    <option value="">gm</option>
                                </select>
<!--                                <input type="text" class="form-control" id="inputfname" placeholder="Enter your first name...">-->
                            </div>
                            <div class="form-group col-md-6">
                                <input type="number" step="0.01" class="form-control" id="inputfname" placeholder="Value...">
                            </div>
                            <div class="form-group col-md-12">
                                <button value="Submit" class="btn link-button link-border-raidus" type="submit">Calculate</button>
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
                        <li><span class="text">Subtotal</span><span class="number"> 1990 EGP</span></li>
                        <li><span class="text">Tax</span><span class="number"> 50 EGP</span></li>
                        <li><span class="text totals">Total</span><span class="number totals"> 2040 EGP</span></li>
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

          <div class="main-content">
                <div class="featured-product slider-product space-padding-tb-80" data-wow-delay="0.1s">
                    <div class="container">
                        <div class="title-text size-64">
                            <h3><span>D</span>roplin services</h3>
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
                                    <p>voluptatem </p>
                                    <p class="title"> Lorem Ipsum</p>
                                    <ul>
                                        <li>Lorem ipsum dolor sit amet.</li>
                                        <li>incididunt ut labore, consectetur adipiscing elit</li>
                                        <li>Excepteur sint occaecat cupidatat.</li>
                                        <li>sed do eiusmod tempor incididunt ut labore et.</li>
                                        <li>non proident, sunt </li>
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
                                    <img class="primary_image" src="{{ asset('frontend/assets/images/Dana-home1-product-featured2.jpg') }}" alt="Product"/>
                                </a>
                                <div class="product-content">
                                    <p>accusantium </p>
                                    <p class="title"> Lorem Ipsum</p>
                                    <ul>
                                        <li>Lorem ipsum dolor sit amet.</li>
                                        <li>incididunt ut labore, consectetur adipiscing elit</li>
                                        <li>Excepteur sint occaecat cupidatat.</li>
                                        <li>sed do eiusmod tempor incididunt ut labore et.</li>
                                        <li>non proident, sunt </li>
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
                                    <p>doloremque </p>
                                    <p class="title"> Lorem Ipsum</p>
                                    <ul>
                                        <li>Lorem ipsum dolor sit amet.</li>
                                        <li>incididunt ut labore, consectetur adipiscing elit</li>
                                        <li>Excepteur sint occaecat cupidatat.</li>
                                        <li>sed do eiusmod tempor incididunt ut labore et.</li>
                                        <li>non proident, sunt </li>
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
                                    <p>laudantium</p>
                                    <p class="title"> Lorem Ipsum</p>
                                    <ul>
                                        <li>Lorem ipsum dolor sit amet.</li>
                                        <li>incididunt ut labore, consectetur adipiscing elit</li>
                                        <li>Excepteur sint occaecat cupidatat.</li>
                                        <li>sed do eiusmod tempor incididunt ut labore et.</li>
                                        <li>non proident, sunt </li>
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
                            <h3>quae ab illo inventore veritatis</h3>
                            <p>Lorem Ipsum is simply dummy text of the</p>
                            <div class="time" data-countdown="countdown" data-date="12-20-2016-10-20-30"></div>
                            <p class="best-price"><span>Start now:</span>100.00 EGP- <span class="price-old">240.00 EGP</span></p>
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

                                <div class="item active">
                                    <div class="row">
                                      <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="product-images">
                                            <div class="slide-product-images">
                                                <div class="items" data-thumb='<img class="primary_image" src="{{ asset('frontend/assets/images/Dana-home1-product-featured2.jpg') }}" alt=""/>'>
                                                    <a href="#" title="products">
                                                        <img class="primary_image" src="{{ asset('frontend/assets/images/Dana-home1-product-featured2.jpg') }}" alt=""/>
                                                    </a>
                                                </div>
                                                <div class="items" data-thumb='<img class="primary_image" src="{{ asset('frontend/assets/images/Dana-home1-product-featured3.jpg') }}" alt=""/>'>
                                                    <a href="#" title="products">
                                                        <img class="primary_image" src="{{ asset('frontend/assets/images/Dana-home1-product-featured3.jpg') }}" alt=""/>
                                                    </a>
                                                </div>
                                                <div class="items" data-thumb='<img class="primary_image" src="{{ asset('frontend/assets/images/Dana-home1-product-featured4.jpg') }}" alt=""/>'>
                                                    <a href="#" title="products">
                                                        <img class="primary_image" src="{{ asset('frontend/assets/images/Dana-home1-product-featured4.jpg') }}" alt=""/>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="title-text color-white">
                                                <h3><span>T</span>his week's hot deals</h3>
                                            </div>
                                            <p>Duis aute irure</p>
                                            <p><b>Sed ut perspiciatis unde omnis iste omnis iste</b></p>
                                            <ul>
                                                <li>sed do eiusmod tempor incididunt ut labore et dolore magna.</li>
                                                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit </li>
                                                <li>Duis aute irure dolor in reprehenderit  </li>
                                                <li>Sed ut perspiciatis unde omnis iste </li>
                                            </ul>
                                            <p class="wrap-price">Start <span class="price">Now </span></p>
                                        </div>
                                    </div>
                                    <!--/row-fluid-->
                                </div>
                                <!--/item-->
                                <div class="item">
                                    <div class="row">
                                      <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="product-images">
                                            <div class="slide-product-images">
                                                <div class="items" data-thumb='<img class="primary_image" src="{{ asset('frontend/assets/images/Dana-home1-product-featured4.jpg') }}" alt=""/>'>
                                                    <a href="#" title="products">
                                                        <img class="primary_image" src="{{ asset('frontend/assets/images/Dana-home1-product-featured4.jpg') }}" alt=""/>
                                                    </a>
                                                </div>
                                                <div class="items" data-thumb='<img class="primary_image" src="{{ asset('frontend/assets/images/Dana-home1-product-featured2.jpg') }}" alt=""/>'>
                                                    <a href="#" title="products">
                                                        <img class="primary_image" src="{{ asset('frontend/assets/images/Dana-home1-product-featured2.jpg') }}" alt=""/>
                                                    </a>
                                                </div>
                                                <div class="items" data-thumb='<img class="primary_image" src="{{ asset('frontend/assets/images/Dana-home1-product-featured3.jpg') }}" alt=""/>'>
                                                    <a href="#" title="products">
                                                        <img class="primary_image" src="{{ asset('frontend/assets/images/Dana-home1-product-featured3.jpg') }}" alt=""/>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="title-text color-white">
                                                <h3><span>T</span>his week's hot deals</h3>
                                            </div>
                                            <p>Duis aute irure</p>
                                            <p><b>Sed ut perspiciatis unde omnis iste omnis iste</b></p>
                                            <ul>
                                                <li>sed do eiusmod tempor incididunt ut labore et dolore magna.</li>
                                                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit </li>
                                                <li>Duis aute irure dolor in reprehenderit  </li>
                                                <li>Sed ut perspiciatis unde omnis iste </li>
                                            </ul>
                                            <p class="wrap-price">Start <span class="price">Now </span></p>
                                        </div>
                                    </div>
                                    <!--/row-fluid-->
                                </div>
                                <!--/item-->
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
                <div class="slider-brand">
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
          <div class="newsletter">
              <div class="container">
                <h3><a href="#" title="sign up">sign up</a> to newsletter</h3>
                <p>and receive a coupon for first shipping</p>
                    <form action="#" method="get" accept-charset="utf-8">
                        <input type="text" onblur="if (this.value == '') {this.value = 'Enter your email';}" onfocus="if(this.value != '') {this.value = '';}" value="Enter your emaill" class="input-text required-entry validate-email" title="Sign up for our newsletter" id="newsletter" name="email">
                        <button class="button button1" title="Subscribe" type="submit"></button>
                    </form>
              </div>
              <!-- End container -->
          </div>
          <!-- End newsletter -->
          <footer id="footer">
              <div class="container">
                <div class="row footer-top">
                    <div class="col-md-5">
                        <a class="logo" href="#" title="logo"><img src="{{ asset('frontend/assets/images/Dana-menu-logo.png') }}" alt="Logo"></a>
                        <p class="italic">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.</p>
                        <div class="infomation">
                            <p><i class="zmdi zmdi-pin"></i>Misr Al gadeda, Cairo, Egypt</p>
                            <p><i class="zmdi zmdi-phone"></i>+(20) 10 4568 7895</p>
                            <p><i class="zmdi zmdi-email"></i>info@droplin.com</p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <h3>Quick link</h3>
                        <ul class="menu">
                            <li><a href="#" title="Headphone">Home</a></li>
                            <li><a href="#" title="Smart watch">Track Order</a></li>
                            <li><a href="#" title="Smartphone">Calculate Shipping</a></li>
                            <li><a href="#" title="Blog">Blog</a></li>
                            <li><a href="#" title="Service">Service</a></li>
                            <li><a href="#" title="Contact us">Contact us</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h3>Customer care</h3>
                        <ul class="menu">
                            <li><a href="#" title="My account">My account</a></li>
                            <li><a href="#" title="Returns/ Exchage">Returns/ Exchage</a></li>
                            <li><a href="#" title="FAQS">FAQS</a></li>
                            <li><a href="#" title="Product support">Customer support</a></li>
                        </ul>
                    </div>
                </div>
                </div>
                <div class="footer-bottom">
                    <div class="container">
                    <div class="col-md-8">
                         <p>&copy; COPYRIGHT 2021 </p>
                         <a href="#" title="facebook"><i class="zmdi zmdi-facebook"></i></a>
                         <a href="#" title="google"><i class="zmdi zmdi-google-plus"></i></a>
                         <a href="#" title="instagram"><i class="zmdi zmdi-instagram"></i></a>
                         <a href="#" title="twitter"><i class="zmdi zmdi-twitter"></i></a>
                    </div>
                    <div class="col-md-4">
                        <a href="#" title="Payment"><img src="{{ asset('frontend/assets/images/Hermes-footer-payment.png') }}" alt="payment"></a>
                    </div>
                </div>
              </div>
              <!-- End container -->
          </footer>
        <script type="text/javascript" src="{{ asset('frontend/assets/js/jquery-1.11.1.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('frontend/assets/js/jquery.themepunch.revolution.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('frontend/assets/js/jquery.themepunch.plugins.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('frontend/assets/js/engo-plugins.js') }}"></script>
        <script type="text/javascript" src="{{ asset('frontend/assets/js/wow.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('frontend/assets/js/store.js') }}"></script>
    </body>
</html>

