@php
$media = media();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('style')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./scss/style.css">
    <script src="{{ asset('javascript/javascript.js') }}"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>

    <div class="navbar-for-desktop d-none d-lg-block">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="height: 65px; margin: 30px 0px;">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}"
                    style="font-size: 23px; font-weight: bold; margin-left:-65px;">
                    <img src="{{ asset('logo.jpeg') }}"
                        style="height: 115px;
                    width: 115px;
                    margin: -30px 0px;
                    border-radius: 50%;
                    border: 2px solid #43416f;"
                        alt="">
                    {{-- <span>Futebol Fanatics Platform</span>
                    <small class="powered-by">Powered by Renovato Bros Association</small> --}}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse  justify-content-center" id="navbarSupportedContent">
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link ps-0" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ps-0" href="{{ url('about-us') }}">About Us</a>
                        </li>
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="/matches">Matches</a>
                            </li>
                        @endauth
                        <li class="nav-item">
                            <a class="nav-link" href="/how-to-play">How To Play & Guidelines</a>
                        </li class="nav-item">
                        <li class="nav-item">
                            <a class="nav-link ps-0" href="{{ url('hall-of-fame') }}">Hall of Fame</a>
                        </li>
                        <li>
                            <a class="nav-link" href="/contact-us">Contact Us</a>
                        </li>
                        @auth
                            <li class="nav-item">
                                <a class="nav-link pe-0" href="/prediction">My Prediction</a>
                            </li>
                        @endauth
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="#">Organise League</a>
                        </li> --}}
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('home') }}">Dashboard</a>
                            </li>

                            <li class="nav-item">
                                <a href="javascript:void(0);" class="nav-link btn btn-success"
                                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn btn-success" href="{{ route('register') }}">Sign Up</a>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    {{-- <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link ps-0" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ps-0" href="{{url('about-us')}}">About Us</a>
                        </li>
                        @auth
                        <li class="nav-item">
                            <a class="nav-link" href="/matches">Matches</a>
                        </li>
                        @endauth
                        <li class="nav-item">
                            <a class="nav-link" href="/how-to-play">How To Play & Guidelines</a>
                        </li class="nav-item">
                        <li class="nav-item">
                            <a class="nav-link ps-0" href="{{url('hall-of-fame')}}">Hall of Fame</a>
                        </li>
                        <li>
                            <a class="nav-link" href="/contact-us">Contact Us</a>
                        </li>
                    </ul>
                    @auth
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link pe-0" href="/prediction">My Prediction</a>
                        </li>
                    </ul>
                    @endauth
                </div>
            </div>
        </nav> --}}
    </div>

    <div class="navbar-for-mobile d-blocke d-lg-none">
        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <span>Futebol Fanatics Platform</span>
                    <small class="powered-by">Powered by Renovato Bros Association</small>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Ranking</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/matches">Matches</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/how-to-play">How To Play & Guidlines</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="/prediction">My Prediction</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#">Organise League</a>
                <div class="d-flex">
                    <a class="nav-link text-white" href="/login">Login</a>
                    <a class="nav-link btn btn-primary text-white" href="/register">Sign Up</a>
                </div>
            </div>
        </nav>
    </div>
    @yield('content')

    <div class="footer-sec">
        <div class="container py-5">
            <hr>
            <div class="row">
                <div class="col-sm-4">
                    <p>Copyright © @php
                        use Carbon\Carbon;
                        echo Carbon::now()->format('Y');
                    @endphp Futebol Fanatics Platform. All rights reserved.</p>
                    @foreach ($media as $item)
                        <a href="{{ $item->link ?? '' }}" title="{{ $item->name ?? '' }}" class="me-2"><i
                                class="{{ $item->icon ?? '' }} fa-2x"></i></a>
                    @endforeach
                    {{-- <a href="#" class="me-2"><i class="fa fa-youtube fa-2x"></i></a>
                    <a href="#" class="me-2"><i class="fa fa-twitter fa-2x"></i></a>
                    <a href="#" class="me-2"><i class="fa fa-facebook fa-2x"></i></a>
                    <a href="#" class="me-2"><i class="fa fa-linkedin fa-2x"></i></a> --}}
                </div>
                <div class="col-sm-4">
                    <a href="/about-us">About Us</a> <br>
                    <a href="/how-to-play">How To Play & Guidelines</a><br>
                    <a href="/hall-of-fame">Hall of Fame</a> <br>
                    <a href="/contact-us">Contact Us</a>
                </div>
                <div class="col-sm-4">
                    <div class="text-start text-lg-end">
                        <a href="#" class="me-2">Privacy Policy</a>
                        <a href="{{ url('term-condition') }}">Terms & Conditions</a>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <script type="text/javascript" src="{{ asset('assets/js/jquery.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    @yield('script')
</body>

</html>
