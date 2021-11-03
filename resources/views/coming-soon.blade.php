<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="">
        <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <!-- Title -->
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Styles -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="{{ asset('errors/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('errors/assets/plugins/font-awesome/css/all.min.css') }}" rel="stylesheet">

        <!-- Theme Styles -->
        <link href="{{ asset('errors/assets/css/lime.min.css') }}" rel="stylesheet">
        <link href="{{ asset('errors/assets/css/themes/admin2.css') }}" rel="stylesheet">
        <link href="{{ asset('errors/assets/css/custom.css') }}" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js') }}"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js') }}"></script>
        <![endif]-->
    </head>
    <body class=" error-page coming-soon">
        <div class='loader'>
            <div class='spinner-grow text-primary' role='status'>
                <span class='sr-only'>Loading...</span>
            </div>

        </div>
        <div class="container">
            <div class="error-container">
                <div class="error-info">
                    <h1>Under<br>Construction</h1>
                    <p>This page is being coded.<br>Try visiting later, we are working to make it live as fast as possible.</p>
                </div>
                <div class="error-image"></div>
            </div>
        </div>


        <!-- Javascripts -->
        <script src="{{ asset('errors/assets/plugins/jquery/jquery-3.1.0.min.js') }}"></script>
        <script src="{{ asset('errors/assets/plugins/bootstrap/popper.min.js') }}"></script>
        <script src="{{ asset('errors/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('errors/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
        <script src="{{ asset('errors/assets/js/lime.min.js') }}"></script>
    </body>
</html>
