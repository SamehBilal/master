<!DOCTYPE html>
<html  lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('website.components.meta-tags')

        <title>{{ config('app.name', 'Droplin') }}</title>

        @include('website.components.styles')
    </head>
    <body>
        <header id="header" class="header-v1">
            @include('website.components.main-navigation')

            @include('website.components.menu')

            @include('website.components.menu-mobile')
        </header>

        @yield('content')

        @include('website.components.footer')

        @include('website.components.scripts')
    </body>
</html>

