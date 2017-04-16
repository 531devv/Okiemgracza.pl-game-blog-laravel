@extends('vendor.main')
@section('title', '| Strona Główna')
@section('stylesheet')
<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<!-- bxSlider Javascript file -->
<script src="/js/jquery.bxslider.min.js"></script>
<!-- bxSlider CSS file -->
<link href="/css/jquery.bxslider.css" rel="stylesheet" />
<script type="text/javascript" src="http://ciasteczka.eu/cookiesEU-latest.min.js"></script>
<script type="text/javascript">

jQuery(document).ready(function(){
	jQuery.fn.cookiesEU();
});

</script>
@endsection
@section('content')
<!--banner-->
<script type="text/javascript">
	$(document).ready(function(){
		$('.bxslider').bxSlider({
		auto: true,
		autoControls: true,
    captions: true
		});
	});
</script>
<div class="row">
	<ul class="bxslider">
@foreach($posts_last_down as $post_image)
	<a href="{{route('blog.single', $post_image->slug)}}" class="fashion"><li>{{Html::image('/images/catalog/' . $post_image->id . '.jpg', '', array('class' => 'img-responsive sin-on', 'title' => '' . $post_image->title))}}</li></a>
@endforeach
	</ul>
</div>

		</div>
	</div>
	<!---info--->
		<div class="col-mn1">
			<div class="container">
					<div class="col-mn2">
						<h3>Czym jest okiemgracza.pl</h3>
						<p>Portal powstał w celach humorystycznych oraz..</p>
						<a class=" more-in" href="/about">Czytaj więcej</a>
				</div>
			</div>
		</div>
		<!---->
		<!---newsy--->
		<div class="blog">
				<div class="container">
						@foreach($posts_last_down as $post_news)
						<div class="single-inline">
								<div class="blog-to">
										<a href="{{route('blog.single', $post_news->slug)}}">{{Html::image('/images/catalog/' . $post_news->id . '.jpg', '', array('class' => 'img-responsive sin-on'))}}</a>
										<div class="blog-top">
												<div class="blog-left">
														<b>{{date("d", strtotime($post_news->created_at))}}</b>
														<span>{{date("m-y", strtotime($post_news->created_at))}}</span>
												</div>
												<div class="top-blog">
														<a class="fast" href="single.php">{{$post_news->title}}</a>
														<p>Napisany przez <a href="{{route('blog.single', $post_news->slug)}}">{{$post_news->author}}</a></p>
														<p class="sed">{{substr($post_news->text, 0, 600)}} {{strlen($post_news->text) > 100 ? "..." : ""}}</p>
														<a href="{{route('blog.single', $post_news->slug)}}" class="more">Czytaj więcej<span> </span></a>

												</div>
												<div class="clearfix"></div>
										</div>
								</div>
						</div>
					@endforeach
				</div>
		</div>
		<!---->
		<div class="featured">
			<div class="container">
				<div class="col-md-4 latest">
					<h4>Ostatnie</h4>
					@foreach($posts_last_down as $post_last_down)
					<div class="late">
						<a href="{{route('blog.single', $post_last_down->slug)}}" class="fashion">{{Html::image('/images/catalog/' . $post_last_down->id . 'avatar.jpg', '', array('class' => 'img-responsive sin-on'))}}</a>
						<div class="grid-product">
							<span>{{date("d/m/y", strtotime($post_last_down->created_at))}}</span>
							<p><a href="{{route('blog.single', $post_last_down->slug)}}">{{substr($post_last_down->text, 0, 70)}} {{strlen($post_last_down->text) > 50 ? "..." : ""}}</a></p>
							<a href="{{route('blog.single', $post_last_down->slug)}}">Czytaj dalej</a>
						</div>
					<div class="clearfix"> </div>
					</div>
				@endforeach
				</div>
				<div class="col-md-4 latest">
					<h4>Polecane</h4>
					@foreach($posts_recommended as $post_recommended)
					<div class="late">
							<a href="{{route('blog.single', $post_recommended->slug)}}" class="fashion">{{Html::image('/images/catalog/' . $post_recommended->id . 'avatar.jpg', '', array('class' => 'img-responsive sin-on'))}}</a>
						<div class="grid-product">
							<span>{{date("d/m/y", strtotime($post_recommended->created_at))}}</span>
								<p><a href="{{route('blog.single', $post_recommended->slug)}}">{{substr($post_recommended->text, 0, 70)}} {{strlen($post_recommended->text) > 50 ? "..." : ""}}</a></p>
							<a href="{{route('blog.single', $post_recommended->slug)}}">Czytaj dalej</a>
						</div>
					<div class="clearfix"> </div>
					</div>
				@endforeach
				</div>
				<div class="col-md-4 latest">
					<h4>Popularne</h4>
					@foreach($posts_popular as $post_popular)
						<div class="late">
								<a href="{{route('blog.single', $post_popular->slug)}}" class="fashion">{{Html::image('/images/catalog/' . $post_popular->id . 'avatar.jpg', '', array('class' => 'img-responsive sin-on'))}}</a>
							<div class="grid-product">
								<span>{{date("d/m/y", strtotime($post_popular->created_at))}}</span>
									<p><a href="{{route('blog.single', $post_popular->slug)}}">{{substr($post_popular->text, 0, 70)}} {{strlen($post_popular->text) > 50 ? "..." : ""}}</a></p>
								<a href="{{route('blog.single', $post_popular->slug)}}">Czytaj dalej</a>
							</div>
						<div class="clearfix"> </div>
						</div>
					@endforeach
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
@endsection
