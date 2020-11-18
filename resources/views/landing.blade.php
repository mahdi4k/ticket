<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> سامانه تیکت -@yield('page')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font.css') }}" rel="stylesheet">

</head>
<body>
<div class="container-fluid landing py-5">
    <div>
        <div class="row justify-content-center align-items-center">
            <a href="#" class="col-md-3 mb-4">
                <div class="landing-sections">
                    <img class="img-fluid" src="{{url('img/blur.png')}}" alt="">
                    <h3 class="py-4 my-2"> بخش کارگروه</h3>
                </div>
            </a>
            <a href="#" class="col-md-3 mb-4">
                <div class="landing-sections">
                    <img class="img-fluid" src="{{url('img/blur.png')}}" alt="">
                    <h3 class="py-4 my-2"> بخش پویش</h3>
                </div>
            </a>
        </div>
        <div class="row justify-content-center align-items-center">
            <a href="#"  class="col-md-3">
                <div class="landing-sections">
                    <img class="img-fluid" src="{{url('img/blur.png')}}" alt="">
                    <h3 class="py-4 my-2"> بخش تیکت</h3>
                </div>
            </a>
            <a href="#" class="col-md-3">
                <div class="landing-sections">
                    <img class="img-fluid" src="{{url('img/blur.png')}}" alt="">
                    <h3 class="py-4 my-2"> بخش مسئولیت</h3>
                </div>
            </a>
        </div>
    </div>
</div>

</body>
</html>
