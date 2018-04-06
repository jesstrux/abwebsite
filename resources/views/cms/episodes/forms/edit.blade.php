@extends('cms.layouts.app')


@section('styles')
<link rel="stylesheet" href="{{ asset('css/cms_episodes.css') }}">
@endsection

@section('content')

<ul class="nav nav-tabs">
  <li class="active">
    <a data-toggle="tab" href="#editEpisode">
      <span style="font-weight: bold;">Episode Details</span>
    </a>
  </li>
  <li>
    <a data-toggle="tab" href="#changePicture">
      <span style="font-weight: bold;">Change Picture</span>
    </a>
  </li>
</ul>

<div class="tab-content">

  <div id="editEpisode" class="tab-pane fade active in">
    @include('cms.episodes.forms.edit_form', [

    ])
  </div>

  <div id="changePicture" class="tab-pane fade">
    @include('cms.episodes.forms.pictures', [

    ])
  </div>

</div>

@endsection

@section('scripts')
<script src="{{ asset('js/episode_picture.js') }}"></script>
<script src="{{ asset('js/episodes.js') }}"></script>
@endsection
