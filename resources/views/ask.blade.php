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
				<a href="#categoryAll" class="text-bold active">ALL</a>
				@foreach($categories as $category)
					<a href="#category{{$category}}" class="text-bold">{{$category}}</a>
				@endforeach
			</menu>

			<div id="answers">
				@foreach($answers as $answer)
					<div class="answer">
						<div class="image">
							<div class="scrim layout center-center">
								<i class="fa fa-youtube-play"></i>
							</div>
						</div>
						<div class="text">
							<p class="text-bold">
								<span>Category :&nbsp;</span> {{$answer['category']}}
							</p>
							<h5>
								Why do we make a big deal out of everything we do in the field of technology, why not just base it all on a whim?
							</h5>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>
@endsection