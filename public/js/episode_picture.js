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
