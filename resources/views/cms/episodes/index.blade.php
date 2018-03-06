@extends('cms.layouts.app')

@section('content')

@include('cms.modals.confirmation_modal',
  ['id' => 'delete_confirmation_modal',
  'title' => 'Confirm',
  'text' =>  'You are about to delete this episode!',
  'action' => 'Confirm',
  'function' => 'deleteEpisode()',])

@include('cms.alerts.success-alert')

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 style="font-weight: bold; color: #337ab7;" class="pull-left">
      Episodes: </h3>
     <a href="{{ route('episodes.create') }}" class="pull-right"
      title="add episode">
       <i class="fa fa-plus-circle fa-2x text-primary" style="cursor: pointer;"></i>
     </a>
     <div class="clearfix"></div>
  </div>
  <div class="panel-body">
    <div id="seriesCategoriesTable" class="table-responsive">
    <table id="myTable" class="table table-hover">
      <thead>
        <th>No.</th>
        <th>Title</th>
        {{--<th>Series</th>
        <th>Category</th>--}}
        <th>Date Aired</th>
        <th>Youtube-ID</th>
        <th>Action</th>
      </thead>
      <tbody>
        @foreach($episodes as $episode)
        <tr class="{{($loop->index % 2 == 0) ? 'active' : ''}}">
          <td>{{$loop->iteration}}</td>
          <td>{{ str_limit($episode->title, 20) }}</td>
          {{--<td>{{$episode->series->title}}</td>
          <td>{{$episode->category->name}}</td>--}}
          <td>{{$episode->date_aired}}</td>
          <td>{{$episode->youtube_id}}</td>
          <td>
            <div class="btn-group">
              <a class="btn btn-warning" title="edit episode"
               href="{{route('episodes.edit', ['episode' => $episode->id])}}">
                <span class="fa fa-pencil"></span>
              </a>
              <button class="btn btn-danger" title="delete episode"
                onclick="showDeleteModal({{$episode}})">
                <span class="fa fa-trash-o"></span>
              </button>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
</div>

<script>
var model_id = null;

function showDeleteModal(model)
{
  showModal("delete_confirmation_modal");
  // $("#confirmation_text").text("Delete " + model.title);
  model_id = model.id;
}

function deleteEpisode()
{
  $.ajax({
    type: 'delete',
    url: '/episodes/' + model_id,
    success: function(table) {
      $(".my_loader").fadeOut(0);
      $(".btn-primary").prop("disabled", false);
      closeModal("delete_confirmation_modal");

      $("#seriesCategoriesTable").html(table);
      $("#success-alert").text("Episode Deleted Successfully");
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
@endsection
