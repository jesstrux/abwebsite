var model_id = null;

$(function()
{
  $('.datepicker').datepicker({
    format: "d M yyyy"
  });

  $("#seriesSelector").prop("disabled", true);
});

function categoryChanged()
{
  $(".select_loader").fadeIn(0);
  var selected_id = $("#categorySelector").val();
  if(selected_id != "" && selected_id != null) {
    var link = '/admin/series_categories/' + selected_id + '/series';
    $.getJSON(link)
     .done(function (series) {
       $(".select_loader").fadeOut(0);
       setUpSeries(series);
       $("#seriesSelector").prop("disabled", false);
     })
     .fail(function (error) {
       $(".select_loader").fadeOut(0);
     });
  }
  else {
    $(".select_loader").fadeOut(0);
  }
}

function setUpSeries(series)
{
  var mySelect = document.getElementById("seriesSelector");

  //Delete the all options
  $("#seriesSelector").find('option').remove();

  //Create the first (default) option
  var opt = document.createElement("option");
  opt.value= "";
  opt.innerHTML = "Choose Series";

  // then append it to the select element
  mySelect.appendChild(opt);

  //Create remaining elements
  for(i = 0; i < series.length; i++) {
     var opt = document.createElement("option");
     opt.value= series[i].id;
     opt.innerHTML = series[i].title;

     // then append it to the select element
     mySelect.appendChild(opt);
  }
}

function showDeleteModal(model)
{
  showModal("delete_confirmation_modal");
  model_id = model.id;
}

function deleteEpisode()
{
  document.getElementById('delete' + model_id).submit();
  // $.ajax({
  //   type: 'delete',
  //   url: '/episodes/' + model_id,
  //   success: function(table) {
  //     $(".my_loader").fadeOut(0);
  //     $(".btn-primary").prop("disabled", false);
  //     closeModal("delete_confirmation_modal");
  //
  //     $("#episodesTable").html(table);
  //     $("#success-alert").text("Episode Deleted Successfully");
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
