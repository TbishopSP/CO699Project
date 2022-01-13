<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Hospitality Search International</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css"
          integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <div><img src="/images/HSI-LOGO-NEW.png" alt="HSI Logo" style="max-height: 7rem;"></div>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    <li class="pr-3"><a href="/">Home</a></li>
                    <li class="pr-3"><a href="/admin">Admin Page</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Welcome {{ Auth::user()->firstname }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest

                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
</div>
<footer>
    <div class="footerTop">
        <div class="logo pl-4">
            <img src="/images/HSI-LOGO-WHITE.png" alt="HSI Logo" style="max-height: 7rem;">
        </div>
        <div class="contactUs pt-4 pb-4" style=" font-size: 10px;">
            <span>Hospitality Search International</span>
            <span>4th Floor, 86 - 90 Paul Street</span>
            <span>London</span>
            <span>EC2A 4NE</span>
            <span>United Kingdom</span>
        </div>
    </div>
    <div class="footerBtm">
        <div class="copyright">
            <span>&copy; Hospitality Search International 2021 | All rights reserved | TB Web Design
            </span>
        </div>
        <div class="socials">
            <div class="pr-3"><a
                    href="https://www.linkedin.com/company/hospitality-search-international/?trk=top_nav_home"
                    target="_blank" title="Follow us on LinkedIn"><i class="fab fa-2x fa-linkedin"></i></a></div>
            <div class="pr-3"><a href="https://www.facebook.com/HospitalitySearchInternational" target="_blank"
                                 title="Follow us on Facebook"><i class="fab fa-2x fa-facebook-square"></i></a></div>
            <div class="pr-3"><a href="https://www.instagram.com/HospitalitySearchInternational/" target="_blank"
                                 title="Instagram"><i class="fab fa-2x fa-instagram"></i></a></div>
        </div>
    </div>
</footer>
</body>
</html>
