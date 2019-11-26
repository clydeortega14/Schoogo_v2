<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Inksite Motoprint | Landing Page</title>

  <!-- Font Awesome Icons -->
  <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Lobster|Merriweather+Sans:400,700" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Lobster|Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>

  <!-- Plugin CSS -->
  <link href="/vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

<!-- Theme CSS - Includes Bootstrap -->
<link href="/css/creative.css" rel="stylesheet">

<!-- CUSTOMIZE THEME -->
<link href="/css/creative2.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
        <div class="container">
          <a href="{{ url('/') }}" class="navbar-brand js-scroll-trigger" href="#page-top">Home</a>
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto my-2 my-lg-0">
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#products">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#mission">Mission</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#vission">Vision</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#services">Sevices</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
                    </li>
                    @guest
                        <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link">Sign In</a>
                        </li>
                        @if(Route::has('register'))
                            <li class="nav-item">
                                <a href="{{  route('register') }}" class="nav-link">Sign Up</a>
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

  <!-- Masthead -->
    <header class="masthead">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center text-center">

                <div class="col-lg-10 align-self-end">
                    <h1 class="text-white font-weight-bold">Inksite <br>Motoprint</h1>
                </div>

                <div class="col-lg-8 align-self-baseline">
                    <p class="text-uppercase text-white-75 font-weight-light mb-5">if you can think it, we can ink it.</p>
                    <a class="btn btn-primary btn-xl js-scroll-trigger learn-more" href="#products">Learn More</a>
                </div>
            </div>
        </div>
    </header>

    <section class="page-section" id="products">
        <div class="container">
            <h2 class="text-center mt-0">Sample Products</h2>
            <hr class="divider my-4">
            <div class="row justify-content-center">
                @foreach($products as $product)
                    <div class="col-sm-4 py-2">
                        <div class="card h-100">
                            <a href="{{ route('product.categories', $product->id) }}">
                                <img src="{{ $product->image == null ? '/img/portfolio/thumbnails/1.jpg' : asset('/uploads/images/products/'. $product->image) }}" alt="..." class="card-img-top" width="300" height="200">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">{{ $product->description}}</p>
                            </div>

                            <div class="card-footer">
                                <a href="{{ route('product.categories', $product->id) }}" class="btn btn-outline-info">Select</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                <a href="{{ route('get.products') }}" class="btn btn-outline-info mt-5">View More</a>
            </div>
            <br>
            <br>
            
        </div>
    </section>

    <section class="page-section" id="mission">
        <div class="container">
            <h2 class="text-center mt-0">Mission</h2>
            <hr class="divider my-4">
            <p class="lead"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; The mission of Inksite Motoprint is to serve as a medium of convenience and modernized purchasing experience intended for customers in need of printed materials using the company's Inksite Motoprint web application.
            </p>
            <p class="lead"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; It is Inksite Motoprint's purpose to deliver the ordered printed items personally and efficiently with the highest quality possible in order to address the customer's printing need, thus cutting back customers
            use of energey and be received with nothing but satisfaction.
            </p>
        </div>
    </section>

    <section class="page-section" id="vission">
        <div class="container">
            <h2 class="text-center mt-0">Vision</h2>
            <hr class="divider my-4">
            <p class="lead"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Inksite Motoprint's vision is to be the fastest growing company that could contribut
                to making the life of customers more convenient and stress free when it comes to their printing needs by providing its excellent services with the use of website application.
            </p>        
        </div>
    </section>

  <!-- Services Section -->
    <section class="page-section" id="services">
        <div class="container">
            <h2 class="text-center mt-0">Services Offered</h2>
            <hr class="divider my-4">
            <div class="row">
                <div class="col-lg-12 col-md-6 text-center">
                    <div class="mt-2">
                        <p class="text-muted mb-0">Business Forums / Brochures / Flyers / Magazines / Calendar / Yearbook / Banners / Hard Bound and Soft bound and ring bind / Tarpaulin / Posters / Labels / Stickers /Invitation Card /
                        T-shirt Printing /Bag Printing / ID Lace Printing</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

  <!-- Contact Section -->
    <section class="page-section" id="contact">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="mt-0">Contact Details</h2>
                    <hr class="divider my-4">
                    {{-- <p class="text-muted mb-5">Ready to start your next project with us? Give us a call or send us an email and we will get back to you as soon as possible!</p> --}}
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
                    <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
                    <ul class="list-unstyled">
                        <li class="list-inline-item">09272246882 / 09179616083 / 09065265461 / 272-8169</li>
                    </ul>
                </div>
                <div class="col-lg-4 mr-auto text-center">
                    <i class="fas fa-envelope fa-3x mb-3 text-muted"></i>
                    <!-- Make sure to change the email address in anchor text AND the link below! -->
                    <a class="d-block" href="mailto:contact@yourwebsite.com">inksitemotoprint@gmail.com</a>
                </div>
                <div class="col-lg-4 mr-auto text-center">
                    <i class="fas fa-globe fa-3x mb-3 text-muted"></i>
                    <a class="d-block" href="#">Inksitemotoprint.com</a>
                </div>
            </div>
        </div>
    </section>

      <!-- Footer -->
    <footer class="bg-light py-5">
        <div class="container">
            <div class="small text-center text-muted">Copyright &copy; 2019 - Inksite Motoprint</div>
        </div>
    </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="/vendor/jquery/jquery.min.js"></script>
  <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="/js/creative.min.js"></script>

</body>

</html>
