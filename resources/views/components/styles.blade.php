@php $locale = session()->get('locale'); @endphp

<link rel="shortcut icon" href="{{ asset('frontend/assets/images/favicon.png') }}"/>

<link href="https://fonts.googleapis.com/css?family=Lato:400,700%7CRoboto:400,500%7CExo+2:600&display=swap"
      rel="stylesheet">

<!-- include summernote css/js -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.css" rel="stylesheet">

<!-- Datatables -->
<link type="text/css"
      href="{{ asset('backend/vendor/datatables/datatables.min.css') }}"
      rel="stylesheet">

<!-- Preloader -->
<link type="text/css"
      href="{{ asset('backend/vendor/spinkit.css') }}"
      rel="stylesheet">

<!-- Perfect Scrollbar -->
<link type="text/css"
      href="{{ asset('backend/vendor/perfect-scrollbar.css') }}"
      rel="stylesheet">

<!-- Material Design Icons -->
<link type="text/css"
      href="{{ asset('backend/css/material-icons.css') }}"
      rel="stylesheet">

<!-- Font Awesome Icons -->
<link type="text/css"
      href="{{ asset('backend/css/fontawesome.css') }}"
      rel="stylesheet">

<!-- Preloader -->
<link type="text/css"
      href="{{ asset('backend/css/preloader.css') }}"
      rel="stylesheet">

<!-- App CSS -->
<link type="text/css"
      href="{{ asset('backend/css/app.css') }}"
      rel="stylesheet">

<!-- Flatpickr -->
<link type="text/css"
      href="{{ asset('backend/css/flatpickr.css') }}"
      rel="stylesheet">
<link type="text/css"
      href="{{ asset('backend/css/flatpickr-airbnb.css') }}"
      rel="stylesheet">

<!-- DateRangePicker -->
<link type="text/css"
      href="{{ asset('backend/vendor/daterangepicker.css') }}"
      rel="stylesheet">

<!-- Quill Theme -->
<link type="text/css"
      href="{{ asset('backend/css/quill.css') }}"
      rel="stylesheet">

<!-- Touchspin -->
<link type="text/css"
      href="{{ asset('backend/css/bootstrap-touchspin.css') }}"
      rel="stylesheet">

<!-- Select2 -->
<link type="text/css"
      href="{{ asset('backend/css/select2.css') }}"
      rel="stylesheet">
<link type="text/css"
      href="{{ asset('backend/vendor/select2/select2.min.css') }}"
      rel="stylesheet">

<!-- ion Range Slider -->
<link type="text/css"
      href="{{ asset('backend/css/ion-rangeslider.css') }}"
      rel="stylesheet">

<!-- Toastr -->
<link type="text/css"
      href="{{ asset('backend/vendor/toastr.min.css') }}"
      rel="stylesheet">
<link type="text/css"
      href="{{ asset('backend/css/toastr.css') }}"
      rel="stylesheet">

<!-- Dropzone -->
<link type="text/css"
      href="{{ asset('backend/css/dropzone.css') }}"
      rel="stylesheet">

<!-- Custom -->
<link type="text/css"
      href="{{ asset('backend/css/custom.css') }}"
      rel="stylesheet">

<!-- Custom -->
<link type="text/css"
      href="{{ asset('backend/css/sweetalert.css') }}"
      rel="stylesheet">

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.7.17/sweetalert2.min.css">

<style>
    @if($locale == 'ar')
    @import url(https://fonts.googleapis.com/css?family=Cairo);
    *,.sidebar-heading,.card-title,.table thead th,.page-separator__text,.form-label {
        font-family: "Cairo", serif;!important;

    }

    #DataTables_Table_0_info{
        position: absolute;
        left: 0!important;
    }
    @else
    #DataTables_Table_0_info{
        position: absolute;
        right: 0!important;
    }
    @endif
    .swal-modal .swal-text {
        text-align: center;
    }
</style>
