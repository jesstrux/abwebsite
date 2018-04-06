@extends('cms.layouts.app')

@section('content')

<div class="row">

    <div class="col-md-12">

        {!!
            Form::model($newsFeed, [

                'files' => true,

                'method' => 'PATCH',

                'class'  => 'form-horizontal',

                'route'  => ['news_feeds.update', $newsFeed],
            ])
        !!}

        <div class="ibox">

            <div class="ibox-content">

                <div class="page-header">

                    <div class='btn-toolbar pull-right' role="toolbar">

                        <a
                            class="btn btn-white"
                            href="{{ route('news_feeds.index') }}"
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

                             Update NewsFeed

                        </small>

                    </h2>

                </div>

                <div class="row m-t-lg m-b-lg">

                    @include ('cms.news_feeds.forms.form', [


                    ])

                </div>

            </div>

        </div>

        {!! Form::close() !!}

    </div>

</div>


@endsection
