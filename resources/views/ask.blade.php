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
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. In non odit qui quisquam. Accusantium architecto autem cupiditate dicta dolore doloribus ducimus
					<span class="for-lg">eligendi enim eum, facere fuga illum ipsa itaque laborum magni nemo non perspiciatis placeat quae quaerat quam quis quo reiciendis rem repellat suscipit tenetur ut vel veniam vitae voluptas.</span>
				</p>
			</div>

			<menu class="layout center-justified for-lg">
				<button onclick="changeCategory(event, 0)" class="text-bold cat-switcher active">ALL</button>
				@foreach($categories as $category)
					<button onclick="changeCategory(event, {{$loop->iteration}})" class="cat-switcher text-bold">{{$category}}</button>
				@endforeach
			</menu>

			<div class="layout center-center">
				<p id="catLabel">Filter Answers:</p>&emsp;

				<select id="catPicker" class="for-mob">
					<option value="0">ALL</option>
					@foreach($categories as $category)
						<option value="{{$loop->iteration}})">{{$category}}</option>
					@endforeach
				</select>
			</div>

			<div id="answers" class="all grid">
				@foreach($answers as $answer)
					<a href="https://www.youtube.com/watch?v={{$answer['yt_id']}}" class="answer">
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

			<button id="askBtn" class="for-mob hide">
				<span>ASK A QUESTION</span>
			</button>
		</div>

		<button id="askFab" class="for-mob">
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/></svg>
		</button>
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

        var $ask_btn    = $('#askBtn'),
            $ask_fab    = $('#askFab');


        function navSlide() {
//            var scroll_top = $ask_btn.offset().top - window.innerHeight - $(window).scrollTop();
            var scroll_top = $(window).scrollTop();
            var diff = ($ask_btn.offset().top + $ask_btn.height()) - (window.innerHeight + scroll_top);

            if(diff <= -33){
                $ask_fab.addClass('hide');
                $ask_btn.removeClass('hide');
			}else{
                $ask_fab.removeClass('hide');
                $ask_btn.addClass('hide');
			}
        }

        $(window).scroll(navSlide);
	</script>
@endsection