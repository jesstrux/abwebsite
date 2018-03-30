<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name') }}</title>

  <link href="{{asset('fav.png')}}" rel="shortcut icon" type="image">

  <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">

  <link href="{{asset('css/jquery.dataTables.min.css')}}" rel="stylesheet">

  {{--<link rel="stylesheet"
  	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">--}}

  <link rel="stylesheet" href="{{ asset('css/app.css') }}">

  <link rel="stylesheet" href="{{ asset('css/cms_styles.css') }}">

</head>

<body>

  <div id="abella-cms">

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

  </div>

  <script src="{{ asset('js/app.js') }}"></script>

  <script src="{{ asset('js/cms.js') }}"></script>

  <script>
    $(function ()
    {

      $("#myTable").DataTable({
       iDisplayLength: 8,
       bLengthChange: false
     });

    });
  </script>
  
  @yield('scripts')

</body>
</html>
