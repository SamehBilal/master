<nav class="menu-mobile">
    <ul class="nav">
        <li class="level1"><a href="{{ route('website.index') }}" title="{{ __('content.Home') }}">{{ __('content.Home') }}</a></li>
        <li class="level1"><a href="{{ route('website.pricing') }}" title="{{ __('content.Pricing') }}">{{ __('content.Pricing') }}</a></li>
        <li class="level1">
            <a href="#" title="{{ __('content.Tracking') }}">{{ __('content.Tracking') }}</a>
            <ul class="menu-level-1">
                <li class="level2">
                    <a href="#">{{ __('content.Specification') }}</a>
                    <ul class="menu-level-2">
                        <li class="level3"><a href="{{ route('website.search') }}" title="{{ __('content.Search a package') }}">{{ __('content.Search a package') }}</a></li>
{{--
                        <li class="level3"><a href="{{ route('website.calculation') }}" title="{{ __('content.Calculate time & cost') }}">{{ __('content.Calculate time & cost') }}</a></li>
--}}
                        <li class="level3"><a href="{{ route('dashboard.orders.create') }}" title="{{ __('content.Create a shipment') }}">{{ __('content.Create a shipment') }}</a></li>
                        <li class="level3"><a href="{{ route('dashboard.orders.index') }}" title="{{ __('content.Change my delivery') }}">{{ __('content.Change my delivery') }}</a></li>
                        <li class="level3"><a href="{{ route('dashboard.pickups.create') }}" title="{{ __('content.Schedule a pickup') }}">{{ __('content.Schedule a pickup') }}</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li class="level1"><a href="{{ route('website.about-us') }}" title="{{ __('content.About-us') }}">{{ __('content.About-us') }}</a></li>
        <li class="level1"><a href="{{ route('website.contact-us') }}" title="{{ __('content.Contact-us') }}">{{ __('content.Contact-us') }}</a></li>
    </ul>
</nav>
<!-- End menu  mobile -->
