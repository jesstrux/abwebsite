var model_id = null;

$(function()
{
  $('#air_time').timepicker({
      template: false,
      showInputs: false,
      minuteStep: 1
  });
});

function showDeleteModal(model)
{
  showModal("delete_confirmation_modal");
  $("#confirmation_text").text("Delete " + model.title);
  model_id = model.id;
}

function deleteSeries()
{
  document.getElementById('delete' + model_id).submit();
  // $.ajax({
  //   type: 'delete',
  //   url: '/series/' + model_id,
  //   success: function(table) {
  //     $(".my_loader").fadeOut(0);
  //     $(".btn-primary").prop("disabled", false);
  //     closeModal("delete_confirmation_modal");
  //
  //     $("#seriesTable").html(table);
  //     $("#success-alert").text("Series Deleted Successfully");
  //     $("#success-alert").fadeIn(0, function() {
  //       $("#success-alert").fadeOut(1500);
  //     });
  //   },
  //   error: function(error) {
  //     $(".my_loader").fadeOut(0);
  //     $(".btn-primary").prop("disabled", false);
  //     console.log(error);
  //   }
  // });
  // $(".btn-primary").prop("disabled", true);
  // $(".my_loader").fadeIn(0);
}
