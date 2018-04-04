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

<empty-state></empty-state>

<questions-footer v-if="all_questions.length > 0"
  :num-pages="numPages"
  :cur-page="page">
</questions-footer>

@endsection

@section('scripts')
<script>
  app.setAllQuestions({!! $questions !!});
</script>
@endsection
