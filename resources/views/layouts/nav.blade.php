<nav id="mainNav" class="for-lg {{$for_home ? 'for-home' : ''}}" style="position: relative;">
    <div class="center justified {{!$for_home ? 'layout section-wrapper' : ''}}">
        @if(!$for_home)
            <a id="mainLogo" href="{{url('/')}}">
                <img src="{{asset('images/logo.png')}}" alt="" height="90%">
            </a>
            <span class="flex"></span>
        @endif
        <div id="navLinks" class="section-wrapper layout center justified">
            <a href="{{url('/')}}">
                Home
            </a>

            <a href="{{url('/about')}}">
                About Me
            </a>

            <div class="dropdown-menu">
                <a href="{{url('/')}}">
                    TV Shows
                </a>

                <div class="dropdown">
                    @foreach($shows as $show)
                        <a href="{{url('/show/'.$loop->index)}}">
                            {{$show}}
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="dropdown-menu">
                <a href="{{url('/')}}">
                    Feel Me
                </a>

                <div class="dropdown">
                    <a href="{{url('/')}}">
                        My piece of mind
                    </a>
                    <a href="{{url('/')}}">
                        Spoken Word
                    </a>
                    <a href="{{url('/')}}">
                        Moment of wisdom
                    </a>
                </div>
            </div>

            <a href="{{url('/')}}">
                Blogs
            </a>

            <a href="{{url('/ask')}}">
                Ask Abella
            </a>
        </div>
    </div>
</nav>