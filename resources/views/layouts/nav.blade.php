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
        <button>MENU</button>
        <div class="layout center flex">
            <a id="mainLogo" href="{{url('/')}}">
                <img src="{{asset('images/logo.png')}}" alt="" height="90%">
            </a>
            Abella Bateyunga
        </div>
    </div>
    @include('layouts.nav_links')
</nav>