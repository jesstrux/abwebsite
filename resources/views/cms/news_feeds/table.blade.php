<table id="myTable" class="table table-hover">
  <thead>
    <th>No.</th>
    <th>Title</th>
    <th>Youtube-ID</th>
    <th>Action</th>
  </thead>
  <tbody>
    @foreach($newsFeeds as $newsFeed)
    <tr class="{{($loop->index % 2 == 0) ? 'active' : ''}}">
      <td>{{ $loop->iteration }}</td>
      <td data-toggle="tooltip" title="{{ $newsFeed->title }}">{{ $newsFeed->titleSnippet }}</td>
      <td>{{ $newsFeed->youtube_id }}</td>
      <td>
        <div class="btn-group">
          <a class="btn btn-warning" title="edit news-feed"
           href="{{route('news_feeds.edit', ['newsFeed' => $newsFeed->id])}}">
            <span class="fa fa-pencil"></span>
          </a>
          <button class="btn btn-danger" title="delete news-feed"
            onclick="showDeleteModal({{$newsFeed}})">
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

function showDeleteModal(model)
{
  showModal("delete_confirmation_modal");
  model_id = model.id;
}

function deleteNewsFeed()
{
  $.ajax({
    type: 'delete',
    url: '/news_feeds/' + model_id,
    success: function(table) {
      $(".my_loader").fadeOut(0);
      $(".btn-primary").prop("disabled", false);
      closeModal("delete_confirmation_modal");

      $("#newsFeedsTable").html(table);
      $("#success-alert").text("NewsFeed Deleted Successfully");
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
