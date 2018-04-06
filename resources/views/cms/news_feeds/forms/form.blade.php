<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">

    <div class="col-md-offset-3 col-md-6">

        {!!
            Form::text('title', null, [

                'class' => 'form-control',

                'required' => 'required',

                'aria-describedby'=> 'titleHelpBlock',

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

                The NewsFeed Title

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

                'aria-describedby'=> 'youtubeIDHelpBlock',

                'placeholder' => 'YouTube-ID',

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

            <p id="youtubeIDHelpBlock" class="help-block">

                The YouTube-ID

            </p>

        @endif

    </div>

</div>
