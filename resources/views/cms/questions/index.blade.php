@extends('cms.layouts.app')

@section('content')

<style>
/* Style the buttons */
.filter {
  border: none;
  border-radius: 4px;
  outline: none;
  padding: 12px 16px;
  background-color: #1ab394;
  cursor: pointer;
  color: white;
}

/* Add a grey background color on mouse-over */
.filter:hover {
  background-color: #bbb;
  color: white;
}

/* Add a dark background color to the active button */
.filter.active {
 background-color: #f8ac59;
 color: white;
}

.question-row {
    margin: 8px -16px;
}

.btn-default {
  background-color: #e6e5e5;
}

/* Content */
.content {
  border-radius: 4px;
  background-color: white;
  height: 150px;
  overflow: hidden;
  padding: 8px;
}

 /*Add padding BETWEEN each column (if you want) */
.question-row,
.question-row > .column {
    padding: 8px;
}

/* Create three equal columns that floats next to each other */
.column {
  float: left;
  width: 33.33%;
  /*height: 200px;*/
  /*overflow: hidden;*/
  display: none; /* Hide columns by default */
}

.controls {
  border-radius: 4px;
  display: block;
  background-color: #fff;
}

/* Clear floats after question-rows */
.question-row:after {
    content: "";
    display: table;
    clear: both;
}

/* The "show" class is added to the filtered elements */
.show {
    display: block;
}
</style>

<script src="{{asset('js/cms_questions.js')}}"></script>

<div id="myFilters">
  <button class="filter active" onclick="filterSelection('all')" id="all-filter">
    All
  </button>
  @foreach($categories as $category)
    <button class="filter"
      onclick="filterSelection('{{$category->name}}')">
      <span style="text-transform: capitalize;">{{$category->name}}</span>
    </button>
  @endforeach
</div>

<div class="question-row">
  @foreach($categories as $category)
    @foreach($category->questions as $question)
      <div class="column {{$category->name}}">
        <div class="content">
          <h4 style="text-transform: capitalize;">{{$category->name}}</h4>
          <p>{{$question->questionSnippet}}</p>
        </div>
        <div class="controls">
          <button type="button" class="btn btn-default pull-right"
            style="margin: 0 5px 5px;">Archive</button>
          <button type="button" class="btn btn-default pull-right"
           style="margin-bottom: 5px;">View</button>
          <div class="clearfix"></div>
        </div>
      </div>
    @endforeach
  @endforeach
</div>

@endsection
