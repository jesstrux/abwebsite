@extends('layouts.app')

@section('styles')
	<link href="{{asset('css/home.css')}}" rel="stylesheet">
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
								<img src="{{asset('images/blog'.($i+1).'.jpg')}}" alt="">
							</div>
							<h3>{{$blog}}</h3>
							<a href="#">Read More</a>
						</div>
					@endfor
				</div>
			</div>
			<div>
				<h2>RADIO SHOW</h2>

				<div class="video" style="position: relative; height:375px">
					<iframe width="100%" height="100%" scrolling="no" frameborder="no" allow="autoplay" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/users/38128127&amp;color=%23ff5500&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=false&amp;show_reposts=false&amp;show_teaser=true&amp;visual=true"></iframe>
				</div>
			</div>
		</div>
	</div>
@endsection