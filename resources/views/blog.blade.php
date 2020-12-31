@extends('layouts.app')

@section('title','Electro Home')
@section('customlink')
<link rel="stylesheet" type="text/css" href="{{ asset('public/front/styles/blog_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/front/styles/blog_responsive.css') }}">
@endsection
@section('content')
<!-- Home -->
<div class="home">
	<div class="home_background parallax-window" data-parallax="scroll" data-image-src="images/shop_background.jpg"></div>
	<div class="home_overlay"></div>
	<div class="home_content d-flex flex-column align-items-center justify-content-center">
		<h2 class="home_title">Technological Blog 
			
		</h2>
	</div>
</div>
<!-- Blog -->

<div class="blog">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="blog_posts d-flex flex-row align-items-start justify-content-between">

					
					<!-- Blog post -->
					@foreach($blogpost as $data)

					<div class="blog_post">
						<h4 class="ml-3 mt-1 mb-1">
							@if(Session::get('lang') == 'english')
							{{ $data->postcategory->cate_name }}
							@else
							{{ $data->postcategory->cate_name_bn }}
							@endif

						</h4>
						<div class="blog_image" ><img src="{{ asset('storage/app/public/'.$data->image) }}"></div>
						<div class="blog_text">
							@if(Session::get('lang') == 'english')
							<h4>{!! Str::words( $data->title, '6','...') !!}</h4>
							@else
							<h4>{!! Str::words( $data->title_bn, '6','...') !!}</h4>
							@endif
							@if(Session::get('lang') == 'english')
							{!! Str::words( $data->description, '20','...') !!}
							@else
							{!! Str::words( $data->description_bn, '20','...') !!}					
							@endif
						</div>
						<div class="blog_button"><a href="{{ URL::to('/blog/blogsingle/'.$data->id) }}">Continue Reading</a></div>
					</div>
					@endforeach
					
				</div>
			</div>
				
		</div>
	</div>
</div>
@endsection

@section('customscript')
<script src="{{ asset('public/front/plugins/parallax-js-master/parallax.min.js') }}"></script>
<script src="{{ asset('public/front/js/blog_custom.js') }}"></script>
@endsection