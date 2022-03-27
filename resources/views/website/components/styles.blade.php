@php $locale = session()->get('locale'); @endphp
<link rel="shortcut icon" href="{{ asset('frontend/assets/images/favicon.png') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/bootstrap.css') }}"/>
@if($locale == 'ar')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/style_ar.css') }}"/>
@else
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/style.css') }}"/>
@endif
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/vendor/owl-slider.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/vendor/settings.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/vendor/animate.css') }}"/>

<style>
    @if($locale == 'ar')
    * {
        font-family: 'Cairo',Helvetica,Arial,Lucida,sans-serif;!important;
    }
    @else
    @endif
</style>
