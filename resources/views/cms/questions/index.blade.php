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

<empty-state :questions="questions"></empty-state>

<questions-footer v-if="questions.length > 0"
  :num-pages="numPages"
  :cur-page="page">
</questions-footer>

@endsection

@section('scripts')
<script>
  app.setAllQuestions({!! $questions !!});
</script>
@endsection
