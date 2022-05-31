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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
    @yield('style')
</head>

<body>

    <div class="navbar-for-desktop ">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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
                                data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                    <img class="me-2"
                                        src="{{ asset(Auth()->user()->image ?? 'dash-assets/images/team1.jpg') }}"
                                        style="height: 22px;width: 22px;" alt="">
                                    {{ Auth()->user()->first_name }} {{ Auth()->user()->last_name }}
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <a class="dropdown-item" href="{{url('admin/profile')}}">View Profile</a>
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
            <div class="side-links-sec dropdown">
                {{-- <a href="{{url('dashboard')}}" class="links">Dashboard</a> --}}
                @can('participant_management_access')
                    <a href="{{ url('tournament') }}" class="links">Participant Management</a>
                    @endif
                    {{-- <a href="#" class="links">Entry Management</a> --}}
                    @can('participant_point_access')
                        <a href="{{ url('admin/participant_point') }}" class="links">Participant Management</a>
                    @endcan
                    @can('tournament_access')
                        <a href="{{ url('admin/tournament') }}" class="links">Tournament Management</a>
                    @endcan
                    @can('team_access')
                        <a href="{{ url('admin/team') }}" class="links">Teams</a>
                    @endcan

                    <a href="{{ url('chat') }}" class="links">Messages</a>
                    @can('user_access')
                        <a href="/admin/users" class="links">User Management</a>
                    @endcan
                    @can('role_access')
                        <a href="/admin/roles" class="links">Roles</a>
                    @endcan
                    @can('permission_access')
                        <a href="/admin/permissions" class="links">Permissions</a>
                    @endcan
                    @can('content_access')
                        <a href="{{ url('admin/content') }}" class="links">Website Content</a>
                    @endcan
                    @can('service_access')
                        <a href="{{ url('admin/service') }}" class="links">Services</a>
                    @endcan
                    @can('blog_access')
                        <a href="{{ url('admin/blog') }}" class="links">Blogs</a>
                    @endcan
                    @can('slider_access')
                        <a href="{{ url('admin/slider') }}" class="links">Slider</a>
                    @endcan
                    @can('contact_access')
                        <a href="{{ url('admin/contact') }}" class="links">Contact Form Inquiries</a>
                    @endcan
                    @can('media_access')
                        <a href="{{ url('admin/media') }}" class="links">Social Media</a>
                    @endcan
                    @can('newsletter_access')
                        <a href="{{ url('admin/newsletter') }}" class="links">Newsletter</a>
                    @endcan
                </div>
                <div></div>
                <div class="w-100 px-0 py-4 p-md-4" id="v-pills-dashboard">
                    @yield('content')
                </div>
            </div>
        </div>



        <script src="/dash-assets/js/jquery-3.4.1.min.js"></script>
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
    </body>

    </html>
