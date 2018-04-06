@extends('cms.layouts.app')

@section('content')

@include('cms.modals.confirmation_modal',
  ['id' => 'delete_confirmation_modal',
  'title' => 'Confirm',
  'text' =>  'You are about to delete this product!',
  'action' => 'Confirm',
  'function' => 'deleteSeriesCategory()',])

@include('cms.alerts.success-alert')

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 style="font-weight: bold; color: #337ab7;" class="pull-left">
      Series Categories: </h3>
     <a href="{{ route('series_categories.create') }}" class="pull-right"
      title="add series category">
       <i class="fa fa-plus-circle fa-2x text-primary" style="cursor: pointer;"></i>
     </a>
     <div class="clearfix"></div>
  </div>
  <div class="panel-body">
    <div id="seriesCategoriesTable" class="table-responsive">
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
                <form

                    id="delete{{$category->id}}"

                    action="{{route('series_categories.destroy', ['seriesCategory' => $category->id])}}"

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
<script src="{{ asset('js/series_categories.js') }}"></script>
@endsection
