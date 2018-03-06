<div class="panel-top-nav">

  <a href="{{ route('admin.index') }}" title="home">
      <img src="{{ asset('images/logo.png') }}"
        style="margin-top:15px;margin-left:-10px" height="50px">
  </a>

  <div style="font-size:1em">

    <a href="{{ route('admin.index') }}">
      {{-- <span><i class="fas fa-home text-white" ></i></span> --}}
    </a> &nbsp&nbsp

  </div>

</div>

<li class="nav-header m-b-md">

    <div class="dropdown profile-element">

        <a href="{{ route('profile_picture.index') }}" title="change">

          <img

              id="abella-avatar"

              alt="image"

              width="40"

              height="40"

              class="img-circle"

              src="{{ Auth::user()->avatar }}" />

        </a>

        <a
            data-toggle="dropdown"

            href="#" class="pull-right">

            <span class="clear">

                <span class="block m-t-xs">

                    {{ Auth::user()->name }}

                    <span class="caret"></span>

                </span>

                <strong>{{ Auth::user()->username }}</strong>

            </span>
        </a>

        <ul class="dropdown-menu m-t-xs">

            <li>

                <a href="{{ url('/logout') }}"

                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">

                    Sign out

                    <form

                        id="logout-form"

                        action="{{ url('/logout') }}"

                        method="POST"

                        style="display: none;">

                        {{ csrf_field() }}

                    </form>

                </a>

            </li>

            <li class="divider"></li>

            <li>

                <a href="{{ url('/change_password') }}">

                  Change Password

                </a>

            </li>

        </ul>

    </div>

</li>
