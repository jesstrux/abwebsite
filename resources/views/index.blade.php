@extends('layouts.app')

@section('styles')
	<link href="{{asset('css/home.css')}}" rel="stylesheet">
@endsection

@section('content')
	<div id="sectionBanner" class="for-lg">
		<div class="section-wrapper layout justified center">
			<span>&nbsp;</span>
			<a id="mainLogo" href="{{url('/')}}">
				<img src="{{asset('images/logo.png')}}" alt="">
			</a>
		</div>
	</div>

	<div class="video-section">
		<div class="section-wrapper">
			<h2>BE INSPIRED</h2>
			<div class="grid">
				@for($i = 0; $i < 3; $i++)
					<div class="video">
						<div class="image">
							<img src="{{asset('images/image1.jpg')}}" alt="">
						</div>
						<h3>Nafsi Show</h3>
						<p>Jinsi ya kuishi maisha huru na kuacha kuridhisha watu.</p>
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
					<div class="video">
						<div class="image">
							<img src="{{asset('images/image1.jpg')}}" alt="">
						</div>
						<h3>Nafsi Show</h3>
						<p>Jinsi ya kuishi maisha huru na kuacha kuridhisha watu.</p>
					</div>
				@endfor
			</div>
		</div>
	</div>

	<div id="cta" class="layout vertical center-center">
		<h3>DO YOU HAVE ANY QUESTION?</h3>
		<button class="btn">ASK ABELLA</button>
	</div>

	<div class="video-section">
		<div class="section-wrapper">
			<h2>RECENT BLOGS</h2>

			<div class="grid">
				@for($i = 0; $i < 3; $i++)
					<div class="video">
						<div class="image">
							<img src="{{asset('images/image1.jpg')}}" alt="">
						</div>
						<h3>Nafsi Show</h3>
						<p>Jinsi ya kuishi maisha huru na kuacha kuridhisha watu.</p>
					</div>
				@endfor
			</div>
		</div>
	</div>
@endsection