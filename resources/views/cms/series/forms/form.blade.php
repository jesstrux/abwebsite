<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">

    <div class="col-md-offset-3 col-md-6">

        {!!
            Form::text('title', null, [

                'class' => 'form-control',

                'required' => 'required',

                'aria-describedby'=> 'titleHelpBlock',

                'placeholder' => 'title',

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

                The Series Title

            </p>

        @endif

    </div>

</div>

<div class="form-group {{ $errors->has('series_category_id*') ? 'has-error' : ''}}">

    <div class="col-md-offset-3 col-md-6">
      {{--
          Form::label('series_category_id', 'Series Category:', [

              'class' => 'control-label',

          ])
      --}}

        {!!
            Form::select('series_category_id', $categories, $selectedCategory, [

                'id' => 'categorySelector',

                'class' => 'form-control',

                'required' => 'required',

                'aria-describedby'=> 'categoryHelpBlock',

                'onchange' => 'categoryChanged()',

                'placeholder' => 'Choose Category',

            ])
        !!}

        @if($errors->any() && $errors->has('series_category_id'))

            {!!

                $errors->first(
                    'series_category_id',

                    '<p class="help-block">:message</p>'
                )

            !!}

        @else

            <p id="categoryHelpBlock" class="help-block">

                The Series Category

            </p>

        @endif

    </div>

</div>

<div class="form-group {{ $errors->has('day') ? 'has-error' : ''}}">

    <div class="col-md-offset-3 col-md-6">
      {{--
          Form::label('day_id', 'Days:', [

              'class' => 'control-label',

          ])
      --}}

        {!!
            Form::select('day', $days, $selectedDay, [

                'id' => 'daySelector',

                'class' => 'form-control',

                'required' => 'required',

                'aria-describedby'=> 'dayHelpBlock',

                'onchange' => 'dayChanged()',

                'placeholder' => 'Choose Day',

            ])
        !!}

        @if($errors->any() && $errors->has('day'))

            {!!

                $errors->first(
                    'day',

                    '<p class="help-block">:message</p>'
                )

            !!}

        @else

            <p id="dayHelpBlock" class="help-block">

                The Day Aired

            </p>

        @endif

    </div>

</div>

<div class="form-group {{ $errors->has('air_time') ? 'has-error' : '' }}">

    <div class="col-md-offset-3 col-md-6">

        {!!
            Form::text('air_time', null, [

                'id' => 'air_time',

                'class' => 'form-control',

                'required' => 'required',

                'aria-describedby'=> 'timeHelpBlock',

                'placeholder' => 'time',

            ])
        !!}

        @if($errors->any() && $errors->has('air_time'))

            {!!

                $errors->first(
                    'air_time',

                    '<p class="help-block">:message</p>'
                )

            !!}

        @else

            <p id="timeHelpBlock" class="help-block">

                The Time Aired

            </p>

        @endif

    </div>

    <script type="text/javascript">
        $('#air_time').timepicker({
            template: false,
            showInputs: false,
            minuteStep: 1
        });
    </script>

</div>

<div class="form-group {{ $errors->has('channel') ? 'has-error' : '' }}">

    <div class="col-md-offset-3 col-md-6">

        {!!
            Form::text('channel', null, [

                'id' => 'channel',

                'class' => 'form-control',

                'required' => 'required',

                'aria-describedby'=> 'channelHelpBlock',

                'placeholder' => 'channel',

            ])
        !!}

        @if($errors->any() && $errors->has('channel'))

            {!!

                $errors->first(
                    'channel',

                    '<p class="help-block">:message</p>'
                )

            !!}

        @else

            <p id="channelHelpBlock" class="help-block">

                The Channel Aired

            </p>

        @endif

    </div>

</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">

    <div class="col-md-offset-3 col-md-6">

        {!!
            Form::textarea('description', null, [

                'class' => 'form-control',

                'aria-describedby'=> 'descriptionHelpBlock',

                'placeholder' => 'Description',

            ])
        !!}

        @if($errors->any() && $errors->has('description'))

            {!!

                $errors->first(
                    'description',

                    '<p class="help-block">:message</p>'
                )

            !!}

        @else

            <p id="descriptionHelpBlock" class="help-block">

                A short description

            </p>

        @endif

    </div>

</div>
