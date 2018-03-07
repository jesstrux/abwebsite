@extends('cms.layouts.app')

@section('scripts')
 <script src="{{asset('js/cms_questions.js')}}"></script>
@endsection

@section('content')
<link rel="stylesheet" href="{{asset('css/cms_questions.css')}}">

<div id="myBtnContainer">
  <button class="btn active" onclick="filterSelection('all')">All</button>
  @foreach($categories as $category)
    <button class="btn active"
      onclick="filterSelection('{{$category->name}}')">
      <span style="text-transform: capitalize;">{{$category->name}}</span>
    </button>
  @endforeach
</div>

<div class="row">
  @foreach($categories as $category)
    @foreach($category->questions as $question)
      <div class="column {{$category->name}}">
        <div class="content">
          <p>{{$question->question}}</p>
        </div>
      </div>
    @endforeach
  @endforeach
</div>

@endsection
