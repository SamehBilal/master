@php $locale = session()->get('locale');
$info = \App\Models\About::find(1); @endphp
<footer id="footer">
    <div class="container">
        <div class="row footer-top" >
            @if($locale == 'ar')
                <div class="col-md-3">
                    <h3>{{ __('content.Customer Care') }}</h3>
                    <ul class="menu">
                        <li><a href="{{ route('website.account') }}" title="{{ __('content.my_account') }}">{{ __('content.my_account') }}</a></li>
                        <li><a href="{{ route('website.locations') }}" title="{{ __('content.locations') }}">{{ __('content.locations') }}</a></li>
                        <li><a href="{{ route('website.terms') }}" title="{{ __('content.Terms and Conditions') }}">{{ __('content.Terms and Conditions') }}</a></li>
                        <li><a href="{{ route('website.privacy') }}" title="{{ __('content.Privacy') }}">{{ __('content.Privacy') }}</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h3>{{ __('content.Quick link') }}</h3>
                    <ul class="menu">
                        <li><a href="{{ route('website.search') }}" title="{{ __('content.Search a package') }}">{{ __('content.Search a package') }}</a></li>
                        <li><a href="{{ route('website.index') }}" title="{{ __('content.Home') }}">{{ __('content.Home') }}</a></li>
                        {{--<li><a href="{{ route('website.calculation') }}" title="{{ __('content.Calculate time & cost') }}">{{ __('content.Calculate time & cost') }}</a></li>--}}
                        <li><a href="{{ route('website.about-us') }}" title="{{ __('content.About-us') }}">{{ __('content.About-us') }}</a></li>
                        <li><a href="{{ route('website.pricing') }}" title="{{ __('content.Pricing') }}">{{ __('content.Pricing') }}</a></li>
                        <li><a href="{{ route('website.contact-us') }}" title="{{ __('content.Contact-us') }}">{{ __('content.Contact-us') }}</a></li>
                        @auth
                            <li><a href="{{ route('dashboard') }}" title="{{ __('dashboard.Dashboard') }}">{{ __('dashboard.Dashboard') }}</a></li>
                        @else
                        @endauth
                    </ul>
                </div>
                <div class="col-md-5">
                    <a class="logo" href="{{ route('website.index') }}" title="logo"><img src="{{ asset('frontend/assets/images/Dana-menu-logo.png') }}" alt="Logo"></a>
                    <p class="italic">{{ $info ? $info->ar_footer_description:__('content.mission') }}</p>
                    <div class="infomation">
                        <p class="open-sans"><i class="zmdi zmdi-pin"></i>Misr Al gadeda, Cairo, Egypt</p>
                        <p class="open-sans"><i class="zmdi zmdi-phone"></i>+(20) 10 4568 7895</p>
                        <p class="open-sans"><i class="zmdi zmdi-email"></i>info@droplin.com</p>
                    </div>
                </div>
            @else
                <div class="col-md-5">
                    <a class="logo" href="{{ route('website.index') }}" title="logo"><img src="{{ asset('frontend/assets/images/Dana-menu-logo.png') }}" alt="Logo"></a>
                    <p class="italic">{{ $info ? $info->en_footer_description:__('content.mission') }}</p>
                    <div class="infomation">
                        <p><i class="zmdi zmdi-pin "></i>Misr Al gadeda, Cairo, Egypt</p>
                        <p><i class="zmdi zmdi-phone"></i>+(20) 10 4568 7895</p>
                        <p><i class="zmdi zmdi-email"></i>info@droplin.com</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <h3>{{ __('content.Quick link') }}</h3>
                    <ul class="menu">
                        <li><a href="{{ route('website.index') }}" title="{{ __('content.Home') }}">{{ __('content.Home') }}</a></li>
                        <li><a href="{{ route('website.search') }}" title="{{ __('content.Search a package') }}">{{ __('content.Search a package') }}</a></li>
                        {{--<li><a href="{{ route('website.calculation') }}" title="{{ __('content.Calculate time & cost') }}">{{ __('content.Calculate time & cost') }}</a></li>--}}
                        <li><a href="{{ route('website.about-us') }}" title="{{ __('content.About-us') }}">{{ __('content.About-us') }}</a></li>
                        <li><a href="{{ route('website.pricing') }}" title="{{ __('content.Pricing') }}">{{ __('content.Pricing') }}</a></li>
                        <li><a href="{{ route('website.contact-us') }}" title="{{ __('content.Contact-us') }}">{{ __('content.Contact-us') }}</a></li>
                        @auth
                            <li><a href="{{ route('dashboard') }}" title="{{ __('dashboard.Dashboard') }}">{{ __('dashboard.Dashboard') }}</a></li>
                        @else
                        @endauth
                    </ul>
                </div>
                <div class="col-md-3">
                    <h3>{{ __('content.Customer Care') }}</h3>
                    <ul class="menu">
                        <li><a href="{{ route('website.account') }}" title="{{ __('content.my_account') }}">{{ __('content.my_account') }}</a></li>
                        <li><a href="{{ route('website.locations') }}" title="{{ __('content.locations') }}">{{ __('content.locations') }}</a></li>
                        <li><a href="{{ route('website.terms') }}" title="{{ __('content.Terms and Conditions') }}">{{ __('content.Terms and Conditions') }}</a></li>
                        <li><a href="{{ route('website.privacy') }}" title="{{ __('content.Privacy') }}">{{ __('content.Privacy') }}</a></li>
                    </ul>
                </div>
            @endif
        </div>
    </div>
    <div class="footer-bottom" dir="ltr">
        <div class="container">
            <div class="col-md-8">
                <p class="open-sans">&copy; COPYRIGHT 2021 </p>
                <a href="#" title="facebook"><i class="zmdi zmdi-facebook"></i></a>
                <a href="#" title="google"><i class="zmdi zmdi-google-plus"></i></a>
                <a href="#" title="instagram"><i class="zmdi zmdi-instagram"></i></a>
                <a href="#" title="twitter"><i class="zmdi zmdi-twitter"></i></a>
            </div>
           {{-- <div class="col-md-4">
                <a href="#" title="Payment"><img src="{{ asset('frontend/assets/images/Hermes-footer-payment.png') }}" alt="payment"></a>
            </div>--}}
        </div>
    </div>
    <!-- End container -->
</footer>
