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
