@extends('layouts.app')

@section('styles')
	<link href="{{asset('css/tv_show.css')}}" rel="stylesheet">
@endsection

@section('content')
	<div id="sectionBanner" class="for-lg">
		<div class="section-wrappe layout justified center" style="position: relative; height: inherit; padding-right: 3em;">
			<img src="{{asset('images/heroimage.png')}}" alt="" height="100%">

			<div class="text-center" style="max-width: 400px; text-align: center; line-height: 1.3em">
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate doloremque excepturi mollitia odit optio voluptatibus.
			</div>

			<img src="{{asset('images/logo.png')}}" alt="" height="90%">
		</div>
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

	<div class="grid">
		@foreach($episodes as $episode)
			<div class="episode">
				<div class="image">
					<img src="{{asset('images/ld'.($loop->iteration+1).'.jpg')}}" alt="">
				</div>
				<div class="text layout vertical end-justified">
					<h3>{{$episode['title']}}</h3>
					<p class="text-bold">Aired on :&nbsp;<span>{{$episode['date']}}</span></p>
				</div>
			</div>
		@endforeach
	</div>
@endsection