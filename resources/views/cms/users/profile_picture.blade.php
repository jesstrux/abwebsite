@extends('cms.layouts.app')

@section('content')

<div style="margin-bottom: 10px;">
  <a href="{{ route('admin.index') }}" class="btn btn-primary">
    <i class="fa fa-arrow-left"></i>
  </a>
</div>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 style="font-weight: bold; color: #337ab7;" class="pull-left">
      Update Profile Picture: </h3>
     <div class="clearfix"></div>
  </div>
  <div class="panel-body">
    <div class="profile_picture">
      <img
          alt="image"
          class="img-thumbnail abella-avatar"
          src="{{ Auth::user()->avatar }}" />
      <div class="file-input">
        <form>
          <input type="file" name="profile_picture" id="profile_picture">
        </form>
      </div>
      <div class="upload-div">
        <button type="button" id="upload-button" class="btn btn-primary">
          <i class="fa fa-upload"></i>
          Change
        </button>
      </div>
      <div class="pictureSpinner" style="display: none;" id="spinner">
        <i class="fa fa-spinner fa-spin fa-3x fa-fw text-primary"></i>
      </div>
    </div>

    <div style="text-align: center; margin: auto;">
      <p class="help-block">Hover to change</p>
      <p id="picture-error" class="text-danger" style="display:none;"></p>
    </div>

  </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/profile_picture.js') }}"></script>
@endsection
