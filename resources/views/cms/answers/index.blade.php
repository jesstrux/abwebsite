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
          <td data-toggle="tooltip" title="{{ $answer->title }}">
            {{$answer->titleSnippet}}
          </td>
          <td data-toggle="tooltip" title="{{ $answer->categories }}">
            {{$answer->categoriesSnippet}}
          </td>
          <td>{{$answer->youtube_id}}</td>
          <td>
            <div class="btn-group">
              <a class="btn btn-warning" title="edit answer"
               href="{{route('answers.edit', ['answer' => $answer->id])}}">
                <span class="fa fa-pencil"></span>
              </a>
              <button class="btn btn-danger" title="delete answer"
                onclick="showDeleteModal({{$answer}})">
                <span class="fa fa-trash-o"></span>
                <form

                    id="delete{{$answer->id}}"

                    action="{{route('answers.destroy', ['answer' => $answer->id])}}"

                    method="POST"

                    style="display: none;">

                    {{ csrf_field() }}

                    {{ method_field('DELETE') }}

                </form>
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

@endsection

@section('scripts')
<script src="{{ asset('js/answers.js') }}"></script>
@endsection
