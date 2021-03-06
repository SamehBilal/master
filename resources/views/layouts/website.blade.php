@php $locale = session()->get('locale'); @endphp
<!DOCTYPE html>
<html  lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ $locale == 'ar' ? 'rtl':'ltr' }}">
    <head>
        @include('website.components.meta-tags')

        <title>{{ config('app.name', 'Droplin') }}</title>

        @include('website.components.styles')

        @yield('extra-scripts')
    </head>
    <body >
        @yield('content')

        @include('website.components.newsletter')

        @include('website.components.footer')

        @include('website.components.scripts')
    </body>
</html>

