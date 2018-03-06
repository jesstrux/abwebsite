@extends('layouts.app')

@section('styles')
	<link href="{{asset('css/ask.css')}}" rel="stylesheet">
	<style>
		.alert {
			padding: 15px;
			margin-bottom: 20px;
			border: 1px solid transparent;
			border-radius: 4px;
		}
    .alert-danger {
			color: #a94442;
	    background-color: #f2dede;
	    border-color: #ebccd1;
		}
		.alert-dismissable, .alert-dismissible {
		    padding-right: 35px;
		}
		.close {
	    float: right;
	    font-size: 21px;
	    font-weight: 700;
	    line-height: 1;
	    color: #000;
	    text-shadow: 0 1px 0 #fff;
	    filter: alpha(opacity=20);
	    opacity: .2;
	  }
  </style>
@endsection

@section('content')
	<script>
		$(function() {

			$("#askForm").find('input, textarea').each( function() {
	       $(this).keydown( function() {
					 $("#question-errors").fadeOut(0);
				 });
	    });

			$("#question_category").val("{{ old('question_category_id') }}");

			$("#question-textarea").val("{{ old('question') }}");

		});
	</script>
	<section id="sectionBanner">
		<div class="section-wrapper layout center end-justified">
			<div id="askForm">

				@if ($errors->any())
			    <div class="alert alert-danger" style="display: inline-block;"
						id="question-errors">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
				@endif

				<div style="display: inline-block;">
					<div id="flash">
						@include('flash::message')
					</div>
					<script>
						$("#flash").fadeOut(2500);
					</script>
				</div>

				<form action="{{ route('questions.store') }}" method="post">

					{{ csrf_field() }}

					<p>
						<label for="">FULL NAME</label>
						<input type="text" name="name" value="{{ old('name') }}"
							required>
					</p>
					<p>
						<label for="">EMAIL ADDRESS</label>
						<input type="text" name="email" value="{{ old('email') }}"
							required>
					</p>
					<p>
						<label for="">QUESTION CATEGORY</label>
						<select name="question_category_id" id="question_category" required>
							@foreach($categories as $category)
								<option value="{{$loop->iteration}}">{{$category}}</option>
							@endforeach
						</select>
					</p>
					<p>
						<label for="">YOUR QUESTION</label>
						<textarea name="question" id="question-textarea" rows="5" required></textarea>
					</p>
					<p>
						<button type="submit" class="btn block">SUBMIT</button>
					</p>
			  </form>
			</div>
		</div>
	</section>

	<div id="sectionAnswers">
		<div class="section-wrapper">
			<div id="text" class="text-center">
				<h2>Answered Questions</h2>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. In non odit qui quisquam. Accusantium architecto autem cupiditate dicta dolore doloribus ducimus eligendi enim eum, facere fuga illum ipsa itaque laborum magni nemo non perspiciatis placeat quae quaerat quam quis quo reiciendis rem repellat suscipit tenetur ut vel veniam vitae voluptas.
				</p>
			</div>

			<menu class="layout center-justified">
				<button onclick="changeCategory(event, 0)" class="text-bold cat-switcher active">ALL</button>
				@foreach($categories as $category)
					<button onclick="changeCategory(event, {{$loop->iteration}})" class="cat-switcher text-bold">{{$category}}</button>
				@endforeach
			</menu>

			<div id="answers" class="all">
				@foreach($answers as $answer)
					<a href="{{url('answer/'.$answer['yt_id'])}}" class="answer">
						<div class="image">
							<iframe width="100%" height="100%" src="https://www.youtube.com/embed/{{$answer['yt_id']}}?rel=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
						</div>
						<div class="text">
							<p class="text-bold">
								<span>Category :&nbsp;</span> {{$answer['category']}}
							</p>
							<h5>
								Why do we make a big deal out of everything we do in the field of technology, why not just base it all on a whim?
							</h5>
						</div>
					</a>
				@endforeach
			</div>
		</div>
	</div>

	<script>
		var answers = document.querySelector("#answers");
		function changeCategory(e, cat) {
			if(cat === 0){
			    answers.classList.add('all');
			}else{
                answers.classList.remove('all');
			}

			document.querySelector('.cat-switcher.active').classList.remove('active');
			e.target.classList.add('active');
        }
	</script>
@endsection
