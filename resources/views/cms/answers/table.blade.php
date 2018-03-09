<table id="myTable" class="table table-hover">
  <thead>
    <th>No.</th>
    <th>Title</th>
    <th>Categories</th>
    <th>Youtube-ID</th>
    <th>Action</th>
  </thead>
  <tbody>
    @foreach($answers as $answer)
    <tr class="{{($loop->index % 2 == 0) ? 'active' : ''}}">
      <td>{{$loop->iteration}}</td>
      <td>{{$answer->title}}</td>
      <td>{{$answer->categoriesSnippet}}</td>
      <td>{{$answer->youtube_id}}</td>
      <td>
        <div class="btn-group">
          <a class="btn btn-warning" title="edit series"
           href="{{route('answers.edit', ['series' => $answer->id])}}">
            <span class="fa fa-pencil"></span>
          </a>
          <button class="btn btn-danger" title="delete series"
            onclick="showDeleteModal({{$answer}})">
            <span class="fa fa-trash-o"></span>
          </button>
        </div>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

<script>
var model_id = null;

$(function ()
{

  $("#myTable").DataTable({
   iDisplayLength: 8,
   bLengthChange: false
 });

});

$(function ()
{

  $("#myTable").DataTable({
   iDisplayLength: 8,
   bLengthChange: false
 });

});

function showDeleteModal(model)
{
showModal("delete_confirmation_modal");
model_id = model.id;
}

function deleteAnswer()
{
$.ajax({
type: 'delete',
url: '/answers/' + model_id,
success: function(table) {
  $(".my_loader").fadeOut(0);
  $(".btn-primary").prop("disabled", false);
  closeModal("delete_confirmation_modal");

  $("#seriesTable").html(table);
  $("#success-alert").text("Answer Deleted Successfully");
  $("#success-alert").fadeIn(0, function() {
    $("#success-alert").fadeOut(1500);
  });
},
error: function(error) {
  $(".my_loader").fadeOut(0);
  $(".btn-primary").prop("disabled", false);
  console.log(error);
}
});
$(".btn-primary").prop("disabled", true);
$(".my_loader").fadeIn(0);
}
</script>
