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

                The Series Title

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

                'aria-describedby'=> 'youtubeHelpBlock',

                'placeholder' => 'Youtube_id',

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

            <p id="youtubeHelpBlock" class="help-block">

                The Youtube ID

            </p>

        @endif

    </div>

</div>

<div class="form-group {{ $errors->has('series_category_id') ? 'has-error' : ''}}">

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

<div class="form-group {{ $errors->has('series_id') ? 'has-error' : ''}}">

    <div class="col-md-offset-3 col-md-6">
      {{--
          Form::label('series_id', 'Series:', [

              'class' => 'control-label',

          ])
      --}}

        {!!
            Form::select('series_id', $series, $selectedSeries, [

                'id' => 'seriesSelector',

                'class' => 'form-control',

                'required' => 'required',

                'aria-describedby'=> 'seriesHelpBlock',

                'onchange' => 'seriesChanged()',

                'placeholder' => 'Choose Series',

            ])
        !!}

        @if($errors->any() && $errors->has('series_id'))

            {!!

                $errors->first(
                    'series_id',

                    '<p class="help-block">:message</p>'
                )

            !!}

        @else

            <p id="seriesHelpBlock" class="help-block">

                The Series

            </p>

        @endif

    </div>

</div>

<div class="form-group {{ $errors->has('date_aired') ? 'has-error' : '' }}">

    <div class="col-md-offset-3 col-md-6">

        {!!
            Form::text('date_aired', null, [

                'id' => 'date_aired',

                'class' => 'form-control datepicker',

                'required' => 'required',

                'aria-describedby'=> 'dateAiredHelpBlock',

                'placeholder' => 'Date Aired',

            ])
        !!}

        @if($errors->any() && $errors->has('date_aired'))

            {!!

                $errors->first(
                    'date_aired',

                    '<p class="help-block">:message</p>'
                )

            !!}

        @else

            <p id="dateAiredHelpBlock" class="help-block">

                The Date Aired

            </p>

        @endif

    </div>

    <script type="text/javascript">
        $('.datepicker').datepicker();
    </script>

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
