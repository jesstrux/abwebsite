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

    <script>
      $(function ()
      {
        $("#upload-button").click( function() {
          $(":file").click();
        });

        $(":file").change( function() {
          upload();
        })
      });

      function upload()
      {
        $("#spinner").fadeIn(0);

        var user_avatar = document.querySelector('#abella-avatar');

        var preview = document.querySelector('.abella-avatar');

        var original_src = preview.src;

        preview.style.opacity = "0.3";

        var file = document.getElementById('profile_picture').files[0];

        if (file) {
          var reader  = new FileReader();
          reader.onload = function () {
            preview.src = reader.result;
          }
          reader.readAsDataURL(file);
        }

        var formData =  new FormData();
        formData.append('profile_picture', file);
        var link = '/admin/profile_picture';

        $.ajax({
          type: 'post',
          url:  link,
          data: formData,
          contentType: false,
          processData: false,
          success: function (){
            $("#spinner").fadeOut(0);
            preview.style.opacity = "1";
            user_avatar.src = preview.src; //update the user's avatar
          },
          error: function(error) {
            data = JSON.parse(error.responseText);
            displayErrors(data.errors);
            $("#spinner").fadeOut(0);
            preview.src = original_src; //restore the previous image
            preview.style.opacity = "1";
          }
        });
      }

      function displayErrors(errors)
      {
        if(errors.profile_picture != null) {
          $("#picture-error").text(errors.profile_picture);
          $("#picture-error").fadeIn(0, function() {
            $("#picture-error").fadeOut(1800);
            $("#picture-error").text("");
          });
        }
      }
    </script>

  </div>
</div>
@endsection
