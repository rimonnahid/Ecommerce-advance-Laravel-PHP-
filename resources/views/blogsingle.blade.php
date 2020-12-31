@extends('layouts.app')

@section('title','Electro Home')
@section('customlink')
<link rel="stylesheet" type="text/css" href="{{ asset('public/front/styles/blog_single_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/front/styles/blog_single_responsive.css') }}">
@endsection
@section('content')
<!-- Home -->

<div class="home">
	<div class="home_background parallax-window" data-parallax="scroll" data-image-src="{{ asset('storage/app/public/'.$blogsingle->image) }}" data-speed="0.8"></div>
</div>
	<!-- Single Blog Post -->

	<div class="single_post">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2">
					<div class="single_post_title">
						@if(Session::get('lang') == 'english')
						{{ $blogsingle->title }}
						@else
						{{ $blogsingle->title_bn }}
						@endif


						@if(Session::get('lang') == 'bangla')
						<a href="{{ route('language.english') }}">English</a>
						@else
						<a href="{{ route('language.bangla') }}">Bangla</a>
						@endif</div>

					<div class="single_post_text">
						<p>
							@if(Session::get('lang') == 'english')
							{!! $blogsingle->description !!}
							@else
							{!! $blogsingle->description_bn !!}
							@endif

						</p>

						<div class="single_post_quote text-center">
							<div class="quote_image"><img src="images/quote.png" alt=""></div>
							<div class="quote_text">Quisque sagittis non ex eget vestibulum. Sed nec ultrices dui. Cras et sagittis erat. Maecenas pulvinar, turpis in dictum tincidunt, dolor nibh lacinia lacus.</div>
							<div class="quote_name">Liam Neeson</div>
						</div>

						<p>Praesent ac magna sed massa euismod congue vitae vitae risus. Nulla lorem augue, mollis non est et, eleifend elementum ante. Nunc id pharetra magna.  Praesent vel orci ornare, blandit mi sed, aliquet nisi. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. </p>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection

@section('customscript')
<script src="{{ asset('public/front/plugins/parallax-js-master/parallax.min.js') }}"></script>

<script src="{{ asset('public/front/js/blog_single_custom.js') }}"></script>
@endsection