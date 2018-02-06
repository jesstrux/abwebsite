@extends('layouts.app')

@section('styles')
	<link href="{{asset('css/ask.css')}}" rel="stylesheet">
@endsection

@section('content')
	<section id="sectionBanner">
		<div class="section-wrapper layout center end-justified">
			<div id="askForm">
				<p>
					<label for="">FULL NAME</label>
					<input type="text">
				</p>
				<p>
					<label for="">EMAIL ADDRESS</label>
					<input type="text">
				</p>
				<p>
					<label for="">QUESTION CATEGORY</label>
					<select name="" id="">
						@foreach($categories as $category)
							<option value="{{$loop->iteration}}">{{$category}}</option>
						@endforeach
					</select>
				</p>
				<p>
					<label for="">YOUR QUESTION</label>
					<textarea name="" id="" rows="5"></textarea>
				</p>
				<p>
					<button type="submit" class="btn block">SUBMIT</button>
				</p>
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