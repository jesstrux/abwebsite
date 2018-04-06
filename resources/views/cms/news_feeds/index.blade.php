@extends('cms.layouts.app')

@section('content')

@include('cms.modals.confirmation_modal',
  ['id' => 'delete_confirmation_modal',
  'title' => 'Confirm',
  'text' =>  'You are about to delete this news-feed!',
  'action' => 'Confirm',
  'function' => 'deleteNewsFeed()',])

@include('cms.alerts.success-alert')

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 style="font-weight: bold; color: #337ab7;" class="pull-left">
      NewsFeeds: </h3>
     <a href="{{ route('news_feeds.create') }}" class="pull-right"
      title="add news-feed">
       <i class="fa fa-plus-circle fa-2x text-primary" style="cursor: pointer;"></i>
     </a>
     <div class="clearfix"></div>
  </div>
  <div class="panel-body">
    <div id="newsFeedsTable" class="table-responsive">
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

                <form

                    id="delete{{$newsFeed->id}}"

                    action="{{route('news_feeds.destroy', ['newsFeed' => $newsFeed->id])}}"

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
<script src="{{ asset('js/news_feeds.js') }}"></script>
@endsection
