<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>{{ config('app.name') }}</title>

  <link
      href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css"
      rel="stylesheet">

  {{--<link rel="stylesheet"
  	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">--}}
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">

  <script
    src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
  </script>

  <script
    src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
  </script>

</head>

<body>
  
  <script src="{{ asset('js/app.js') }}"></script>

  <div id="wrapper">

      <nav class="navbar-default navbar-static-side" role="navigation">

          <div class="sidebar-collapse">

              <ul class="nav metismenu" id="side-menu">

                  @include('cms.partials.sidenav_header')

                  @include('cms.partials.sidenav_content')

              </ul>

          </div>

      </nav>


      <div id="page-wrapper" class="gray-bg">

          @include('cms.partials.page_header')

          <div class="row wrapper wrapper-content">

              <div class="row">

                  <div class="col-md-12">

                      @include('flash::message')

                  </div>

              </div>

              @yield('content')

          </div>

      </div>

  </div>

</body>
</html>
