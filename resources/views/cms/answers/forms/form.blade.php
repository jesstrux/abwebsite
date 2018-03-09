<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">

    <div class="col-md-offset-3 col-md-6">

        {!!
            Form::textarea('title', null, [

                'class' => 'form-control',

                'aria-describedby'=> 'titleHelpBlock',

                'rows' => 3,

                'placeholder' => 'Title',

            ])
        !!}

        @if($errors->any() && $errors->has('title'))

            {!!

                $errors->first(
                    'title',

                    '<p class="help-block">:message</p>'
                )

            !!}

        @else

            <p id="titleHelpBlock" class="help-block">

                The Answer Title

            </p>

        @endif

    </div>

</div>

<div class="form-group {{ $errors->has('question_category_id') ? 'has-error' : '' }}">

    <div class="col-md-offset-3 col-md-6">

        {!!
            Form::text('question_category_id', null, [

                'id' => 'question_category_id',

                'class' => 'form-control',

                'required' => 'required',

                'aria-describedby'=> 'questionCategoryIdHelpBlock',

                'placeholder' => 'Categories',

            ])
        !!}

        @if($errors->any() && $errors->has('question_category_id'))

            {!!

                $errors->first(
                    'question_category_id',

                    '<p class="help-block">:message</p>'
                )

            !!}

        @else

            <p id="questionCategoryIdHelpBlock" class="help-block">

                The Question Categories Addressed

            </p>

        @endif

    </div>

</div>

<div class="form-group {{ $errors->has('youtube_id') ? 'has-error' : '' }}">

    <div class="col-md-offset-3 col-md-6">

        {!!
            Form::text('youtube_id', null, [

                'class' => 'form-control',

                'required' => 'required',

                'aria-describedby'=> 'youtubeIdHelpBlock',

                'placeholder' => 'Youtube ID',

            ])
        !!}

        @if($errors->any() && $errors->has('youtube_id'))

            {!!

                $errors->first(
                    'youtube_id',

                    '<p class="help-block">:message</p>'
                )

            !!}

        @else

            <p id="youtubeIdHelpBlock" class="help-block">

                The Youtube-ID

            </p>

        @endif

    </div>

</div>
