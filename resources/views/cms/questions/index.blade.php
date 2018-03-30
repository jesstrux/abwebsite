@extends('cms.layouts.app')

@section('content')


<filters
  :filter="filter"
  :categories="{{ $categories }}"
  @filter-clicked="onFilterClicked">
</filters>

<questions
 :questions="questions">
</questions>


@endsection

@section('scripts')
<script>
  app.setAllQuestions({!! $questions !!});
</script>
@endsection
