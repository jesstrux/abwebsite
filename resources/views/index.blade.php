@extends('layouts.app')

@section('styles')
	<link href="{{asset('css/home.css')}}" rel="stylesheet">
@endsection

@section('content')
	@include('layouts.banner')

	<div class="video-section">
		<div class="section-wrapper">
			<h2>BE INSPIRED</h2>
			<div class="grid">
				@for($i = 0; $i < 3; $i++)
					<?php $inspiration = $inspirations[$i];?>
					<div class="video">
						<div class="image">
							<img src="{{asset('images/cat'.($i+1).'.jpg')}}" alt="">
						</div>
						<h3>{{$inspiration['title']}}</h3>
						<p>{{$inspiration['subtitle']}}</p>
					</div>
				@endfor
			</div>
		</div>
	</div>

	<div class="video-section">
		<div class="section-wrapper">
			<h2>TV SHOWS</h2>
			<div class="grid">
				@for($i = 0; $i < 3; $i++)
                    <?php $show = $shows[$i];?>
					<div class="video">
						<div class="image">
							<img src="{{asset('images/show'.($i+1).'.jpg')}}" alt="">
						</div>
						<h3>{{$show['title']}}</h3>
						<p>{{$show['subtitle']}}</p>
					</div>
				@endfor
			</div>
		</div>
	</div>

	<div id="cta" class="layout vertical center-center">
		<h3>DO YOU HAVE ANY QUESTION?</h3>
		<a href="{{url('/ask')}}" class="btn">ASK ABELLA</a>
	</div>

	<div id="blogsRadio" class="video-section">
		<div class="section-wrapper layout">
			<div class="flex">
				<h2>RECENT BLOGS</h2>

				<div class="grid">
					@for($i = 0; $i < 2; $i++)
                        <?php $blog = $blogs[$i];?>
						<div class="video">
							<div class="image">
								<img src="{{asset('images/blog'.($i+1).'.jpg')}}" alt="" style="width: 110%; height: auto;">
							</div>
							<h3>{{$blog['title']}}</h3>
							<a href="{{$blog['url']}}" target="_blank">Read More</a>
						</div>
					@endfor
				</div>
			</div>
			<div>
				<h2>RADIO SHOW</h2>

				<div class="video" style="position: relative; height:375px">
					<iframe width="100%" height="100%" scrolling="no" frameborder="no" allow="autoplay"
							src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/playlists/444246510&color=%23ff5500&auto_play=false&hide_related=false&show_comments=false&show_user=false&show_reposts=false&show_teaser=true&visual=true"></iframe>
				</div>
			</div>
		</div>
	</div>
@endsection