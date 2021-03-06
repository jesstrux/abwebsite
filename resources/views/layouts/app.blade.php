    <!DOCTYPE html>
    <html lang="{{ config('app.locale') }}">
    <head>
        <link rel="manifest" href="{{asset('manifest.json')}}">

        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="msapplication-starturl" content="/">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <meta name="theme-color" content="#f38536">
        {{--<meta name="keywords" content="Tanzania ecommerce, ecommerce, tanzania, kid ecommerce, kids shop, kids city">--}}
        {{--<meta name="description" content="A platform that aims to bridge the gap in innovation for women.">--}}
        <meta name="author" content="iPF Softwares ">
        <meta charset="UTF-8">
        <link href="{{asset('fav.png')}}" rel="shortcut icon" type="image">
        <title>Abella Bateyunga | {{$page}}</title>

        <!-- Styles -->
        <link href="{{asset('css/reset.css')}}" rel="stylesheet">
        <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{asset('css/flex.css')}}" rel="stylesheet">
        <link href="{{asset('css/flexboxgrid.min.css')}}" rel="stylesheet">

        <link href="{{asset('css/styles.css')}}" rel="stylesheet">

        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Scripts -->
        <script src="{{asset('js/lib/jquery-3.1.0.min.js')}}"></script>
        <script>
            window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
                'base_url' => url('/')
            ]) !!};
        </script>

        <style>
            #alertMessage{
                position: fixed;
                top: 60px;
                right: 30px;
                padding: 16px 20px;
                border-radius: 3px;
                box-shadow: -2px 2px 12px rgba(0,0,0,0.3);
                background: #fefe03;
                color: #451f75;
                z-index: 99;
                max-width: 250px;
                line-height:23px;
                animation-duration: 0.35s;
            }

            #alertMessage i{
                display: inline-block;
                margin-right: 5px;
            }

            #alertMessage.slideOutUp{
                animation-duration: 0.05s;
            }

            #alertMessage:not(.slideInDown){
                opacity: 0;
                pointer-events: none;
            }
        </style>

        @yield('styles')
    </head>
    <body style="padding-top: 0;">
        <?php
            $page_name = strtolower($page);
            $for_home = $page_name == "home" || $page_name == "tv show" || $page_name == "feel me";
            $shows = \App\Show::get_all()->pluck('title');
            $feel_me = ["My piece of mind", "Spoken Word", "Moment of wisdom"];
        ?>
        <div id="alertMessage" class="animated">
            <i class="fa fa-check-circle"></i>
            <span id="alertMessageText">
                Thankyou, we have received your message.
            </span>
        </div>

        @include('layouts.nav')

        @yield('content')

        @yield('scripts')

        <script src="{{asset('js/scripts.js')}}"></script>

        <script>
            var alertMessage = document.getElementById("alertMessage");
            var alertMessageText = document.getElementById("alertMessageText");
            var alert_timeout = null;

            function showMessage(message){
                console.log(alert_timeout);
                if(alert_timeout !== null){
                    closeMessage(message);
                    return;
                }

                alertMessageText.innerText = message;
                alertMessage.classList.add("slideInDown");
                alert_timeout = setTimeout(function () {
                    alertMessage.classList.add("slideOutUp");

                    setTimeout(function (){
                        alertMessage.classList.remove("slideInDown");
                        alertMessage.classList.remove("slideOutUp");
                        alert_timeout = null;
                    }, 300);
                }, 3200);
            }

            function closeMessage(message){
                clearTimeout(alert_timeout);
                alertMessage.classList.remove("slideInDown");
                alertMessage.classList.add("slideOutUp");

                if(message && message.length){
                    setTimeout(function (){
                        alertMessage.classList.remove("slideOutUp");
                        alert_timeout = null;
                        showMessage(message);
                    }, 100);
                }else{
                    setTimeout(function (){
                        alertMessage.classList.remove("slideOutUp");
                        alert_timeout = null;
                    }, 300);
                }
            }

            function enableScrollLocker() {
                var controller = new ScrollMagic.Controller();
                new ScrollMagic.Scene({
                    triggerElement: '.page-wrapper',
                    triggerHook: -1
                })
                    .setClassToggle("#mainNav", "thin")
                    .addTo(controller);
            }

    //        if(window.innerWidth >= 680){
    //            enableScrollLocker();
    //        }
        </script>

        @include('layouts.footer')
    </body>
    </html>