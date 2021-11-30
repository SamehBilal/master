<footer id="footer">
    <div class="container">
        <div class="row footer-top">
            <div class="col-md-5">
                <a class="logo" href="{{ route('website.index') }}" title="logo"><img src="{{ asset('frontend/assets/images/Dana-menu-logo.png') }}" alt="Logo"></a>
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
                    <li><a href="{{ route('website.index') }}" title="Home">Home</a></li>
                    <li><a href="{{ route('website.track') }}" title="Track Shipment">Track Shipment</a></li>
                    <li><a href="{{ route('website.calculation') }}" title="Calculate Shipping">Calculate Shipping</a></li>
                    <li><a href="{{ route('website.about-us') }}" title="About Us">About Us</a></li>
                    <li><a href="{{ route('website.pricing') }}" title="Pricing">Pricing</a></li>
                    <li><a href="{{ route('website.contact-us') }}" title="Contact us">Contact Us</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h3>Customer care</h3>
                <ul class="menu">
                    <li><a href="{{ route('website.account') }}" title="My account">My account</a></li>
                    <li><a href="{{ route('website.locations') }}" title="Locations">Locations</a></li>
                    <li><a href="{{ route('website.help') }}" title="Help & Support">Help & Support</a></li>
                    <li><a href="{{ route('website.terms') }}" title="Terms and Conditions">Terms and Conditions</a></li>
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
           {{-- <div class="col-md-4">
                <a href="#" title="Payment"><img src="{{ asset('frontend/assets/images/Hermes-footer-payment.png') }}" alt="payment"></a>
            </div>--}}
        </div>
    </div>
    <!-- End container -->
</footer>
