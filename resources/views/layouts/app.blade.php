<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title> @yield('title', 'dashboard')</title>
  @include('template.head')
  @stack('css')
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>

        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="{{asset('assets/img/avatar/avatar-1.png')}}" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">{{ Auth::user()->name}}</div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="{{ url('profile')}}" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
                  
              {{-- <div class="dropdown-divider"></div> --}}
              <form method="POST" action="{{ route('logout') }}">
                @csrf
              <a href="{{ route('logout')}}" onclick="event.preventDefault();
              this.closest('form').submit()" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
              </form>
            </div>
          </li>
        </ul>
      </nav>
      @include('template.sidebar')

      @yield('content')

@include('template.script')
@stack('js')
</body>
</html>
