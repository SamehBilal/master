<nav class="menu-mobile">
    <ul class="nav">
        <li class="level1"><a href="{{ route('website.index') }}" title="Home">Home</a></li>
        <li class="level1"><a href="{{ route('website.pricing') }}" title="Pricing">Pricing</a></li>
        <li class="level1">
            <a href="#" title="Packages">Packages</a>
            <ul class="menu-level-1">
                <li class="level2">
                    <a href="#">Actions</a>
                    <ul class="menu-level-2">
                        <li class="level3"><a href="{{ route('website.search') }}" title="Search a package">Search a package</a></li>
                        <li class="level3"><a href="{{ route('website.calculation') }}" title="Calculate time & cost">Calculate time & cost</a></li>
                        <li class="level3"><a href="{{ route('dashboard.orders.create') }}" title="Create a shipment">Create a shipment</a></li>
                        <li class="level3"><a href="{{ route('dashboard.orders.index') }}" title="Change my delivery">Change my delivery</a></li>
                        <li class="level3"><a href="{{ route('dashboard.pickups.create') }}" title="Schedule a pickup">Schedule a pickup</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li class="level1"><a href="{{ route('website.about-us') }}" title="About Us">About Us</a></li>
        <li class="level1"><a href="{{ route('website.contact-us') }}" title="Contact Us">Contact Us</a></li>
    </ul>
</nav>
<!-- End menu  mobile -->
