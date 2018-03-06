<div class="profile_picture">
    <img
        alt="image"
        class="img-thumbnail episode-picture"
        src="{{ $episode->picture }}" />
    <div class="file-input">
      <form>
        <input type="file" name="episode_picture" id="episode_picture">
      </form>
    </div>
    <div class="upload-div">
      <button type="button" id="upload-button" class="btn btn-primary">
        <i class="fa fa-upload"></i>
        Change
      </button>
    </div>
    <div class="pictureSpinner" style="display: none" id="spinner">
      <i class="fa fa-spinner fa-spin fa-3x fa-fw text-primary"
        style="display: none;"></i>
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

    var preview = document.querySelector('.episode-picture');

    var original_src = preview.src;

    preview.style.opacity = "0.3";

    var file = document.getElementById('episode_picture').files[0];

    if (file) {
      var reader  = new FileReader();
      reader.onload = function () {
        preview.src = reader.result;
      }
      reader.readAsDataURL(file);
    }

    var formData =  new FormData();
    formData.append('episode_picture', file);
    var link = '/admin/episode_picture/' + '{{ $episode->id }}';

    $.ajax({
      type: 'post',
      url:  link,
      data: formData,
      contentType: false,
      processData: false,
      success: function (){
        $("#spinner").fadeOut(0);
        preview.style.opacity = "1";
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
    if(errors.episode_picture != null) {
      $("#picture-error").text(errors.episode_picture);
      $("#picture-error").fadeIn(0, function() {
        $("#picture-error").fadeOut(1800);
        $("#picture-error").text("");
      });
    }
  }
</script>