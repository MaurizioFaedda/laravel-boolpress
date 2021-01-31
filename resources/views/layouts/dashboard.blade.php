<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Icon -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md bg-wp shadow-sm sticky-top">
            <div class="container-fluid p-0">
                <div class="rounded-circle d-flex align-items-center justify-content-center">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        B
                    </a>
                </div>
                <a class="navbar-brand pl-2" href="{{ url('/') }}">
                    Boolpress
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">

                            <li class="nav-item d-flex align-items-center">
                                <a href="{{route('admin.index')}}">My Dashboard</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Hello, {{ Auth::user()->name }}
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
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid">
            <div class="row">
                <nav id="my-sidebar" class="col-md-2 d-none d-md-block">
                    <div class="sidebar-sticky">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('admin.index') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                            </li>
                        </ul>
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('admin.posts.index') }}"><i class="fas fa-thumbtack"></i> Posts</a>
                            </li>
                        </ul>
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('admin.categories.index') }}"><i class="fas fa-th-list"></i> Categories</a>
                            </li>
                        </ul>
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('admin.tags.index') }}"><i class="fas fa-tags"></i> Tags</a>
                            </li>
                        </ul>
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link active" href=""><i class="fas fa-icons"></i> Media</a>
                            </li>
                        </ul>
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link active" href=""><i class="fas fa-clone"></i> Pages</a>
                            </li>
                        </ul>
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link active" href=""><i class="fas fa-comment-alt"></i> Comments</a>
                            </li>
                        </ul>
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link active" href=""><i class="fas fa-file-contract"></i> WPForms</a>
                            </li>
                        </ul>
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link active" href=""><i class="fas fa-brush"></i> Appearance</a>
                            </li>
                        </ul>
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link active" href=""><i class="fas fa-plug"></i> Plugins</a>
                            </li>
                        </ul>
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link active" href=""><i class="fas fa-user"></i> Users</a>
                            </li>
                        </ul>
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link active" href=""><i class="fas fa-wrench"></i> Tools</a>
                            </li>
                        </ul>
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link active" href=""><i class="fas fa-sliders-h"></i> Settings</a>
                            </li>
                        </ul>
                </nav>
                <main class="col-md-10 ml-sm-auto col-lg-10 p-0">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>
</body>
</html>
