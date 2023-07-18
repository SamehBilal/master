<!DOCTYPE html>
<html lang="en"
      dir="ltr">

<head>
    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible"
          content="IE=edge">

    <meta name="viewport"
          content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Prevent from appearing in search engines -->
    <meta name="robots"
          content="noindex">

    <title>Order</title>
    <link rel="shortcut icon" href="{{ asset('frontend/assets/images/favicon.png') }}"/>


    <link href="https://fonts.googleapis.com/css?family=Lato:400,700%7CRoboto:400,500%7CExo+2:600&display=swap"
          rel="stylesheet">

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

    <style>
        @import url(https://fonts.googleapis.com/css?family=Cairo);
        *,.sidebar-heading,.card-title,.table thead th,.page-separator__text,.form-label {
            font-family: "Cairo", serif;!important;

        }
    </style>
</head>

<body class="layout-app ">

<div class="preloader">
    <div class="sk-grid">
        <div class="sk-grid-cube"></div>
        <div class="sk-grid-cube"></div>
        <div class="sk-grid-cube"></div>
        <div class="sk-grid-cube"></div>
        <div class="sk-grid-cube"></div>
        <div class="sk-grid-cube"></div>
        <div class="sk-grid-cube"></div>
        <div class="sk-grid-cube"></div>
        <div class="sk-grid-cube"></div>
    </div>

{{--<div class="sk-bounce">
<div class="sk-bounce-dot"></div>
<div class="sk-bounce-dot"></div>
</div>--}}

<!-- More spinner examples at https://github.com/tobiasahlin/SpinKit/blob/master/examples.html -->
</div>


<!-- Header Layout -->
<div class="mdk-header-layout js-mdk-header-layout">


    <!-- Header Layout Content -->
    <div class="mdk-header-layout__content">

        <div class="mdk-drawer-layout js-mdk-drawer-layout"
             data-push
             data-responsive-width="992px">
            <div class="mdk-drawer-layout__content page">
                <br><br><br><br>
                <div class="{{--container-fluid--}} page__container">

                    <div class="row">
                        <div class="col-md-10 offset-md-1">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-3">{!! $qr; !!} <button class="btn pull-right btn-outline-secondary pull-right" onclick="window.print()" style="position: absolute;right: 1em" >Print</button></div>
                                    <div class="px-3">
                                        <div class="d-flex justify-content-center flex-column text-center my-5 navbar-light">
                                            <a href="#"
                                               class="navbar-brand d-flex flex-column m-0"
                                               style="min-width: 0">
                                                <img src="{{ asset('backend/images/illustration/student/128/black.png') }}"
                                                     class="navbar-brand-icon mb-2"
                                                     alt="logo"
                                                     width="50"/>

                                                <span>Airway Bell</span>
                                            </a>
                                            <div class="text-muted">Airway Bell {{ $order->tracking_no }}</div>
                                        </div>
                                        <div class="row card-group-row mb-lg-8pt">
                                            <div class="col-lg-4 card-group-row__col">

                                                <div class="card card-group-row__card d-flex flex-column">
                                                    <div class="row no-gutters flex">
                                                        <div class="col-lg-6 col-sm-4">
                                                            <div class="card-body text-center">
                                                                <div class="h2 mb-0 ">COD</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-sm-4 border-left">
                                                            <div class="card-body text-center">
                                                                <div class="h2 mb-0">{{ $order->cash_on_delivery }}</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-lg-8 card-group-row__col">

                                                <div class="card card-group-row__card d-flex flex-column">
                                                    <div class="row no-gutters flex">
                                                        <div class="col-lg-12 col-sm-4">
                                                            <div class="card-body text-center">
                                                                <div class="h2 mb-0">{{ $order->type }}</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="row card-group-row mb-lg-8pt">
                                            <div class="col-lg-4 card-group-row__col">

                                                <div class="card card-group-row__card d-flex flex-column">
                                                    <div class="row no-gutters flex">
                                                        <div class="col-lg-6 col-sm-4">
                                                            <div class="card-body">
                                                                <div class="d-flex flex-column text-center">
                                                                    <strong>{{ $order->no_of_items > 1 ? $order->no_of_items:1  }}</strong>
                                                                </div>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="d-flex flex-column text-center">
                                                                    <strong>{{ $order->open_package == 1 ? 'نعم':'لا' }}</strong>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-sm-4 border-left">
                                                            <div class="card-body">
                                                                <div class="d-flex flex-column text-center">
                                                                    <strong style="font-weight: bold">عدد القطع</strong>
                                                                </div>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="d-flex flex-column text-center">
                                                                    <strong style="font-weight: bold">السماح بفتح الشحنة</strong>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-sm-4 border-top">
                                                            <div class="card-body">
                                                                <div class="d-flex flex-column text-center">
                                                                    <strong style="font-weight: bold">وصف الشحنة</strong>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-sm-4 border-top">
                                                            <div class="card-body">
                                                                <div class="d-flex flex-column text-center">
                                                                    <strong>{{ $order->package_description }}</strong>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-lg-8 card-group-row__col">

                                                <div class="card card-group-row__card d-flex flex-column">
                                                    <div class="row no-gutters flex">
                                                        <div class="col-lg-9 col-sm-4 border-bottom">
                                                            <div class="card-body">
                                                                <div class="d-flex flex-column text-center">
                                                                    <strong>{{ $order->business->full_name }}</strong>
                                                                </div>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="d-flex flex-column text-center">
                                                                    <strong>{{ $order->client->full_name }}</strong>
                                                                </div>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="d-flex flex-column text-center">
                                                                    <strong>0{{ $order->client->phone }}</strong>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-sm-4 border-left border-bottom">
                                                            <div class="card-body">
                                                                <div class="d-flex flex-column text-center">
                                                                    <strong style="font-weight: bold">من</strong>
                                                                </div>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="d-flex flex-column text-center">
                                                                    <strong style="font-weight: bold">إلى</strong>
                                                                </div>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="d-flex flex-column text-center">
                                                                    <strong style="font-weight: bold">تليفون</strong>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-sm-4  border-bottom">
                                                            <div class="card-body">
                                                                <div class="d-flex flex-column text-center">
                                                                    <strong>{{ $order->location->name }}</strong>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-sm-4 border-left border-bottom">
                                                            <div class="card-body">
                                                                <div class="d-flex flex-column text-center">
                                                                    <strong>{{ $order->location->state->name }}</strong>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-sm-4 border-left border-bottom">
                                                            <div class="card-body">
                                                                <div class="d-flex flex-column text-center">
                                                                    <strong style="font-weight: bold">المدينة</strong>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-9 col-sm-4 border-bottom">
                                                            <div class="card-body">
                                                                <div class="d-flex flex-column text-center">
                                                                    <strong>{{ $order->location->city->name }}</strong>
                                                                </div>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="d-flex flex-column text-center">
                                                                    <strong>{{ $order->location->apartment.', '.$order->location->building.', '.$order->location->street }}</strong>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-sm-4 border-left border-bottom">
                                                            <div class="card-body">
                                                                <div class="d-flex flex-column text-center">
                                                                    <strong style="font-weight: bold">المنطقة</strong>
                                                                </div>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="d-flex flex-column text-center">
                                                                    <strong style="font-weight: bold">العنوان</strong>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-sm-4">
                                                            <div class="card-body">
                                                                <div class="d-flex flex-column text-center">
                                                                    <strong>{{ $order->location->apartment }}</strong>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-sm-4 border-left">
                                                            <div class="card-body">
                                                                <div class="d-flex flex-column text-center">
                                                                    <strong style="font-weight: bold">الشقة</strong>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-sm-4 border-left">
                                                            <div class="card-body">
                                                                <div class="d-flex flex-column text-center">
                                                                    <strong>{{ $order->location->floor }}</strong>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-sm-4 border-left">
                                                            <div class="card-body">
                                                                <div class="d-flex flex-column text-center">
                                                                    <strong style="font-weight: bold">الدور</strong>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-sm-4 border-top">
                                                            <div class="card-body">
                                                                <div class="d-flex flex-column text-center">
                                                                    <strong style="font-weight: bold">الملاحظات</strong>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-sm-4 border-top">
                                                            <div class="card-body">
                                                                <div class="d-flex flex-column text-center">
                                                                    <strong>{{ $order->delivery_notes }}</strong>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="row card-group-row mb-lg-8pt">
                                            <div class="col-lg-4 card-group-row__col">

                                                <div class="card card-group-row__card d-flex flex-column">
                                                    <div class="row no-gutters flex">
                                                        <div class="col-lg-6 col-sm-4">
                                                            <div class="card-body">
                                                                <div class="d-flex flex-column text-center">
                                                                    <strong style="font-weight: bold">Order REF</strong>
                                                                </div>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="d-flex flex-column text-center">
                                                                    <strong>{{ $order->order_reference }}</strong>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-sm-4 border-left">
                                                            <div class="card-body">
                                                                <div class="d-flex flex-column text-center">
                                                                    <strong style="font-weight: bold">Created At</strong>
                                                                </div>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="d-flex flex-column text-center">
                                                                    <strong>{{ $order->created_at }}</strong>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-lg-8 card-group-row__col">

                                                <div class="card card-group-row__card d-flex flex-column">
                                                    <div class="row no-gutters flex">
                                                        <div class="col-lg-8 col-sm-4">
                                                            <div class="card-body">
                                                                <div class="d-flex flex-column text-center">
                                                                    <strong>{{ $order->pickup?->location->city->name }}</strong>
                                                                </div>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="d-flex flex-column text-center">
                                                                    <strong>{{ $order->pickup?->location->state->name }}</strong>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2 col-sm-4 border-left">
                                                            <div class="card-body">
                                                                <div class="d-flex flex-column text-center">
                                                                    <strong style="font-weight: bold">المدينة</strong>
                                                                </div>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="d-flex flex-column text-center">
                                                                    <strong style="font-weight: bold">المنطقة</strong>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2 col-sm-4 border-left">
                                                            <div class="card-body">
                                                                <div class="d-flex flex-column text-center">
                                                                    <strong style="font-weight: bold">عنوان المرتجع</strong>
                                                                </div>
                                                            </div>
                                                           {{-- <div class="card-body">
                                                                <div class="d-flex flex-column text-center">
                                                                    <strong></strong>
                                                                </div>
                                                            </div>--}}
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="mb-3">{!! DNS1D::getBarcodeHTML($order->tracking_no, 'C128') !!} <h5 class="text-spacing">{{ $order->tracking_no }}</h5></div>

                                        {{--<div class="text-label">Notes</div>--}}
                                        <p class="text-muted">{{ __('dashboard.We appreciate your business. Should you need us to add VAT or extra notes let us know!') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <!-- // END drawer-layout__content -->


        </div>
        <!-- // END drawer-layout -->

    </div>
    <!-- // END header-layout__content -->

</div>
<!-- // END header-layout -->

<!-- jQuery -->
<script src="{{ asset('backend/vendor/jquery.min.js') }}"></script>

<!-- Datatables -->
<script src="{{ asset('backend/vendor/datatables/datatables.min.js') }}"></script>

<!-- Bootstrap -->
<script src="{{ asset('backend/vendor/popper.min.js') }}"></script>
<script src="{{ asset('backend/vendor/bootstrap.min.js') }}"></script>

<!-- Perfect Scrollbar -->
<script src="{{ asset('backend/vendor/perfect-scrollbar.min.js') }}"></script>

<!-- DOM Factory -->
<script src="{{ asset('backend/vendor/dom-factory.js') }}"></script>

<!-- MDK -->
<script src="{{ asset('backend/vendor/material-design-kit.js') }}"></script>

<!-- App JS -->
<script src="{{ asset('backend/js/app.js') }}"></script>

<!-- Preloader -->
<script src="{{ asset('backend/js/preloader.js') }}"></script>

<!-- Global Settings -->
<script src="{{ asset('backend/js/settings.js') }}"></script>

<!-- Moment.js -->
<script src="{{ asset('backend/vendor/moment.min.js') }}"></script>
<script src="{{ asset('backend/vendor/moment-range.js') }}"></script>

<!-- Flatpickr -->
<script src="{{ asset('backend/vendor/flatpickr/flatpickr.min.js') }}"></script>
<script src="{{ asset('backend/js/flatpickr.js') }}"></script>

<!-- Chart.js -->
<script src="{{ asset('backend/vendor/Chart.min.js') }}"></script>
<script src="{{ asset('backend/js/chartjs.js') }}"></script>
<script src="{{ asset('backend/js/chartjs-rounded-bar.js') }}"></script>

<!-- Chart.js Samples -->
<script src="{{ asset('backend/js/page.ecommerce.js') }}"></script>

<!-- List.js -->
<script src="{{ asset('backend/vendor/list.min.js') }}"></script>
<script src="{{ asset('backend/js/list.js') }}"></script>

<!-- Touchspin -->
<script src="{{ asset('backend/vendor/jquery.bootstrap-touchspin.js') }}"></script>
<script src="{{ asset('backend/js/touchspin.js') }}"></script>

<!-- DateRangePicker -->
<script src="{{ asset('backend/vendor/moment.min.js') }}"></script>
<script src="{{ asset('backend/vendor/daterangepicker.js') }}"></script>
<script src="{{ asset('backend/js/daterangepicker.js') }}"></script>

<!-- jQuery Mask Plugin -->
<script src="{{ asset('backend/vendor/jquery.mask.min.js') }}"></script>

<!-- Quill -->
<script src="{{ asset('backend/vendor/quill.min.js') }}"></script>
<script src="{{ asset('backend/js/quill.js') }}"></script>

<!-- Select2 -->
<script src="{{ asset('backend/vendor/select2/select2.min.js') }}"></script>
<script src="{{ asset('backend/js/select2.js') }}"></script>

<!-- Tables -->
<script src="{{ asset('backend/js/toggle-check-all.js') }}"></script>
<script src="{{ asset('backend/js/check-selected-row.js') }}"></script>

<!-- Range Slider -->
<script src="{{ asset('backend/vendor/ion.rangeSlider.min.js') }}"></script>
<script src="{{ asset('backend/js/ion-rangeslider.js') }}"></script>

<!-- Dropzone -->
<script src="{{ asset('backend/vendor/dropzone.min.js') }}"></script>
<script src="{{ asset('backend/js/dropzone.js') }}"></script>

<!-- Highlight.js -->
<script src="{{ asset('backend/js/hljs.js') }}"></script>

<!-- custom -->
<script src="{{ asset('backend/js/custom.js') }}"></script>

</body>

</html>
