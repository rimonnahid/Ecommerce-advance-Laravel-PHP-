@extends('layouts.app')

@section('title')
@section('customlink')
  <!-- Material Design Bootstrap -->
<link rel="stylesheet" type="text/css" href="{{ asset('public/front/styles/mdb.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/front/plugins/jquery-ui-1.12.1.custom/jquery-ui.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/front/styles/shop_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/front/styles/shop_responsive.css') }}">
@endsection

@section('content')
<!-- Home -->
<div class="home">
	<div class="home_background parallax-window" data-parallax="scroll" data-image-src="{{ asset('storage/app/public/'.$data->image) }}"></div>
	<div class="home_overlay"></div>
	<div class="home_content d-flex flex-column align-items-center justify-content-center">
		<h2 class="home_title">Profile of {{ Auth::user()->name }}</h2>
	</div>
</div>



		
<!---- Profile Image ---->
    <div class="shop">
        <div class="container">
            <div class="row" id="app">
                <div class="col-lg-4">
				<div class="grid images_3_of_2">
				@if($data->image)
					<div class="card">
						<img src="{{ asset('storage/app/public/'.$data->image) }}" class="img-fluid mt-2 mb-2">
					</div>
				@else
				@endif
				<center>
					<div class="btn-group mb-2 mt-3">
						{{-- Upload Image Model --}}

						@if(!$data->image)
						<!-- Upload Profile Picture -->
						<a href="#" type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
						  Upload Image
						</a>
						@else

						<!-- Change Profile Picture -->
						<a href="#" type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
						  Update Image
						</a>
						@endif

							<!-- Modal -->
							<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
							  <div class="modal-dialog modal-dialog-centered" role="document">
							    <div class="modal-content">
							    <form action="{{ url('/user/profile/'.Auth::user()->id) }}"  method="POST" enctype="multipart/form-data">
							      <div class="modal-header">
							        <h5 class="modal-title" id="exampleModalLongTitle">Select Your Image</h5>
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
							      </div>
							      <div class="modal-body">
							      	@csrf
							      	<input class="form-control" type="file" name="image" required>
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
							        <button  class="btn btn-primary">Update</button>
							      </div>
							  	</form>
							    </div>
							  </div>
							</div>


						{{-- User Details Button --}}


							@if(!$data->userdetail)
							<button @click="addInfo=true" class="btn btn-danger">new Information</button>
							@else
							<a href="{{ route('user/editinfo') }}" class="btn btn-danger">Update Information</a>
							@endif

						</div>
					</center>
					<div id="accordion">
					  <div class="card mb-3">
					    <div class="card-header" id="headingOne">
					      <h5 class="mb-0">
					        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
					          About {{ Auth::user()->name }}
					        </button>
					      </h5>
					    </div>

					    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
					      <div class="card-body">
					      	@if($data->userdetail)

					       	<table class="table">
					       		
					       		<tr>
					       			<th>E-mail</th>
					       			<td>{{ $data->email }}</td>
					       		</tr>
					       		<tr>
					       			<th>Profession</th>
					       			<td>{{ $data->userdetail->profession }}</td>
					       		</tr>
					       		<tr>
					       			<th>Phone</th>
					       			<td>{{ $data->userdetail->phone }}</td>
					       		</tr>
					       		<tr>
					       			<th>Birth Date</th>
					       			<td>{{ $data->userdetail->birthdate }}</td>
					       		</tr>
					       		<tr>
					       			<th>Country</th>
					       			<td>{{ $data->userdetail->country }}</td>
					       		</tr>
					       		<tr>
					       			<th>Address</th>
					       			<td>{{ $data->userdetail->address }}</td>
					       		</tr>
					       		<tr>
					       			<th>About</th>
					       			<td>{{ $data->userdetail->about }}</td>
					       		</tr>
					       		<tr>
					       			<th>Status</th>
					       			<td>{{ $data->userdetail->status }}</td>
					       		</tr>
					       		
					       	</table>
					       	@else
					       	<table class="table">
					       		
					       		<tr>
					       			<th>E-mail</th>
					       			<td>{{ $data->email }}</td>
					       		</tr>
					       	</table>
					      	@endif
					      	</div>
					    </div>
					</div>
					</div>
				</div>
			</div>



{{-- add information --}}
			
			<div v-if="addInfo" class="col-lg-8 single-right-left simpleCart_shelfItem">

				<div class="card">
					<div class="card-header bg-light">
						<h3 class="">Details of <span class="text text-danger"></span></h3>
					</div>
					<div class="card-body editform">
						<form action="{{ url('/user/addinfo') }}" method="POST" class="form-group">
							@csrf
							<!--Profession-->
			              	<div class="md-form mb-5">
			                	<input type="text" id="profession" name="profession" class="form-control" placeholder="">
			                	<label for="profession" class="">Profession</label>
			              	</div>

							

							<!--About-->
			              	<div class="md-form mb-5">
			                	<input type="text" id="about" name="about" class="form-control" placeholder="">
			                	<label for="About" class="">About</label>
			              	</div>

							<!--birthdate-->
			              	<div class="md-form mb-5">
			                	<input type="date" id="birtedate" name="birthdate" class="form-control" placeholder="">
			                	<label for="birtedate" class="">Birthdate</label>
			              	</div>

			              	<!--Nationality-->
			              	<label class="text text-secondary">Nationality</label>
							<select class="custom-select d-block w-100 mb-2 mt-2" name="nationality" placeholder="" style="border-right:none; border-left:none; border-top:none;">
								<option disabled>--Select a Option--</option>
								<option>Bangladeshi</option>
								<option>Foreign</option>
							</select>

							<!--Status-->
							<label class="text text-secondary">Status</label>
							<select class="custom-select d-block w-100 mb-2 mt-2" name="status" placeholder="" style="border-right:none; border-left:none; border-top:none;">
								<option disabled>--Select a Option--</option>
								<option value="1">Active</option>
								<option value="0">Inactive</option>
							</select>
							

							<input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
							<center><button class="btn btn-primary mt-2">Add New Information</button>
								@if(Auth::user()->password)
									<a href="{{ route('change.password') }}" class="btn btn-danger mt-2">Change Password</a>
								@endif
							</center>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- //Single Page -->
@endsection

@section('customscript')
  <!-- MDB core JavaScript -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/popper.min.js" integrity="sha256-O17BxFKtTt1tzzlkcYwgONw4K59H+r1iI8mSQXvSf5k=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="{{ asset('public/front/plugins/Isotope/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('public/front/plugins/jquery-ui-1.12.1.custom/jquery-ui.js') }}"></script>
<script src="{{ asset('public/front/plugins/parallax-js-master/parallax.min.js') }}"></script>
<script src="{{ asset('public/front/js/shop_custom.js') }}"></script>
<script src="{{ asset('public/front/js/vue.min.js') }}"></script>
<script>
	new Vue({
		el:"#app",
		data:{
			addInfo:false
		}
	})
</script>
@endsection