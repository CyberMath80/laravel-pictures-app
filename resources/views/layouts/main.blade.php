<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
        <meta name="description" content="{{ $description ?? '' }}">
        <meta name="keywords" content="CyberMath, Dev, PHP, Laravel, App, Album, Download, Téléchargement, Photo, Picture, Libre, Free, Belgium, Belgique">
        <meta name="author" content="CyberMath">
        <title>{{ $title }}</title>
        <!-- General CSS Files -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <!-- CSS Libraries -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ mix('css/all.css') }}">
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
                        <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#"><i class="fas fa-ellipsis-v"></i></a>
                        <ul class="navbar-nav">
@foreach(App\Models\Category::popular() as $category)
                            <li class="nav-item active"><a href="{{ route('category.photos', [$category->slug]) }}" class="nav-link">{{ ucfirst($category->name) }}</a></li>
@endforeach
                        </ul>
                    </div>
                    <form class="form-inline ml-auto" action="{{ route('search') }}" method="get">
                        <div class="search-element">
                            <input value="{{ request()->query('search', '') }}" class="form-control" name="search" type="search" placeholder="Rechercher" aria-label="Search" data-width="250">
                            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                        </div>
                    </form>
@auth
                    <ul class="navbar-nav navbar-right">
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
                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                {{--<img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">--}}
                                <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }}</div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                {{--<div class="dropdown-title">Logged in 5 min ago</div>--}}
                                <a href="{{ route('albums.create') }}" class="dropdown-item has-icon"><i class="fas fa-plus-circle"></i> Créer album</a>
                                <a href="{{ route('albums.index') }}" class="dropdown-item has-icon"><i class="fas fa-images"></i> Mes albums</a>
                                <a href="features-settings.html" class="dropdown-item has-icon"><i class="fas fa-cog"></i> Settings</a>
                                <div class="dropdown-divider"></div>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf @php echo "\n"; @endphp
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
@forelse(App\Models\Tag::popular() as $tag)
                            <li class="nav-item"><a href="{{ route('tag.photos', [$tag->slug]) }}" class="nav-link"><span>{{ ucfirst($tag->name) }}</span></a></li>
@empty
@endforelse
                        </ul>
                    </div>
                </nav>
                <!-- Main Content -->
@yield('content')
                <footer class="main-footer">
                    <div class="footer-left">
                        Copyright &copy; @php echo date('Y')."\n"; @endphp
                        <div class="bullet"></div> PicHoaster
                    </div>
                    <div class="footer-right">
                        PicHoaster By <a rel="nofollow noopener noreferrer" href="https://cybermath.dev">CyberMath</a>
                    </div>
                </footer>
            </div>
        </div>
        <script src="{{ mix('js/app.js') }}"></script>
        <!-- General JS Scripts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
        <!-- Template JS File -->
        <script src="{{ mix('js/all.js') }}"></script>
    </body>
</html>
