@include('cms.partials.questions')

<li class="{{ isActiveRoute('answers.*') }}">

    <a href="{{ route('answers.index') }}">

        <i class="fa fa-cloud"></i>

        <span class="nav-label">

            Answers

        </span>

    </a>

</li>

@include('cms.partials.series')

<li class="{{ isActiveRoute('episodes.*') }}">

    <a href="{{ route('episodes.index') }}">

        <i class="fa fa-desktop"></i>

        <span class="nav-label">

            Episodes

        </span>

    </a>

</li>
