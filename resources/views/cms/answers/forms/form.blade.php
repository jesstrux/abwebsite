<div class="form-group">

    <div class="col-md-offset-3 col-md-6">

        <question-categories
          :categories="{{ $categories }}"
          :selected-categories="{{ $selectedCategories }}"
          :error="{{ json_encode($errors->any() && $errors->has('question_category_id')) }}">
        </question-categories>

    </div>

</div>

<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">

    <div class="col-md-offset-3 col-md-6">

        {!!
            Form::textarea('title', null, [

                'class' => 'form-control',

                'required' => 'required',

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
