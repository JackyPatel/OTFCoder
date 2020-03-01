<!DOCTYPE html>
<html>
    <head>

        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon.png') }}">
        <link rel="manifest" href="/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ env('APP_NAME') }}</title>
        <!-- CSS-->
        {{ Html::style('theme/plugins/bootstrap/css/bootstrap.min.css') }}
        {{ Html::style('theme/css/main.css') }}
        {{ Html::style('theme/css/skin/green-w.css') }}
        {{ Html::style('css/style.css') }}
        {{ Html::style('theme/plugins/font-awesome/css/font-awesome.min.css') }}
        {{ Html::style('css/ionicons.min.css') }}
        {{ Html::style('theme/toster/toster.min.css') }}
        @yield('style');
    </head>
    <body class="sidebar-mini fixed">
        <div class="wrapper">
            <!-- Navbar-->
            @include('layouts.header')
            <!-- Side-Nav-->
            @include('layouts.sidebar')
            <div class="content-wrapper">
                @yield('content')
            </div>
        </div>
        <!-- Javascripts-->
        {{ Html::script('js/jquery.min.js') }}
        <script type="text/javascript">
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
        </script>
        {{ Html::script('theme/js/bootstrap.min.js') }}
        {{ Html::script('js/main.js') }}
        {{ Html::script('theme/toster/toster.min.js') }}
        
        @yield('script')
    </body>
</html>