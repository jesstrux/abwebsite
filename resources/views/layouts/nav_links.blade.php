<a href="{{url('/')}}" class="{{strtolower($page) == "home" ? 'active' : ''}}">
    Home
</a>

<a href="{{url('/about')}}" class="{{strtolower($page) == "about" ? 'active' : ''}}">
    About Me
</a>

<div class="dropdown-menu {{strtolower($page) == "tv show" ? 'active' : ''}}">
    TV Shows

    <div class="dropdown">
        @foreach($shows as $show)
            <a href="{{url('/show/'.$loop->iteration)}}">
                {{$show}}
            </a>
        @endforeach
    </div>
</div>

<div class="dropdown-menu {{strtolower($page) == "feel me" ? 'active' : ''}}">
    Feel Me

    <div class="dropdown">
        @foreach($feel_me as $show)
            <a href="{{url('/feel_me/'.$loop->iteration)}}">
                {{$show}}
            </a>
        @endforeach
    </div>
</div>

<a href="https://medium.com/@abella.bateyunga" target="_blank">
    Blogs
</a>

<a href="{{url('/ask')}}" class="{{strtolower($page) == "ask" ? 'active' : ''}}">
    Ask Abella
</a>