@extends('cms.layouts.app')


@section('content')

@include('cms.modals.confirmation_modal',
  ['id' => 'delete_confirmation_modal',
  'title' => 'Confirm',
  'text' =>  'You are about to delete this answer!',
  'action' => 'Confirm',
  'function' => 'deleteAnswer()',])

@include('cms.alerts.success-alert')

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 style="font-weight: bold; color: #337ab7;" class="pull-left">
      Answers: </h3>
     <a href="{{ route('answers.create') }}" class="pull-right"
      title="add answer">
       <i class="fa fa-plus-circle fa-2x text-primary" style="cursor: pointer;"></i>
     </a>
     <div class="clearfix"></div>
  </div>
  <div class="panel-body">
    <div id="answersTable" class="table-responsive">
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
          <td>{{$answer->titleSnippet}}</td>
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
  </div>
</div>
</div>

<script>
var model_id = null;

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

@endsection
