<li class="{{ isActiveRoute('question_categories.*') }}">

    <a href="{{ route('question_categories.index') }}">

        <i class="fa fa-cube"></i>

        <span class="nav-label">

            Question Categories

        </span>

    </a>

</li>

<li class="{{ areActiveRoutes(['admin.index', 'questions.*']) }}">

    <a href="{{ route('questions.index') }}">

        <i class="fa fa-question-circle"></i>

        <span class="nav-label">

            Questions

        </span>

    </a>

</li>

<li class="{{ isActiveRoute('answers.*') }}">

    <a href="{{ route('answers.index') }}">

        <i class="fa fa-folder-open-o"></i>

        <span class="nav-label">

            Answers

        </span>

    </a>

</li>

<li class="{{ isActiveRoute('series_categories.*') }}">

    <a href="{{ route('series_categories.index') }}">

        <i class="fa fa-tags"></i>

        <span class="nav-label">

            Series Categories

        </span>

    </a>

</li>

<li class="{{ isActiveRoute('series.*') }}">

    <a href="{{ route('series.index') }}">

        <i class="fa fa-video-camera"></i>

        <span class="nav-label">

            Series

        </span>

    </a>

</li>

<li class="{{ isActiveRoute('episodes.*') }}">

    <a href="{{ route('episodes.index') }}">

        <i class="fa fa-desktop"></i>

        <span class="nav-label">

            Episodes

        </span>

    </a>

</li>

<li class="{{ isActiveRoute('news_feeds.*') }}">

    <a href="{{ route('news_feeds.index') }}">

        <i class="fa fa-newspaper-o"></i>

        <span class="nav-label">

            NewsFeeds

        </span>

    </a>

</li>

<li class="{{ isActiveRoute('archived_questions') }}">

    <a href="{{ route('archived_questions') }}">

        <i class="fa fa-folder"></i>

        <span class="nav-label">

            Archived Questions

        </span>

    </a>

</li>
