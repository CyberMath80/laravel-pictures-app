<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
        <meta name="description" content="{{ $description ?? '' }}">
        <title>{{ $title }}</title>

        <!-- General CSS Files -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

        <!-- CSS Libraries -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ mix('css/all.css') }}">

        <!-- Template CSS -->
        {{--<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">--}}
    </head>
    <body class="layout-3">
        <div id="app">
            <div class="main-wrapper container">
                <div class="navbar-bg"></div>
                <nav class="navbar navbar-expand-lg main-navbar">
                    <a href="{{ route('home') }}" class="navbar-brand sidebar-gone-hide">{{ config('app.name') }}</a>
                    <div class="navbar-nav">
                        <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
                    </div>
                    <div class="nav-collapse">
                        <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
                            <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <ul class="navbar-nav">
                            <li class="nav-item active"><a href="{{ route('home') }}" class="nav-link">Application</a></li>
                            <li class="nav-item"><a href="{{ route('home') }}" class="nav-link">Report Something</a></li>
                            <li class="nav-item"><a href="{{ route('home') }}" class="nav-link">Server Status</a></li>
                        </ul>
                    </div>
                    <form class="form-inline ml-auto">
                        <ul class="navbar-nav">
                            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
                        </ul>
                        <div class="search-element">
                            <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
                            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                            <div class="search-backdrop"></div>
                            <div class="search-result">
                                <div class="search-header">
                                    Histories
                                </div>
                                <div class="search-item">
                                    <a href="#">How to hack NASA using CSS</a>
                                    <a href="#" class="search-close"><i class="fas fa-times"></i></a>
                                </div>
                                <div class="search-item">
                                    <a href="#">Kodinger.com</a>
                                    <a href="#" class="search-close"><i class="fas fa-times"></i></a>
                                </div>
                                <div class="search-item">
                                    <a href="#">#Stisla</a>
                                    <a href="#" class="search-close"><i class="fas fa-times"></i></a>
                                </div>
                                <div class="search-header">
                                    Result
                                </div>
                                <div class="search-item">
                                    <a href="#">
                                        {{--<img class="mr-3 rounded" width="30" src="../assets/img/products/product-3-50.png" alt="product">--}}
                                        oPhone S9 Limited Edition
                                    </a>
                                </div>
                                <div class="search-item">
                                    <a href="#">
                                        {{--<img class="mr-3 rounded" width="30" src="../assets/img/products/product-2-50.png" alt="product">--}}
                                        Drone X2 New Gen-7
                                    </a>
                                </div>
                                <div class="search-item">
                                    <a href="#">
                                        {{--<img class="mr-3 rounded" width="30" src="../assets/img/products/product-1-50.png" alt="product">--}}
                                        Headphone Blitz
                                    </a>
                                </div>
                                <div class="search-header">
                                    Projects
                                </div>
                                <div class="search-item">
                                    <a href="#">
                                        <div class="search-icon bg-danger text-white mr-3">
                                            <i class="fas fa-code"></i>
                                        </div>
                                        Stisla Admin Template
                                    </a>
                                </div>
                                <div class="search-item">
                                    <a href="#">
                                        <div class="search-icon bg-primary text-white mr-3">
                                            <i class="fas fa-laptop"></i>
                                        </div>
                                        Create a new Homepage Design
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
@auth
                    <ul class="navbar-nav navbar-right">
                        {{--<li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle beep"><i class="far fa-envelope"></i></a>
                            <div class="dropdown-menu dropdown-list dropdown-menu-right">
                                <div class="dropdown-header">Messages
                                    <div class="float-right">
                                        <a href="#">Mark All As Read</a>
                                    </div>
                                </div>
                                <div class="dropdown-list-content dropdown-list-message">
                                    <a href="#" class="dropdown-item dropdown-item-unread">
                                        <div class="dropdown-item-avatar">
                                            <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle">
                                            <div class="is-online"></div>
                                        </div>
                                        <div class="dropdown-item-desc">
                                            <b>Kusnaedi</b>
                                            <p>Hello, Bro!</p>
                                            <div class="time">10 Hours Ago</div>
                                        </div>
                                    </a>
                                    <a href="#" class="dropdown-item dropdown-item-unread">
                                        <div class="dropdown-item-avatar">
                                            <img alt="image" src="../assets/img/avatar/avatar-2.png" class="rounded-circle">
                                        </div>
                                        <div class="dropdown-item-desc">
                                            <b>Dedik Sugiharto</b>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                                            <div class="time">12 Hours Ago</div>
                                        </div>
                                    </a>
                                    <a href="#" class="dropdown-item dropdown-item-unread">
                                        <div class="dropdown-item-avatar">
                                            <img alt="image" src="../assets/img/avatar/avatar-3.png" class="rounded-circle">
                                            <div class="is-online"></div>
                                        </div>
                                        <div class="dropdown-item-desc">
                                            <b>Agung Ardiansyah</b>
                                            <p>Sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                            <div class="time">12 Hours Ago</div>
                                        </div>
                                    </a>
                                    <a href="#" class="dropdown-item">
                                        <div class="dropdown-item-avatar">
                                            <img alt="image" src="../assets/img/avatar/avatar-4.png" class="rounded-circle">
                                        </div>
                                        <div class="dropdown-item-desc">
                                            <b>Ardian Rahardiansyah</b>
                                            <p>Duis aute irure dolor in reprehenderit in voluptate velit ess</p>
                                            <div class="time">16 Hours Ago</div>
                                        </div>
                                    </a>
                                    <a href="#" class="dropdown-item">
                                        <div class="dropdown-item-avatar">
                                            <img alt="image" src="../assets/img/avatar/avatar-5.png" class="rounded-circle">
                                        </div>
                                        <div class="dropdown-item-desc">
                                            <b>Alfa Zulkarnain</b>
                                            <p>Exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
                                            <div class="time">Yesterday</div>
                                        </div>
                                    </a>
                                </div>
                                <div class="dropdown-footer text-center">
                                    <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </li>--}}
@if(count(Auth::user()->unreadNotifications))
                        <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
                            <div class="dropdown-menu dropdown-list dropdown-menu-right">
                                <div class="dropdown-header">Notifications
                                    <div class="float-right">
                                        <a href="{{ route('notifications.read') }}">Marquer comme lues</a>
                                    </div>
                                </div>
                                <div class="dropdown-list-content dropdown-list-icons">
@foreach(Auth::user()->unreadNotifications as $notification)
                                    <a href="#" class="dropdown-item dropdown-item-unread">
                                        <div class="dropdown-item-icon text-white mt-2">
                                            <img style="border-radius:15%;" src="{{ $notification->data['photo']['thumbnail_url'] }}" alt="{{ ucfirst($notification->data['photo']['title']) }}">
                                        </div>
                                        <div class="dropdown-item-desc">
                                            {{ ucfirst($notification->data['photo']['title']) }} Downloaded by {{ ucfirst($notification->data['user']['name']) }}
                                            <div class="time text-primary">Le {{ $notification->created_at->isoFormat('LL') }}</div>
                                        </div>
                                    </a>
@endforeach
                                </div>
                                <div class="dropdown-footer text-center">
                                    <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </li>
@endif
                        <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                {{--<img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">--}}
                                <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }}</div></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                {{--<div class="dropdown-title">Logged in 5 min ago</div>--}}
                                <a href="{{ route('albums.create') }}" class="dropdown-item has-icon">
                                    <i class="far fa-user"></i> Créer album
                                </a>
                                <a href="{{ route('albums.index') }}" class="dropdown-item has-icon">
                                    <i class="fas fa-bolt"></i> Mes albums
                                </a>
                                <a href="features-settings.html" class="dropdown-item has-icon">
                                    <i class="fas fa-cog"></i> Settings
                                </a>
                                <div class="dropdown-divider"></div>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="btn btn-outline-danger w-50 float-right mr-2" type="submit" onclick="event.preventDefault(); this.closest('form').submit();"><i class="fas fa-sign-out-alt mt-2"></i> {{ __('Log Out') }}</button>
                                </form>
                            </div>
                        </li>
                    </ul>
@endauth
@guest
                    <ul class="navbar-nav navbar-right">
                        <li class="dropdown dropdown-list-toggle ml-3">
                            <a href="{{ route('login') }}" class="btn btn-success btn-lg dropdown-item has-icon" style="display:inline-block; width: 132px;">
                                <i class="fas fa-sign-in-alt" style="margin-top: .5px;"></i> Sign In
                            </a>
                        </li>
                        <li class="dropdown dropdown-list-toggle ml-3">
                            <a href="{{ route('register') }}" class="btn btn-success btn-lg dropdown-item has-icon" style="display:inline-block; width: 132px;">
                                <i class="fas fa-user-plus"></i> Sign Up
                            </a>
                        </li>
                    </ul>
@endguest

                </nav>

                <nav class="navbar navbar-secondary navbar-expand-lg">
                    <div class="container">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a href="index-0.html" class="nav-link">General Dashboard</a></li>
                                    <li class="nav-item"><a href="index.html" class="nav-link">Ecommerce Dashboard</a></li>
                                </ul>
                            </li>
                            <li class="nav-item active">
                                <a href="#" class="nav-link"><i class="far fa-heart"></i><span>Top Navigation</span></a>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="far fa-clone"></i><span>Multiple Dropdown</span></a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a href="#" class="nav-link">Not Dropdown Link</a></li>
                                    <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Hover Me</a>
                                        <ul class="dropdown-menu">
                                            <li class="nav-item"><a href="#" class="nav-link">Link</a></li>
                                            <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Link 2</a>
                                                <ul class="dropdown-menu">
                                                    <li class="nav-item"><a href="#" class="nav-link">Link</a></li>
                                                    <li class="nav-item"><a href="#" class="nav-link">Link</a></li>
                                                    <li class="nav-item"><a href="#" class="nav-link">Link</a></li>
                                                </ul>
                                            </li>
                                            <li class="nav-item"><a href="#" class="nav-link">Link 3</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- Main Content -->
                @yield('content')
                <footer class="main-footer">
                    <div class="footer-left">
                        Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
                    </div>
                    <div class="footer-right">
                        2.3.0
                    </div>
                </footer>
            </div>
        </div>

        <script src="{{ mix('js/app.js') }}"></script>
        <!-- General JS Scripts -->
        {{--<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>--}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
        {{--<script src="../assets/js/stisla.js"></script>--}}

        <!-- JS Libraies -->

        <!-- Page Specific JS File -->

        <!-- Template JS File -->
        {{--<script src="{{ asset('assets/js/scripts.js') }}"></script>
        <script src="{{ asset('assets/js/custom.js') }}"></script>--}}
        <script src="{{ mix('js/all.js') }}"></script>
    </body>
</html>
