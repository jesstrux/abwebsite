<style>
.bootstrap-tagsinput {
  background-color: #fff;
  border: 1px solid #ccc;
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
  display: inline-block;
  padding: 4px 6px;
  color: #555;
  vertical-align: middle;
  /*border-radius: 4px;*/
  width: 100%;
  line-height: 22px;
  cursor: text;
}
.bootstrap-tagsinput input {
  border: none;
  box-shadow: none;
  outline: none;
  background-color: transparent;
  padding: 0 6px;
  margin: 0;
  width: auto;
  max-width: inherit;
}
.bootstrap-tagsinput.form-control input::-moz-placeholder {
  color: #777;
  opacity: 1;
}
.bootstrap-tagsinput.form-control input:-ms-input-placeholder {
  color: #777;
}
.bootstrap-tagsinput.form-control input::-webkit-input-placeholder {
  color: #777;
}
.bootstrap-tagsinput input:focus {
  border: none;
  box-shadow: none;
}
.bootstrap-tagsinput .tag {
  margin-right: 2px;
  color: white;
}
.bootstrap-tagsinput .tag [data-role="remove"] {
  margin-left: 8px;
  cursor: pointer;
}
.bootstrap-tagsinput .tag [data-role="remove"]:after {
  content: "x";
  padding: 0px 2px;
}
.bootstrap-tagsinput .tag [data-role="remove"]:hover {
  box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
}
.bootstrap-tagsinput .tag [data-role="remove"]:hover:active {
  box-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
}
.typeahead {
    margin-top: 2px;
    position: absolute;
    top: 0;
    left: 0;
    z-index: 1000;
    float: left;
    min-width: 160px;
    padding: 5px 0;
    margin: 2px 0 0;
    list-style: none;
    background-color: white;
    border: 1px solid #CCC;
}

.typeahead li {
    line-height: 20px;
}

.typeahead a {
    display: block;
    padding: 3px 20px;
    clear: both;
    font-weight: normal;
    line-height: 20px;
    color: #333;
    white-space: nowrap;
    text-decoration: none;
}

.typeahead .active > a {
    color: white;
    text-decoration: none;
    background-color: #0081C2;
    outline: 0;
}

.typeahead.hidden {
    display: none;
}
</style>

<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">

  <script>
    var input = document.getElementById('question_category_id');
    var tar = Typeahead(input, {
      source: ['Amsterdam', 'Washington', 'Sydney', 'Beijing', 'Cairo']
    });
  </script>

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

                'data-role' => 'tagsinput',

                'class' => 'form-control',

                'required' => 'required',

                'aria-describedby'=> 'questionCategoryIdHelpBlock',


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
