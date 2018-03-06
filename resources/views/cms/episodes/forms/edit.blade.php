@extends('cms.layouts.app')

@section('content')

<style>
  .nav-tabs > li > a {
    color: #555555;
  }
  
  .nav-tabs > li.active > a, .nav-tabs > li.active > a:hover,
  .nav-tabs > li.active > a:focus {
    color: #337ab7;
  }

  .tab-content {
    margin-top: 20px;
    background-color: #fff;
  }

  #changePicture {
    padding: 10px 0;
  }
</style>

<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#editEpisode">Episode Details</a></li>
  <li><a data-toggle="tab" href="#changePicture">Change Picture</a></li>
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
