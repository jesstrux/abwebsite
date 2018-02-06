@extends('layouts.app')

@section('styles')
	<link href="{{asset('css/tv_show_single.css')}}" rel="stylesheet">
@endsection

@section('content')
	<div id="episodePage" class="section-wrapper">
		<div class="layout">
			<div id="curEpisode">
				<div id="youtubeVideo">
					<iframe width="100%" height="100%" src="https://www.youtube.com/embed/{{$episode['yt_id']}}?rel=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
				</div>
				<p>
					{{$episode['title']}}
				</p>
			</div>

			<div id="otherEpisodes" class="flex">
				<h3>OTHER EPISODES</h3>
				@foreach($other_episodes as $ep)
					@if($loop->index == $episode['id'])
						@continue
					@endif

					<a href="{{url('/feel_me/'. $show['id'] . '/'.$loop->iteration)}}" class="episode layout">
						<div class="image">
							<img src="{{asset('images/ld'.($loop->iteration+1).'.jpg')}}" alt="">
						</div>
						<div class="flex text layout vertical">
							<h5>{{str_limit($ep['title'], 40)}}</h5>
							<p class="text-bold">Aired on :&nbsp;<span>{{$ep['date']}}</span></p>
						</div>
					</a>
				@endforeach
			</div>
		</div>
	</div>
@endsection