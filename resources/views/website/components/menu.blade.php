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
