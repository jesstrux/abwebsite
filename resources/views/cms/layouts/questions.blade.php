<li class="{{ areActiveRoutes(['admin.index', 'questions.*', 'question_categories.*']) }}">

    <a href="#">

        <i class="fa fa-question"></i>

        <span class="nav-label">

            Questions

        </span>

        <span class="fa arrow"></span>

    </a>

    <ul class="nav nav-second-level">

        <li class="{{ isActiveRoute('question_categories.*') }}">

            <a href="{{ route('question_categories.index') }}">

                <span class="nav-label">

                    Categories

                </span>

            </a>

        </li>

        <li class="{{ isActiveRoute('questions.*') }}">

            <a href="{{ route('questions.index') }}">

                <span class="nav-label">

                    List

                </span>

            </a>

        </li>

    </ul>

</li>
