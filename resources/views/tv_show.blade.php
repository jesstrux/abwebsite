@extends('layouts.app')

@section('styles')
	<link href="{{asset('css/tv_show.css')}}" rel="stylesheet">
@endsection

@section('content')
	@include('layouts.banner')

	<div id="showBanner" class="for-mob layout center-center">
		{{strtoupper($show['title'])}}
	</div>

	<div id="sectionAbout">
		<div class="section-wrapper">
			<h2 class="text-bold">ABOUT {{strtoupper($show['title'])}} TV SHOW</h2>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
				veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,
				consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.
			</p>

			<span class="bubble text-bold">
				ON {{strtoupper($show['tv'])}}
			</span>
			<span class="bubble text-bold">{{strtoupper($show['day'])}}S @ {{strtoupper($show['time'])}}</span>
		</div>
	</div>

	<div id="episodesPointer" class="layout vertical center text-bold">
		EPISODES
		<i class="fa fa-chevron-down"></i>
	</div>

	<div class="grid">

		<p style="color: #fff">{{count($episodes)}}</p>

		@if(count($episodes) == 0)
			<p>Episodes for {{$show['title]}} coming soon. Stay alert.</p>
		@else
			@foreach($episodes as $episode)
				<a href="{{url('/show/'. $show['id'] . '/'.$loop->iteration)}}" class="episode">
					<div class="image">
						<img src="https://i.ytimg.com/vi/{{$episode['yt_id']}}/maxresdefault.jpg" alt="">
						<div class="scrim layout center-center">
							<i class="fa fa-youtube-play"></i>
						</div>
					</div>
					<div class="text layout vertical end-justified">
						<h3>{{$episode['title']}}</h3>
						<p class="text-bold">Aired on :&nbsp;<span>{{$episode['date']}}</span></p>
					</div>
				</a>
			@endforeach
		@endif
	</div>
@endsection