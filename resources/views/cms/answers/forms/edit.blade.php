@extends('cms.layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/cms_answers.css') }}">
@endsection

@section('content')

<div class="row">

    <div class="col-md-12">

        {!!
            Form::model($answer, [

                'files' => true,

                'method' => 'PATCH',

                'class'  => 'form-horizontal',

                'route'  => ['answers.update', $answer],
            ])
        !!}

        <div class="ibox">

            <div class="ibox-content">

                <div class="page-header">

                    <div class='btn-toolbar pull-right' role="toolbar">

                        <a
                            class="btn btn-white"
                            href="{{ route('answers.index') }}"
                            title="cancel">

                            cancel

                        </a>

                        {!!
                            Form::button("update", [
                                'type' => 'submit',

                                'class' => 'btn btn-primary',

                                'title' => 'update',
                            ])
                        !!}

                    </div>

                    <h2>

                        <small>
                          Update Answer
                        </small>

                    </h2>

                </div>

                <div class="row m-t-lg m-b-lg">

                    @include ('cms.answers.forms.form', [


                    ])

                </div>

            </div>

        </div>

        {!! Form::close() !!}

    </div>

</div>

@endsection

@section('scripts')
<script src="{{ asset('js/answers.js') }}"></script>
@endsection
