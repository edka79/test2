<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>{{ config('app.name', 'Laravel') }}</title>    
        <meta name="csrf-token" content="{{ csrf_token() }}">    
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

        <script>
            window.Laravel = @php echo json_encode(['api_token' => (Auth::user())->api_token]); @endphp
        </script>
    </head>
    <body>

        @yield('content')

        <form id="logout-form" action="/logout" method="POST" class="d-none">
            @csrf
        </form>

        <!-- Scripts -->
        <script src="{{ asset('js/menu.js') }}" defer></script>
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </body>
</html>
