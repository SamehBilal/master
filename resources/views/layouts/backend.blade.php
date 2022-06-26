<!DOCTYPE html>
@php $locale = session()->get('locale'); @endphp

<html lang="en"
      dir="{{ $locale == 'ar' ? 'rtl':'ltr' }}">

<head>
    @include('components.meta-tags')

    <title>@yield('title')</title>

    @include('components.styles')

    @yield('extra-styles')
</head>

<body class="layout-app ">

@include('components.preloader')

<!-- Drawer Layout -->

<div class="mdk-drawer-layout js-mdk-drawer-layout"
     data-push
     data-responsive-width="992px">
    <div class="mdk-drawer-layout__content page-content">

        <!-- Header -->

        <!-- Navbar -->

        @include('components.navbar')

        <!-- // END Navbar -->

        @include('components.alerts')
        <!-- // END Header -->

        @include('components.before_content')

        <!-- BEFORE Page Content -->

        <!-- // END BEFORE Page Content -->

        <!-- Page Content -->

        @yield('main_content')

        <!-- // END Page Content -->

        <!-- Footer -->

        @include('components.footer')

        <!-- // END Footer -->

    </div>

    <!-- // END drawer-layout__content -->

    <!-- Drawer -->

    @include('components.drawer')

    @include('components.right_drawer')

    <!-- // END Drawer -->

</div>

@include('components.intercom')

<!-- // END Drawer Layout -->

@include('components.scripts')

@yield('extra-scripts-alerts')

@yield('extra-scripts')

</body>

</html>
