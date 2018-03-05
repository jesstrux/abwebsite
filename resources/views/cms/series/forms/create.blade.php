@extends('cms.layouts.app')

@section('content')

<div class="row">

    <div class="col-md-12">

        {!!
            Form::open([
                'files'  => true,

                'method' => 'POST',

                'class'  => 'form-horizontal',

                'route'  => 'series.store',
            ])
        !!}

        <div class="ibox">

            <div class="ibox-content">

                <div class="page-header">

                    <div class='btn-toolbar pull-right' role="toolbar">

                        <a
                            class="btn btn-white"
                            href="{{ route('series.index') }}"
                            title="cancel">

                            cancel

                        </a>

                        {!!
                            Form::button('create', [
                                'type' => 'submit',

                                'class' => 'btn btn-primary',

                                'title' => 'create',
                            ])
                        !!}

                    </div>

                    <h2>

                        <small>
                          New Series
                        </small>

                    </h2>

                </div>

                <div class="row m-t-lg m-b-lg">

                    @include ('cms.series.forms.form', [


                    ])

                </div>

            </div>

        </div>

        {!! Form::close() !!}

    </div>

</div>

@endsection
