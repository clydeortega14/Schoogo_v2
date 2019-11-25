<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Inksite | @yield('title') </title>

  <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="/assets/css/bootstrap.min.css" type="text/css">
  <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
  
  <link href="https://fonts.googleapis.com/css?family=Lobster|Lato&display=swap" rel="stylesheet">

</head>
<body>
  
    <nav class="navbar navbar-expand-sm navbar-dark box-shadow" id="mainNav">
      
      <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">Inksite Moto Print</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="collapsibleNavbar">
              <ul class="navbar-nav ml-auto">
                @guest
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('login') }}">{{ __('Sign In') }}</a>
                      </li>
                      @if (Route::has('register'))
                          <li class="nav-item">
                              <a class="nav-link" href="{{ route('register') }}">{{ __('Sign Up') }}</a>
                          </li>
                      @endif
                  @else
                      <li class="nav-item dropdown">
                          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                              {{ Auth::user()->firstname }} {{ Auth()->user()->lastname }} <span class="caret"></span>
                          </a>

                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="{{ route('home') }}">Orders</a>
                              <div class="dropdown-divider"></div>
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

    @yield('content')

{{--     <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-12">
          <div id="header">
            <h1 class="text-center">Inksite <br>
              Motoprint
            </h1>

            <h4 class="text-center">IF YOU CAN THINK IT, WE CAN INK IT</h4>

            <div id="contact">
              <h4>CONTACT DETAILS</h4>
              <ul class="list-unstyled">
                <li> <i class="fa fa-phone"></i> 09272246882 / 09179616083 / 09065265461</li>
                <li> <i class="fa fa-envelope"></i> inksitemotoprint@gmail.com</li>
                <li> <i class="fas fa-globe"></i> inksitemotoprint.com</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div> --}}

<script src="/js/jquery-3.4.1.min.js" type="text/javascript"></script>
<script src="/assets/js/bootstrap.bundle.min.js" type="text/javascript"></script>
<script src="/assets/js/bootstrap.min.js" type="text/javascript"></script>

@yield('custom_js')
</body>
</html>