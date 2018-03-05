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

        @if($errors->any() && $errors->has('name'))

            {!!

                $errors->first(
                    'name',

                    '<p class="help-block">:message</p>'
                )

            !!}

        @else

            <p id="nameHelpBlock" class="help-block">

                The Series Category Name

            </p>

        @endif

    </div>

</div>
