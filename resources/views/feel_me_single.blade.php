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
				<h2>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit.
				</h2>
				<p>
					Aired On: {{$episode['date']}}
				</p>

				<div id="comments">
					<h3>Comments</h3>
					<div id="myComment" class="comment layout" style="display: none;">
						<div class="image">
							<img src="" alt="">
						</div>
						<div class="text flex">
							<textarea data-autoresize rows="1" placeholder="Enter your comment here"></textarea>
							<div class="layout center end-justified">
								<button class="btn" disabled>SUBMIT</button>
							</div>
						</div>
					</div>

					<div id="commentList" style="display: none;">
						{{--<div class="comment layout"><div class="image"><img src="https://yt3.ggpht.com/-lBn5a69PZho/AAAAAAAAAAI/AAAAAAAAAAA/1SoJQ4rxoaU/s28-c-k-no-mo-rj-c0xffffff/photo.jpg"></div><div class="text flex"><h5>raphael mpilipili</h5><p>My coach my mentor James mwang'amba I real appreciate your expressions to dada tanx for the good questions </p></div></div><div class="comment layout"><div class="image"><img src="https://yt3.ggpht.com/-pesKrLIPCnA/AAAAAAAAAAI/AAAAAAAAAAA/IlyWK7z3Y34/s28-c-k-no-mo-rj-c0xffffff/photo.jpg"></div><div class="text flex"><h5>CATHERINE CLEMENCE</h5><p>i just luv her,and leroy god bless you</p></div></div><div class="comment layout"><div class="image"><img src="https://yt3.ggpht.com/-Hqp6rZWRgS8/AAAAAAAAAAI/AAAAAAAAAAA/jfikKpQHOrE/s28-c-k-no-mo-rj-c0xffffff/photo.jpg"></div><div class="text flex"><h5>nasib yusuf</h5><p>I love you Abella</p></div></div>--}}
					</div>
				</div>
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

	<script>
        var GoogleAuth;
        var session_user;

        function handleClientLoad() {
            gapi.load('client:auth2', initClient);
        }

        function initClient() {
            gapi.client.init({
                'clientId': '594273295551-rcm2necj3lss0dhsj0e253bqrco2vcpc.apps.googleusercontent.com',
                'discoveryDocs': ['https://www.googleapis.com/discovery/v1/apis/youtube/v3/rest'],
                'scope': 'https://www.googleapis.com/auth/youtube.force-ssl https://www.googleapis.com/auth/youtubepartner'
            }).then(function () {
                GoogleAuth = gapi.auth2.getAuthInstance();

                GoogleAuth.isSignedIn.listen(setSigninStatus());

                setSigninStatus();
            });
        }

        function setSigninStatus() {
            var user = GoogleAuth.currentUser.get();
            isAuthorized = user.hasGrantedScopes('https://www.googleapis.com/auth/youtube.force-ssl https://www.googleapis.com/auth/youtubepartner');

            if (isAuthorized) {
                var u = user.w3;
                session_user = {
                    name: u.ig,
                    image: u.Paa
                };

                //console.log("User was signed in, proceed from here");
                //console.log(session_user);

                var myComment = $("#myComment");
                myComment.find('img').attr('src', session_user.image);
                myComment.fadeIn();

                $("#comments").addClass('has-my-comment');
            }
        }

        jQuery.each(jQuery('textarea[data-autoresize]'), function() {
            var offset = this.offsetHeight - this.clientHeight;

            var resizeTextarea = function(el) {
                jQuery(el).css('height', 'auto').css('height', el.scrollHeight + offset);
            };
            jQuery(this).on('keyup input', function() { resizeTextarea(this); }).removeAttr('data-autoresize');
        });

        var VIDEO_ID = "{{$episode['yt_id']}}";
        var API_KEY = "AIzaSyDo1s4oyHPRoVtvzueC6SD6U1nY7D09Tlk";
        var channel_id = null;

        $.ajax({
            dataType: "jsonp",
            type: 'GET',
            url: "https://www.googleapis.com/youtube/v3/commentThreads?key="+API_KEY+"&textFormat=plainText&part=snippet&videoId="+VIDEO_ID,
            success: function(result){
//                return console.log(result);
                data = result;
                var comments = result.items;
                $.each(comments, function (key, c) {
                    var comment = c.snippet.topLevelComment.snippet;

                    var comment_html = "<div class='comment layout'><div class='image'><img src='"+comment.authorProfileImageUrl+"'></div><div class='text flex'><h5>"+comment.authorDisplayName+"</h5><p>"+comment.textDisplay+"</p></div></div>";
                    $('#commentList').append(comment_html);

                    if(channel_id === null){
                        channel_id = comment.authorChannelId.value;
                    }
                });

                $('#commentList').fadeIn();
                $("#comments").addClass('has-comments');
            }});
	</script>

	<script async defer src="https://apis.google.com/js/api.js"
			onload="this.onload=function(){};handleClientLoad()"
			onreadystatechange="if (this.readyState === 'complete') this.onload()">
@endsection