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
    <div id="episodesTable" class="table-responsive">
    <table id="myTable" class="table table-hover">
      <thead>
        <th>No.</th>
        <th>Title</th>
        <th>Series</th>
        <th>Category</th>
        <th>Date Aired</th>
        <th>Youtube-ID</th>
        <th>Action</th>
      </thead>
      <tbody>
        @foreach($episodes as $episode)
        <tr class="{{($loop->index % 2 == 0) ? 'active' : ''}}">
          <td>{{ $loop->iteration }}</td>
          <td data-toggle="tooltip" title="{{ $episode->title }}">{{ $episode->titleSnippet }}</td>
          <td>{{ $episode->series->title }}</td>
          <td>{{ $episode->seriesCategory->name }}</td>
          <td>{{ $episode->date_aired }}</td>
          <td>{{ $episode->youtube_id }}</td>
          <td>
            <div class="btn-group">
              <a class="btn btn-warning" title="edit episode"
               href="{{route('episodes.edit', ['episode' => $episode->id])}}">
                <span class="fa fa-pencil"></span>
              </a>
              <button class="btn btn-danger" title="delete episode"
                onclick="showDeleteModal({{$episode}})">
                <span class="fa fa-trash-o"></span>
                <form

                    id="delete{{$episode->id}}"

                    action="{{route('episodes.destroy', ['episode' => $episode->id])}}"

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
<script src="{{ asset('js/episodes.js') }}"></script>
@endsection
