<table id="myTable" class="table table-hover">
  <thead>
    <th>No.</th>
    <th>Category</th>
    <th>Title</th>
    <th>Day</th>
    <th>Time</th>
    <th>Channel</th>
    <th>Action</th>
  </thead>
  <tbody>
    @foreach($series as $ser)
    <tr class="{{($loop->index % 2 == 0) ? 'active' : ''}}">
      <td>{{$loop->iteration}}</td>
      <td>{{$ser->seriesCategory->name}}</td>
      <td>{{$ser->title}}</td>
      <td>{{$ser->day}}</td>
      <td>{{$ser->time}}</td>
      <td>{{$ser->channel}}</td>
      <td>
        <div class="btn-group">
          <a class="btn btn-warning" title="edit series"
           href="{{route('series.edit', ['series' => $ser->id])}}">
            <span class="fa fa-pencil"></span>
          </a>
          <button class="btn btn-danger" title="delete series"
            onclick="showDeleteModal({{$ser}})">
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
  $("#confirmation_text").text("Delete " + model.title);
  model_id = model.id;
}

function deleteSeries()
{
  $.ajax({
    type: 'delete',
    url: '/series/' + model_id,
    success: function(table) {
      $(".my_loader").fadeOut(0);
      $(".btn-primary").prop("disabled", false);
      closeModal("delete_confirmation_modal");

      $("#seriesTable").html(table);
      $("#success-alert").text("Category Deleted Successfully");
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
