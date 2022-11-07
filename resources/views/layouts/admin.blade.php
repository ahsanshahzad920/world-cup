@php
$user = user();
$contact = contact();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>World Cup Site - Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/scss/style.css">
    <script src="{{ asset('javascript/javascript.js') }}"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <link rel='shortcut icon' type='image/x-icon' href="{{ asset('logo.jpg') }}" >
    @yield('style')
    <style>

    </style>
</head>

<body>

    <div class="navbar-for-desktop ">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{-- <span>Futebol Fanatics Platform</span>
                    <small class="powered-by">Powered by Renovato Bros Association</small> --}}
                    <img src="{{asset('logo.jpg')}}" style="height: 85px; width:85px; border-radius:50%;" alt="">
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
                            <li class="nav-item">
                                <a class="nav-link" href="/matches">Matches</a>
                            </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/how-to-play">How To Play & Guidelines</a>
                        </li class="nav-item">
                        <li class="nav-item">
                            <a class="nav-link ps-0" href="{{ url('hall-of-fame') }}">Hall of Fame</a>
                        </li>
                        <li>
                            <a class="nav-link" href="/contact-us">Contact Us</a>
                        </li>
                            <li class="nav-item">
                                <a class="nav-link pe-0" style="margin-left:15px;" href="/prediction">My Prediction</a>
                            </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="#">Organise League</a>
                        </li> --}}
                    </ul>
                </div>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <div class="dropdown">
                            <li class="nav-item pt-2">
                                <span class="dropdown-toggle nav-link" id="dropdownMenuButton" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-bell"></i>
                                </span>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a href="{{ url('admin/users') }}" class="dropdown-item">Register
                                        <b>{{ $user->count() ?? '0' }}</b> user's in 24 hours</a>
                                    <a class="dropdown-item"
                                        href="{{ url('admin/contact') }}"><b>{{ $contact->count() ?? '0' }}</b> new
                                        contact message's</a>
                                </div>
                            </li>
                        </div>

                        {{-- <li class="nav-item pt-2">
                            <a class="nav-link" href="#">
                                <i class="fa fa-bell"></i>
                            </a>
                        </li> --}}
                        <li class="nav-item">
                            <div class="nav-link drop down">
                                <button class="btn ps-0 dropdown-toggle" type="button" id="dropdownMenuButton1"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img class="me-2"
                                        src="{{ asset(Auth()->user()->image ?? 'avatar.jpeg') }}"
                                        style="height: 22px;width: 22px;" alt="">
                                    {{ Auth()->user()->first_name }} {{ Auth()->user()->last_name }}
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    @if (Auth()->user()->is_admin)
                                        <a class="dropdown-item" href="{{ url('admin/profile') }}">View Profile</a>
                                        <a class="dropdown-item" href="{{ url('change-password') }}">Change
                                            Password</a>
                                    @else
                                        <a class="dropdown-item" href="{{ url('profile') }}">View Profile</a>
                                        <a class="dropdown-item" href="{{ url('change-password') }}">Change
                                            Password</a>
                                    @endif
                                    {{-- <a class="dropdown-item" href="#">Edit Profile</a> --}}

                                    <a href="javascript:void(0);" class="dropdown-item"
                                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt"></i> Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <div class="admin-portal">
        <div class="d-flex flex-column flex-md-row align-items-start">
            <div class="side-links-sec dropdown" style="min-height:100vh !important;">
                {{-- <a href="{{url('dashboard')}}" class="links">Dashboard</a> --}}
                @can('participant_management_access')
                    <a href="{{ url('tournament') }}" @if (Request::is('tournament')) class="links active" @else class="links" @endif>Participant Management</a>
                    @endif
                    @can('user_prediction_access')
                    <a href="{{ url('first-entry') }}" @if (Request::is('first-entry')) class="links active" @else class="links" @endif>My Predictions-First Entry</a>
                    @endcan
                    @can('user_prediction_access')
                    <a href="{{ url('second-entry') }}" @if (Request::is('second-entry')) class="links active" @else class="links" @endif>My Predictions-Second Entry</a>
                    @endcan
                    
                    {{-- <a href="#" class="links">Entry Management</a> --}}
                    @can('participant_point_access')
                        <a href="{{ url('admin/participant_point') }}"  @if (Request::is('admin/participant_point')) class="links active" @else class="links" @endif>Participant Management</a>
                    @endcan
                    @can('prediction_access')
                    <a href="{{ url('admin/prediction') }}" @if (Request::is('admin/prediction')) class="links active" @else class="links" @endif>Predictions</a>
                    @endcan
                    @can('tournament_access')
                        <a href="{{ url('admin/tournament') }}"  @if (Request::is('admin/tournament')) class="links active" @else class="links" @endif>Tournament Management</a>
                    @endcan
                    @can('tournament_access')
                    <a href="{{ url('admin/participant-match') }}"  @if (Request::is('admin/participant-match')) class="links active" @else class="links" @endif>Participant Matches</a>
                    @endcan
                    @can('team_access')
                        <a href="{{ url('admin/team') }}"  @if (Request::is('admin/team')) class="links active" @else class="links" @endif>Teams</a>
                    @endcan
                    @can('all_ranking_access')
                    <a href="{{ url('all-ranking') }}"  @if (Request::is('all-ranking')) class="links active" @else class="links" @endif>All Rankings</a>
                    @endcan
                    {{-- <a href="{{ url('chat') }}"  @if (Request::is('chat')) class="links active" @else class="links" @endif>Messages</a> --}}
                    @can('user_access')
                        <a href="/admin/users"  @if (Request::is('admin/users')) class="links active" @else class="links" @endif>User Management</a>
                    @endcan
                    @can('role_access')
                        <a href="/admin/roles"  @if (Request::is('admin/roles')) class="links active" @else class="links" @endif>Roles</a>
                    @endcan
                    @can('permission_access')
                        <a href="/admin/permissions"  @if (Request::is('admin/permissions')) class="links active" @else class="links" @endif>Permissions</a>
                    @endcan
                    @can('content_access')
                        <a href="{{ url('admin/content') }}"  @if (Request::is('admin/content')) class="links active" @else class="links" @endif>Website Content</a>
                    @endcan
                    @can('service_access')
                        <a href="{{ url('admin/service') }}"  @if (Request::is('admin/service')) class="links active" @else class="links" @endif>Services</a>
                    @endcan
                    {{-- @can('blog_access')
                        <a href="{{ url('admin/blog') }}" class="links">Blogs</a>
                    @endcan --}}
                    @can('ranking_tournament_access')
                        <a href="{{ url('admin/ranking-tournament') }}"  @if (Request::is('admin/ranking-tournament')) class="links active" @else class="links" @endif>Ranking Tournaments</a>
                    @endcan
                    @can('ranking_points_access')
                        <a href="{{ url('admin/ranking-points') }}"  @if (Request::is('admin/ranking-points')) class="links active" @else class="links" @endif>Ranking Points</a>
                    @endcan
                    @can('slider_access')
                        <a href="{{ url('admin/slider') }}"  @if (Request::is('admin/slider')) class="links active" @else class="links" @endif>Slider</a>
                    @endcan
                    @can('guideline_access')
                        <a href="{{ url('admin/guideline') }}"  @if (Request::is('admin/guideline')) class="links active" @else class="links" @endif>Play & Guidelines</a>
                    @endcan
                    @can('contact_access')
                        <a href="{{ url('admin/contact') }}"  @if (Request::is('admin/contact')) class="links active" @else class="links" @endif>Contact Form Inquiries</a>
                    @endcan
                    @can('media_access')
                        <a href="{{ url('admin/media') }}"  @if (Request::is('admin/media')) class="links active" @else class="links" @endif>Social Media</a>
                    @endcan
                    @can('newsletter_access')
                        <a href="{{ url('admin/newsletter') }}"  @if (Request::is('admin/newsletter')) class="links active" @else class="links" @endif>Newsletter</a>
                    @endcan
                    @can('term_access')
                        <a href="{{ url('admin/term') }}"  @if (Request::is('admin/term')) class="links active" @else class="links" @endif>Terms and Conditions</a>
                    @endcan
                    @can('policy_access')
                        <a href="{{ url('admin/policy') }}"  @if (Request::is('admin/policy')) class="links active" @else class="links" @endif>Privacy Policy</a>
                    @endcan
                </div>
                <div></div>
                <div class="w-100 px-0 py-4 p-md-4" id="v-pills-dashboard">
                    @yield('content')
                </div>
            </div>
        </div>




        <script src="/dash-assets/js/jquery-ui.js"></script>
        <script src="/dash-assets/js/popper.min.js"></script>
        <script src="/dash-assets/js/bootstrap.min.js"></script>
        <script src="/dash-assets/js/owl.carousel.min.js"></script>
        <script src="/dash-assets/js/jquery.magnific-popup.min.js"></script>
        <script src="/dash-assets/js/isotope-3.0.6.min.js"></script>
        <script src="/dash-assets/js/chosen.min.js"></script>
        <script src="/dash-assets/js/moment.min.js"></script>
        <script src="/dash-assets/js/purecounter.js"></script>
        <script src="/dash-assets/js/main.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
        @yield('script')
        <script type="text/javascript">
            $(document).ready(function() {
                $('#summernote').summernote();
            });
        </script>
    </body>

    </html>
