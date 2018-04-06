var model_id = null;

$(function() {
  $("#question_category_id").tagsinput({
      typeaheadjs: {
        source: ['Amsterdam', 'Washington', 'Sydney', 'Beijing', 'Cairo']
      }
  });
});

function showDeleteModal(model)
{
  showModal("delete_confirmation_modal");
  model_id = model.id;
}

function deleteAnswer()
{
  document.getElementById('delete' + model_id).submit();
  // $.ajax({
  //   type: 'delete',
  //   url: '/answers/' + model_id,
  //   success: function(table) {
  //     $(".my_loader").fadeOut(0);
  //     $(".btn-primary").prop("disabled", false);
  //     closeModal("delete_confirmation_modal");
  //
  //     $("#answersTable").html(table);
  //     $("#success-alert").text("Answer Deleted Successfully");
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
