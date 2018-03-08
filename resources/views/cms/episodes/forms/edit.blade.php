@extends('cms.layouts.app')

@section('content')

<style>
  .nav-tabs > li > a {
    color: #555555;
  }

  .nav-tabs > li > a:hover, .nav-tabs > li > a:focus {
    background-color: #e6e6e6;
    color: #676a6c;
}

  .nav-tabs > li.active > a, .nav-tabs > li.active > a:hover,
  .nav-tabs > li.active > a:focus {
    background-color: #e6e6e6;
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
