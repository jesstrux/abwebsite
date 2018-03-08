@extends('cms.layouts.app')

@section('content')

@include('cms.modals.confirmation_modal',
  ['id' => 'delete_confirmation_modal',
  'title' => 'Confirm',
  'text' =>  'You are about to delete this series!',
  'action' => 'Confirm',
  'function' => 'deleteSeries()',])

@include('cms.alerts.success-alert')

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 style="font-weight: bold; color: #337ab7;" class="pull-left">
      Series: </h3>
     <a href="{{ route('series.create') }}" class="pull-right"
      title="add series">
       <i class="fa fa-plus-circle fa-2x text-primary" style="cursor: pointer;"></i>
     </a>
     <div class="clearfix"></div>
  </div>
  <div class="panel-body">
    <div id="seriesTable" class="table-responsive">
    <table id="myTable" class="table table-hover">
      <thead>
        <th>No.</th>
        <th>Title</th>
        <th>Category</th>
        <th>Day</th>
        <th>Time</th>
        <th>Channel</th>
        <th>Action</th>
      </thead>
      <tbody>
        @foreach($series as $ser)
        <tr class="{{($loop->index % 2 == 0) ? 'active' : ''}}">
          <td>{{$loop->iteration}}</td>
          <td>{{$ser->title}}</td>
          <td>{{$ser->seriesCategory->name}}</td>
          <td>{{$ser->day}}</td>
          <td>{{$ser->air_time}}</td>
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
  </div>
</div>
</div>

<script>
var model_id = null;

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
      $("#success-alert").text("Series Deleted Successfully");
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
