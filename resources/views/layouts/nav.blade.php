<nav id="mainNav" class="for-lg {{$for_home ? 'for-home' : ''}}" style="position: relative;">
    <div class="center justified {{!$for_home ? 'layout section-wrapper' : ''}}">
        @if(!$for_home)
            <a id="mainLogo" href="{{url('/')}}">
                <img src="{{asset('images/logo.png')}}" alt="" height="90%">
            </a>
            <span class="flex"></span>
        @endif
        <div id="navLinks" class="section-wrapper layout center justified">
            @include('layouts.nav_links')
        </div>
    </div>
</nav>

<nav id="mobNav" class="for-mob">
    <div id="appBar" class="layout center">
        <button id="menuBtn" onclick="(function () {document.getElementById('mobNav').classList.toggle('open');})();">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path id="menuBars" d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"/>
                <path id="backArrow" d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"/>
            </svg>
        </button>

        <div id="menuTitle" class="layout center-center flex">
            {{$page_title}}
        </div>

        <a id="mainLogo" href="{{url('/')}}" class="layout center">
            <img src="{{asset('images/logo.png')}}" alt="" height="90%">
        </a>
    </div>
    <div id="theNav">
        <a href="{{url('/')}}" class="{{strtolower($page) == "home" ? 'active' : ''}}">
            Home
        </a>

        <a href="{{url('/about')}}" class="{{strtolower($page) == "about" ? 'active' : ''}}">
            About Me
        </a>

        <a  href="{{url('/shows/')}}" class="{{strtolower($page) == "tv show" ? 'active' : ''}}">TV Shows</a>

        <a  href="{{url('/feel_me/')}}" class="{{strtolower($page) == "feel me" ? 'active' : ''}}" style="display: none;">Feel Me</a>

        <a href="https://medium.com/@abella.bateyunga" target="_blank">
            Blogs
        </a>

        <a href="{{url('/ask')}}" class="{{strtolower($page) == "ask" ? 'active' : ''}}">
            Ask Abella
        </a>
    </div>
</nav>