<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    
    <!--Dashboard CSS -->
    <link href="{{ asset('frontend/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">
    <!--owl carousel  -->
    <link href="{{ asset('frontend/css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/owl.theme.default.min.css') }}" rel="stylesheet">
    <!-- jquery ui -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">


    <style>
        a{
            text-decoration: none !important;
            color: black !important;
        }
    </style>

</head>
<body>
    @include('layouts.include.frontnav')
    <div class="content">
        @yield('content')
    </div>
    <div class="whatsapp-chat">
        <a href=" https://wa.me/+61455594363?text=I'm%20interested%20in%20your%20website" target="_blank">
            <img src="{{asset('assets/images/whatsapp.png')}}" alt="" height="60px" width="60px">
        </a>
    </div>

   <!--   Core JS Files   -->
   <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.js') }}"></script>
    <script src="{{ asset('frontend/js/custom.js') }}"></script>
    <script src="{{ asset('frontend/js/checkout.js') }}"></script>
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/630c28ee54f06e12d8916f0e/1gbjo36q6';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
        })();
    </script>
    <!--End of Tawk.to Script-->

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    @if(session('status'))
    <script>
        swal("{{session('status')}}")
    </script>
    @endif
    <script>
        var availableTags = [];
        $.ajax({
            type: "GET",
            url: "/product-list",
            success: function (response) {
                startsearch(response);
                
            }
        });
        function startsearch(availableTags){
            $( "#search" ).autocomplete({
                source: availableTags
            });
        }
        
  </script>
    
    @yield('scripts')
</body>
</html>
