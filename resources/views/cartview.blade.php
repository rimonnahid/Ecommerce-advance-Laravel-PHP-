
@extends('layouts.app')

@section('title','Electro Store')
@section('customlink')
{{-- Shop Product link --}}


<link rel="stylesheet" type="text/css" href="{{ asset('public/front/styles/cart_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/front/styles/cart_responsive.css') }}">

@endsection

@section('content')
	<!-- Cart -->

	<div class="cart_section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="cart_container">
						<div class="cart_title">Shopping Cart</div>
						<div class="cart_items">
							<div class="card" style="box-shadow:3px rgba(0,0,0,0.5);">
								<div class="card-header">
									Shopping Cart
								</div>
								<div class="card-body">
									<table class="table table-bordered">
										<tr>
											<th>Image</th>
											<th>Name</th>
											<th>Color</th>
											<th>Quantity</th>
											<th>Price</th>
											<th>Total</th>
											<th>Action</th>
										</tr>

										@foreach($viewcarts as $data)
										<tr>
											<td><?php foreach(array(json_decode($data->options->image)) as $image){?>
                                    			<img src="{{ asset('public/file/'.$image[0]) }}" height="50px">
                                   				 <?php }?>
                                			</td>
											<td>{{ $data->name }}</td>
											<td>{{ $data->options->color }}</td>
											<td><form action="{{ url('/cartupdate/'.$data->rowId) }}" method="POST">
													@csrf
													<input type="number" name="qty" value="{{ $data->qty }}" class="form-control-sm" style="width:70px; float:left;">
													<button type="submit" class="btn-sm">+</button>
												</form>
											</td>
											<td>৳{{ $data->price }}</td>
											<td>৳{{ $data->qty * $data->price }}</td>
											<td><a class="btn btn-sm btn-danger" href="{{ route('cart.delete',$data->rowId) }}"><i class="fas fa-trash-alt"></i></a>
											</td>
										</tr>

										@endforeach

						
									<!-- Order Total -->
										<tr>
											<td colspan="5" class="text-right font-weight-bold">Order Total = </td>
											<td>৳{{ Cart::subtotal() }}</td>
											<td></td>
										</tr>
									</table>
								</div>
							</div>
						</div>
						<div class="cart_buttons">
							<button type="button" class="button cart_button_clear">Add to Cart</button>
							{{-- @if(!$userdetails) --}}
							<a href="{{ URL::to('/checkout/') }}" type="button" class="button cart_button_checkout">Chackout</a>
							{{-- @else
							@if(!$userdetails->phone)
							<a href="{{ URL::to('/checkoutedit/') }}" type="button" class="button cart_button_checkout">Chackout</a>
							@else
							<a href="{{ URL::to('/checkoutview/') }}" type="button" class="button cart_button_checkout">Chackoutview</a>
							@endif
							@endif --}}

							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Newsletter -->

	<div class="newsletter">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="newsletter_container d-flex flex-lg-row flex-column align-items-lg-center align-items-center justify-content-lg-start justify-content-center">
						<div class="newsletter_title_container">
							<div class="newsletter_icon"><img src="images/send.png" alt=""></div>
							<div class="newsletter_title">Sign up for Newsletter</div>
							<div class="newsletter_text"><p>...and receive %20 coupon for first shopping.</p></div>
						</div>
						<div class="newsletter_content clearfix">
							<form action="#" class="newsletter_form">
								<input type="email" class="newsletter_input" required="required" placeholder="Enter your email address">
								<button class="newsletter_button">Subscribe</button>
							</form>
							<div class="newsletter_unsubscribe_link"><a href="#">unsubscribe</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection



@section('customscript')

<script src="{{ asset('public/front/js/cart_custom.js') }}"></script>

@endsection



