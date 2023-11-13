<!DOCTYPE html>
<!-- saved from url=(0036)http://192.168.43.84:8000/index.html -->
<html class="text-dark"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>By4Event - @yield('Title','Home')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/css.css') }}">
    <link rel="stylesheet" href="{{ asset('css/css(1)') }}">
    <link rel="stylesheet" href="{{ asset('css/css(2)') }}">
    <link rel="stylesheet" href="{{ asset('css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Article-List.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Footer-Clean.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Highlight-Clean.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pikaday.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Login-Form-Clean.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Registration-Form-with-Photo.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Simple-Slider.css') }}">
    @section('scripts')
    @show
</head>

<body>
    <nav class="navbar navbar-dark navbar-expand-lg fixed-top text-dark bg-dark portfolio-navbar gradient" style="color: var(--white);background: var(--cyan);">
        <div class="container"><img src="{{ asset('images/logo.jpeg') }}" width="50">
                <button data-toggle="collapse" class="navbar-toggler" data-target="#navbarNav"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarNav" style="color: var(--gray-dark);background: var(--gray-dark);"><small class="form-text text-muted">.</small>
                @include('layouts/navbar')
        </div>
    </nav>
    <main class="page lanidng-page">
        <section class="portfolio-block block-intro">
    	@yield('content')
        </section>
    </main>
    
    @include('layouts/footer')

    <script src="{{ asset('js/jquery-3.5.1.min.js.download') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js.download') }}"></script>
    <script src="{{ asset('js/pikaday.min.js.download') }}"></script>
    <script src="{{ asset('js/swiper.jquery.min.js.download') }}"></script>
    <script src="{{ asset('js/Simple-Slider.js.download') }}"></script>
    <script src="{{ asset('js/theme.js.download') }}"></script>
    <script id="bs-live-reload" data-sseport="52667" data-lastchange="1619200717447" src="{{ asset('js/Home - Brand_files/livereload.js.download') }}"></script>


</body>
</html>