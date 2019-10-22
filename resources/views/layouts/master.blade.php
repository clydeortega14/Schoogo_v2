<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title')</title>
  
  @include('layouts.partials._links')

</head>

<!-- 
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
 -->
<body class="hold-transition skin-blue sidebar-mini">
  
  <div class="wrapper">
    
    @include('layouts.partials._header')

    @include('layouts.partials._sidebar')

    <div class="content-wrapper">
      
      @yield('content')

    </div>

    @include('layouts.partials._footer')

  </div>

  @include('layouts.partials._scripts')

</body>
