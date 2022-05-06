<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>World Cup Site - Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/scss/style.css">
    <script src="/javascript/javascript.js"></script>
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
                <a class="navbar-brand" href="./index.html">World Cup</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item pt-2">
                            <a class="nav-link" href="./signin.html">
                                <i class="fa fa-bell"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <div class="nav-link dropdown">
                                <button class="btn ps-0 dropdown-toggle" type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <img class="me-2" src="{{ asset(Auth()->user()->image ?? 'dash-assets/images/user.jpg') }}" style="height: 22px;width: 22px;"
                                        alt="">
                                    {{Auth()->user()->first_name}} {{Auth()->user()->last_name}}
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="#">View Profile</a></li>
                                    <li><a class="dropdown-item" href="#">Edit Profile</a></li>
                                    <li>
                                    <a href="javascript:void(0);" class="dropdown-item"
                                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                            <i class="fas fa-sign-out-alt"></i> Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>
                                    </li>    
                                </ul>
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
                <a href="#" class="links">Dashboard</a>
                <a href="#" class="links">Participant Management</a>
                <a href="#" class="links">Entry Management</a>
                <a href="#" class="links">Match Management</a>
                @can('tournament_access')
                <a href="{{url('admin/tournament')}}" class="links">Tournaments</a>
                @endcan
                @can('team_access')
                <a href="{{url('admin/team')}}" class="links">Teams</a>
                @endcan
                <a href="{{url('chat')}}" class="links">Messages</a>
                @can('user_access')
                <a href="/admin/users" class="links">Users</a>
                @endcan
                @can('role_access')
                <a href="/admin/roles" class="links">Roles</a>
                @endcan
                @can('permission_access')
                <a href="/admin/permissions" class="links">Permissions</a>
                @endcan
            </div>
            <div></div>
            <div class="w-100 px-0 py-4 p-md-4" id="v-pills-dashboard">
                @yield('content')
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/javascript/charts.js"></script>
    @yield('script')
</body>

</html>