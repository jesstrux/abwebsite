<li class="{{ areActiveRoutes(['series.*', 'series_categories.*']) }}">

    <a href="#">

        <i class="fa fa-clipboard-list"></i>

        <span class="nav-label">

            Series

        </span>

        <span class="fa arrow"></span>

    </a>

    <ul class="nav nav-second-level">

        <li class="{{ isActiveRoute('series_categories.*') }}">

            <a href="{{ route('series_categories.index') }}">

                <span class="nav-label">

                    Categories

                </span>

            </a>

        </li>

        <li class="{{ isActiveRoute('series.*') }}">

            <a href="{{ route('series.index') }}">

                <span class="nav-label">

                    List

                </span>

            </a>

        </li>

    </ul>

</li>
