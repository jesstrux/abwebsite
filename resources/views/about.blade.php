@extends('layouts.app')

@section('styles')
	<link href="{{asset('css/about.css')}}" rel="stylesheet">
@endsection

@section('content')
	<section id="sectionBanner">
		<div class="section-wrapper layout center">
			<q>
				I <strong>ADD</strong> A SMILE TO <span class="fo-lg"><br></span>
				<strong>EVERYTHING</strong> I <span class="fo-lg"><br></span>
				<strong>WEAR</strong> AND THAT <span class="fo-lg"><br></span>
				HAS <strong>WORKED</strong> <span class="fo-lg"><br></span>
				GREAT FOR <strong>ME</strong>.
			</q>
		</div>
	</section>

	<section id="sectionAbout">
		<div class="section-wrapper">
			<h2 class="text-bold">ABOUT ABELLA.</h2>
			<p>
				Abella Bateyunga is a Tanzanian social entrepreneur, media personality, life coach, public and transformational speaker. She has led
				and mentored a number of young Africans in various leadership and career successful path, she also continues to cou
				nsel many Tanzanian fellows who go through various challenged of life. Abella shares a great passion for inspiring others to live to
				their fullest potential, and she honestly feels best when inspiring others to be their best.
			</p>
			<p>
				Abella’s main purpose for her various media program is filled with the intention of inspiring as many people as possible, and she
				works passionately every day to fulfill this intention through the thoughts and ideas she shares in her various platforms. She collects
				various short, concise tips and reflections on the little things that make a huge difference in our daily lives through various testimonials
				and call for help that come from various individuals and leaders of societies.
			</p>
		</div>
	</section>

	<section id="lifeDriveImage">
		<div class="section-wrapper layout center end-justified">
			<h3>Abella's 10 <span class="for-mob"><br></span> Life Drive.</h3>
		</div>
	</section>

	<section id="lifeDriveQuote" class="layout vertical center">
		<q class="text-center">
			The richest human isn’t the one who has the <span class="for-lg"><br/></span>
			most, but the one who needs less. Wealth is a <span class="for-lg"><br/></span>
			mindset. Want less and appreciate more today.
		</q>
		<span>- Abella</span>
	</section>

	<section class="section-wrapper">
		@foreach($lds as $ld)
			<div class="a-drive layout">
				<div class="image">
					<img src="{{asset('images/ld'.$loop->iteration.'.jpg')}}" alt="">
				</div>
				<div class="text">
					<h3 class="text-bold">{{$ld['title']}}</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam beatae eius eveniet illum molestiae
						perspiciatis quae sed vitae! Consequatur deleniti excepturi explicabo incidunt inventore odit
						perspiciatis veniam voluptate voluptatem voluptates?</p>
				</div>
			</div>
		@endforeach
	</section>
@endsection