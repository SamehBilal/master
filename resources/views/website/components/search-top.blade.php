<div class="header-top">
    <div class="container">
        <div class="inner-container">
            <p class="icon-menu-mobile"><span class="icon-bar"></span></p>
            <div class="logo logo_ar"><a href="{{ route('website.index') }}" title="Dana-Logo"><img src="{{ asset('frontend/assets/images/Dana-menu-logo.png') }}" alt="Dana-Logo"></a></div>
            <div class="search">
                <div class="search-form">
                    <form action="{{ route('website.search') }}" method="GET">
                        <div class="search-select">
                            {{ __('content.Search a package') }}
                        </div>
                        <!-- End search Select -->
                        <input type="text" autocomplete="off" placeholder="{{ __('content.tracking No') }}" value="@isset($_GET['s']) {{ $_GET['s'] }} @endisset" class="ajax_autosuggest_input ac_input" name="s">
                        <button type="submit" class="icon-search">
                            <i class="zmdi zmdi-search"></i>
                        </button>
                    </form>
                </div>
            </div>
            <!-- End search -->
        </div>
        <!-- End inner container -->
    </div>
    <!-- End container -->
</div>
<!-- End header-top -->
