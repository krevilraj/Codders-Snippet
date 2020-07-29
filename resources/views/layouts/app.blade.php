<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">


  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/utilities.css') }}">

  <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

  <link rel="stylesheet" href="{{ asset('css/slick.min.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('css/vegas.min.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('css/featherlight.min.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('css/featherlight.gallery.min.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('css/fontawesome/all.min.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}" type="text/css">
  @livewireStyles
  @stack('styles')
</head>
<body>

<div class="site-container">

  <div id="top"></div>

  <!-- Mobile logo -->
  <a href="#" class="mobile-logo mobile-logo-light bg-primary">
    <span>Coders Snippet</span>
  </a>

  <!-- Navigation toggle -->
  <button type="button" id="navigation-toggle" class="nav-toggle nav-toggle-light bg-primary">
    <span></span>
  </button>

  <!-- Site header -->
  <header class="site-header bg-primary">
    <div class="header-inner">
      <div class="header-brand">
        <!-- Logo -->
        <a href="#" class="logo">
          <span>Coders Snippet</span>
          <span class="title-letter">C</span>
        </a>
      </div>
      <div class="nav-divider mb-5"></div>
      <nav class="site-nav">
        <ul id="navigation">
          <li>
            <a href="/">Home</a>
          </li>
          @if(!Auth::check())
            <li>
              <a href="/#about">About</a>
            </li>
            <li>
              <a href="/#services">Services</a>
            </li>
            <li>
              <a href="/#contact">Contact</a>
            </li>
            <li>
              <a href="/login">Login</a>
            </li>
          @else
            <li>
              <a href="{{route('user.dashboard')}}">Dashboard</a>
            </li>
            <li>
              <a href="#">Snippet</a>
              <ul class="menu-child">
                <li><a href="{{route('user.snippet.list')}}">All Snippet</a></li>
                <li><a href="{{route('user.snippet.store')}}">Add Snippet</a></li>
              </ul>
            </li>
            <li>
              <a href="{{route('user.category')}}">Category</a>
            </li>
            <li>
              <a href="{{route('user.template')}}">Instant Template</a>
            </li>
            <li>
              <a href="<?php echo e(route('logout')); ?>"
                 onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                <?php echo e(__('Logout')); ?>

              </a>

              <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
                @csrf
              </form>
            </li>
          @endif


        </ul>
      </nav>
      <div class="nav-divider my-5"></div>
      <nav>
        <ul class="list-inline text-center">
          <li class="list-inline-item">
            <a class="btn btn-sm btn-icon btn-outline-white btn-transparent rounded-circle" href="#">
              <span class="btn-icon-inner fab fa-facebook-f"></span>
            </a>
          </li>
          <li class="list-inline-item">
            <a class="btn btn-sm btn-icon btn-outline-white btn-transparent rounded-circle" href="#">
              <span class="btn-icon-inner fab fa-instagram"></span>
            </a>
          </li>
          <li class="list-inline-item">
            <a class="btn btn-sm btn-icon btn-outline-white btn-transparent rounded-circle" href="#">
              <span class="btn-icon-inner fab fa-twitter"></span>
            </a>
          </li>
          <li class="list-inline-item">
            <a class="btn btn-sm btn-icon btn-outline-white btn-transparent rounded-circle" href="#">
              <span class="btn-icon-inner fab fa-pinterest"></span>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </header>

  <!-- Header overlay -->
  <div class="header-overlay">
    <div class="overlay-inner bg-dark opacity-80"></div>
  </div>

  <!-- Back to top button -->
  <button type="button" id="backtotop" class="btn btn-primary btn-icon">
    <span class="btn-icon-inner fas fa-angle-up"></span>
  </button>

  <!-- Page wrapper -->
  <div class="page-wrapper">
    <div class="page-content">

    @yield('content')

    <!-- Site footer -->
      <footer class="site-footer bg-light">
        <div class="container">
          <nav class="mb-3">
            <ul class="list-inline text-center">
              <li class="list-inline-item">
                <a class="btn btn-sm btn-icon btn-outline-dark btn-transparent rounded-circle" href="#">
                  <span class="btn-icon-inner fab fa-facebook-f"></span>
                </a>
              </li>
              <li class="list-inline-item">
                <a class="btn btn-sm btn-icon btn-outline-dark btn-transparent rounded-circle" href="#">
                  <span class="btn-icon-inner fab fa-instagram"></span>
                </a>
              </li>
              <li class="list-inline-item">
                <a class="btn btn-sm btn-icon btn-outline-dark btn-transparent rounded-circle" href="#">
                  <span class="btn-icon-inner fab fa-twitter"></span>
                </a>
              </li>
              <li class="list-inline-item">
                <a class="btn btn-sm btn-icon btn-outline-dark btn-transparent rounded-circle" href="#">
                  <span class="btn-icon-inner fab fa-pinterest"></span>
                </a>
              </li>
            </ul>
          </nav>
          <p class="text-center">© 2019 Malat - All Rights Reserved</p>
        </div>
      </footer>

    </div><!--end .page-content -->
  </div><!-- end .page-wrapper -->

</div>
{{--<div id="app">
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
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
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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
</div>--}}

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/jquery.easing.min.js') }}"></script>
<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
{{--    <script src="assets/js/jquery.easing.min.js"></script>
<script src="assets/js/jquery.validate.min.js"></script>
<script src="assets/js/jquery.form.min.js"></script>
<script src="assets/js/imagesloaded.pkgd.min.js"></script>
<script src="assets/js/isotope.pkgd.min.js"></script>
<script src="assets/js/jquery.detect_swipe.min.js"></script>
<script src="assets/js/featherlight.min.js"></script>
<script src="assets/js/featherlight.gallery.min.js"></script>
<script src="assets/js/granim.min.js"></script>
<script src="assets/js/slick.min.js"></script>
<script src="assets/js/vegas.min.js"></script>
<script src="assets/js/typed.min.js"></script>

<script src="assets/js/main.js"></script>--}}
@livewireScripts
@stack('scripts')
</body>
</html>
