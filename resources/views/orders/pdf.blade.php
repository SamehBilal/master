<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- App CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
    <div class="container text-center">
        <div class="row {{--border border-dark--}} " {{--style="border-radius: 5px"--}}>
            <div class="col-4">
                <img src="{{ asset('backend/images/985px-Laravel.svg.png') }}"
                    class="img-thumbnail" width="100px" alt="Avatar">
            </div>
            <div class="col-4">
                <div>
                    {!! DNS1D::getBarcodeHTML($order->tracking_no , 'C128') !!}<br>
                    {{ $order->tracking_no }}
                </div>
            </div>
            <div class="col-4">
                <div>{!! $qr; !!}</div>
            </div>
        </div>
        <div class="row">
            <div class="col-6 row" >
                <div class="col-6 border border-dark" style="border-radius: 5px">
                    <h2>COD</h2>
                </div>
                <div class="col-6 border border-dark" style="border-radius: 5px">
                    <h1>{{ $order->cash_on_delivery }}</h1>
                </div>
            </div>
            <div class="col-6 row" >
                <div class="col-12 border border-dark" style="border-radius: 5px">
                    <h2>{{ $order->type }}</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6 row" >
                <div class="col-6 border border-dark" style="border-radius: 5px">
                    <h2>{{ $order->no_of_items ? $order->no_of_items:0 }}</h2>
                </div>
                <div class="col-6 border border-dark" style="border-radius: 5px">
                    <h3>عدد القطع</h3>
                </div>
                <div class="col-6 border border-dark" style="border-radius: 5px">
                    <h2>{{ $order->open_package == 1 ? 'نعم':'لا' }}</h2>
                </div>
                <div class="col-6 border border-dark" style="border-radius: 5px">
                    <h3>السماح بفتح الشحنة</h3>
                </div>
                <div class="col-12 border border-dark" style="border-radius: 5px">
                    <h3>وصف الشحنة</h3>
                </div>
                <div class="col-12 border border-dark" style="border-radius: 5px;height: 30vh">
                    <p> {{ $order->delivery_notes }} </p>
                </div>
            </div>
            <div class="col-6 row" >
                <div class="col-10 border border-dark" style="border-radius: 5px">
                    <h2>{{ $order->no_of_items ? $order->no_of_items:0 }}</h2>
                </div>
                <div class="col-2 border border-dark" style="border-radius: 5px">
                    <h3>من</h3>
                </div>
                <div class="col-10 border border-dark" style="border-radius: 5px">
                    <h2>{{ $order->customer->user->full_name }}</h2>
                </div>
                <div class="col-2 border border-dark" style="border-radius: 5px">
                    <h3>الى</h3>
                </div>
                <div class="col-10 border border-dark" style="border-radius: 5px">
                    <h2>{{ $order->customer->user->phone }}</h2>
                </div>
                <div class="col-2 border border-dark" style="border-radius: 5px">
                    <h3>تليفون</h3>
                </div>
                <div class="col-5 border border-dark" style="border-radius: 5px">
                    <h2>{{ $order->customer->user->phone }}</h2>
                </div>
                <div class="col-5 border border-dark" style="border-radius: 5px">
                    <h2></h2>
                </div>
                <div class="col-2 border border-dark" style="border-radius: 5px">
                    <h3>المدينة</h3>
                </div>

                <div class="col-10 border border-dark" style="border-radius: 5px">
                    <h2>{{ $order->customer->user->phone }}</h2>
                </div>
                <div class="col-2 border border-dark" style="border-radius: 5px">
                    <h3>المنطقة</h3>
                </div>

                <div class="col-10 border border-dark" style="border-radius: 5px">
                    <h2>{{ $order->customer->user->phone }}</h2>
                </div>
                <div class="col-2 border border-dark" style="border-radius: 5px">
                    <h3>العنوان</h3>
                </div>

                <div class="col-4 border border-dark" style="border-radius: 5px">
                    <h2>{{ $order->customer->user->phone }}</h2>
                </div>
                <div class="col-2 border border-dark" style="border-radius: 5px">
                    <h3>الشقة</h3>
                </div>

                <div class="col-4 border border-dark" style="border-radius: 5px">
                    <h2>{{ $order->customer->user->phone }}</h2>
                </div>
                <div class="col-2 border border-dark" style="border-radius: 5px">
                    <h3>الدور</h3>
                </div>
                <div class="col-12 border border-dark" style="border-radius: 5px">
                    <h3>ملاحظات</h3>
                </div>
                <div class="col-12 border border-dark" style="border-radius: 5px">
                    <p>{{ $order->delivery_notes }}</p>
                </div>

                <div class="col-3 border border-dark" style="border-radius: 5px">
                    <h2>{{ $order->customer->user->phone }}</h2>
                </div>
                <div class="col-3 border border-dark" style="border-radius: 5px">
                    <h5>Order REF</h5>
                </div>

                <div class="col-3 border border-dark" style="border-radius: 5px">
                    <small>{{ date("F j, Y", strtotime($order->created_at)) }}</small>
                </div>
                <div class="col-3 border border-dark" style="border-radius: 5px">
                    <h5>Created At</h5>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

