$(function ()
{
  $(".alert-success").fadeOut(1500);

  $.ajaxSetup({
      headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  
});

function showModal(id)
{
  $('#' + id).modal({
    backdrop: 'static',
    keyboard: false,
    show: true
  });
}

function closeModal(id)
{
  $("#" + id).modal('hide');
  $('body').removeClass("modal-open");
  $('body').removeAttr('style');
  $(".modal-backdrop").remove();
}
