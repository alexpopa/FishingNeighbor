<!DOCTYPE html>
<html>
    <head>
        <title>Homepage
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- CSS are placed here -->
        {{ HTML::style('css/bootstrap/bootstrap.min.css') }}
        {{ HTML::style('css/bootstrap/bootstrap-theme.css') }}
        @yield('css')

    </head>

    <body>
    @yield('navbar')
        <!-- Container -->
        <div class="container">

            @yield('content')

        </div>

        <!-- Scripts are placed here -->
        {{ HTML::script('js/jquery.v2.1.1.min.js') }}
        {{ HTML::script('js/bootstrap.min.js') }}

    </body>
</html>

