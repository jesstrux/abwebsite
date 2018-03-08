<table id="myTable" class="table table-hover">
  <thead>
    <th>No.</th>
    <th>Name</th>
    <th>Action</th>
  </thead>
  <tbody>
    @foreach($categories as $category)
    <tr class="{{($loop->index % 2 == 0) ? 'active' : ''}}">
      <td>{{$loop->iteration}}</td>
      <td>{{$category->name}}</td>
      <td>
        <div class="btn-group">
          <a class="btn btn-warning" title="edit category"
           href="{{route('series_categories.edit', ['seriesCategory' => $category->id])}}">
            <span class="fa fa-pencil"></span>
          </a>
          <button class="btn btn-danger" title="delete category"
            onclick="showDeleteModal({{$category}})">
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
  $("#confirmation_text").text("Delete " + model.name);
  model_id = model.id;
}

function deleteSeriesCategory()
{
  $.ajax({
    type: 'delete',
    url: '/series_categories/' + model_id,
    success: function(table) {
      $(".my_loader").fadeOut(0);
      $(".btn-primary").prop("disabled", false);
      closeModal("delete_confirmation_modal");

      $("#seriesCategoriesTable").html(table);
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
