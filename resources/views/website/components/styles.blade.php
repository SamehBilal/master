@php $locale = session()->get('locale'); @endphp
<link rel="shortcut icon" href="{{ asset('frontend/assets/images/favicon.png') }}"/>
{{--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">--}}
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/bootstrap.css') }}"/>

@if($locale == 'ar')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/style_ar.css') }}"/>
@else
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/style.css') }}"/>
@endif
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/vendor/owl-slider.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/vendor/settings.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/vendor/animate.css') }}"/>
<!-- Material Design Icons -->
<link type="text/css"
      href="{{ asset('backend/css/material-icons.css') }}"
      rel="stylesheet">
<link href="http://fonts.cdnfonts.com/css/cairo" rel="stylesheet">
<style>
    @if($locale == 'ar')
    /** {
        font-family: "Cairo", serif;!important;

    }*/
    @else
    #header .header-top .logo{
        float: left;
    }
    @endif
</style>
