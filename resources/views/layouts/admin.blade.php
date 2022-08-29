<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Eshop') }}</title>

    

    
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

    <!--Dashboard CSS -->
    <link href="{{ asset('admin/css/material-dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/custom.css') }}" rel="stylesheet">

</head>
<body>
    <div class="wrapper">
        @include('layouts.include.sidebar')
    
        <div class="main-panel">
            @include('layouts.include.adminnav')
        
            <div class="content">
                @yield('content')
            </div>
            @include('layouts.include.adminfooter')
        </div>    
    </div>

   
    <!--   Core JS Files   -->
    <script src="{{ asset('admin/js/jquery.min.js') }}" defer></script>
    <script src="{{ asset('admin/js/popper.min.js') }}" defer></script>
    <script src="{{ asset('admin/js/bootstrap.min.js') }}" defer> </script>
    <script src="{{ asset('admin/js/perfect-scrollbar.min.js') }}" defer></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @if(session('status'))
    <script>
        swal("{{session('status')}}")
    </script>
    @endif
    @yield('scripts')
</body>
</html>
