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
