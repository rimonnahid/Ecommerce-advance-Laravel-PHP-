@extends('layouts.app')

@section('title','Electro Home')
@section('customlink')
  <!-- Material Design Bootstrap -->
<link rel="stylesheet" type="text/css" href="{{ asset('public/front/styles/mdb.min.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('public/front/styles/shop_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/front/styles/shop_responsive.css') }}">
@endsection
@section('content')

  <!--Main layout-->
  <main class="mt-2 pt-1">
    <div class="container wow fadeIn">


      <!--Grid row-->
      <div class="row">

          @foreach($wishlists as $wishlist)
        <!--Grid column-->
        <div class="col-md-3 mb-4">

          <!-- Cart -->
          <ul class="list-group mb-3 z-depth-1">
            <div class="btn-group">
            <a href="{{ $wishlist->product->path()}}" class="btn btn-primary btn-block pl-0 pr-0" ><i class="fas fa-eye"></i></a>
            <a href="{{ route('wishlist.delete',$wishlist->id) }}" class="btn btn-danger btn-block" ><i class="fas fa-trash"></i></a>
              
            </div>

            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <?php foreach(array(json_decode($wishlist->product->image)) as $image) {?>
              <img src="{{ asset('public/file/'.$image[0]) }}" height="200px" width="100%">
              <?php }?>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed" style=" padding: 5px 20px;">
              <div>
                <strong class="my-0 text-muted">‎<i class="fas fa-shopping-cart " style="margin-right: 5px; font-weight: 0px; font-size: 13px;"></i>{{ $wishlist->Product->name }}</strong>
              </div>
              <span class="text-muted" style="text-align:left;">‎</span>

            </li>
            <li class="list-group-item d-flex justify-content-between pb-0">
              <span  class="text-muted">Color</span>
              <strong>‎{{ $wishlist->product->color }}
              </strong>
            </li>

            <li class="list-group-item d-flex justify-content-between pb-0">
              <span class="text-muted">Price</span>
              <strong>‎৳{{ $wishlist->product->selling_price }}</strong>
            </li>

            <li class="list-group-item d-flex justify-content-between pb-0">
              <span  class="text-muted">Discount Price</span>
              <strong>‎৳{{ $wishlist->product->discount_price }}</strong>
            </li>

            
              
          <li class="list-group-item d-flex justify-content-between">
          <form action="{{ url('/wishlist/addcart/'.$wishlist->product->id) }}" class="card p-2" method="post" enctype="multipart/form">
            <div class="input-group">
              <input type="number" name="qty" class="form-control" placeholder="Enter coupon name.." value="{{ $wishlist->product->quantity }}">
              <div class="input-group-append">
                <span class="btn btn-secondary btn-md waves-effect m-0">Quantity</span>
              </div>
            </div>
          <!-- Promo code -->
            </li>
            <button type="submit" class="btn btn-primary btn-block mb-0" >Add to cart</button>
          </form>
          </ul>
          <!-- Cart -->

        </div>
        <!--Grid column-->
          @endforeach

      </div>
      <!--Grid row-->

    </div>
  </main>
  <!--Main layout-->
@endsection

@section('customscript')
  <!-- MDB core JavaScript -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/popper.min.js" integrity="sha256-O17BxFKtTt1tzzlkcYwgONw4K59H+r1iI8mSQXvSf5k=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="{{ asset('public/front/plugins/parallax-js-master/parallax.min.js') }}"></script>
<script src="{{ asset('public/front/js/shop_custom.js') }}"></script>
<script src="{{ asset('public/front/js/mdb.min.js') }}"></script>
@endsection