@extends('layouts.app')

@section('title','Electro Home')
@section('customlink')
<link rel="stylesheet" type="text/css" href="{{ asset('public/front/styles/shop_styles.css') }}">
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('public/front/styles/shop_responsive.css') }}">
  <!-- Material Design Bootstrap -->
<link rel="stylesheet" type="text/css" href="{{ asset('public/front/styles/mdb.min.css') }}">

@endsection
@section('content')

  <!--Main layout-->
  <main class="mt-2 pt-1">
    <div class="container wow fadeIn">

      <!-- Heading -->
      <h2 class="my-4 h2 text-center">Checkout form</h2>

      <!--Grid row-->
      <div class="row">

        <!--Grid column-->
        <div class="col-md-8 mb-4">

          <!--Card-->
          <div class="card">

            <!--Card content-->
            <form action="" method="post" class="card-body" >
              @csrf
              <!--Username-->
              <div class="md-form input-group pl-0 mb-5">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone"></i></span>
                </div>
                <input type="text" name="phone" class="form-control py-0" placeholder="Please enter your phone number" aria-describedby="basic-addon1">
              </div>

              <!--email-->
              <div class="md-form mb-5">
                <input type="text" name="email_op" id="email" class="form-control" placeholder="youremail@example.com">
                <label for="email" class="">Email (optional)</label>
              </div>

              <!--address-->
              <div class="md-form mb-5">
                <input type="text" name="address" id="address" class="form-control" placeholder="For Example:House #123,Street #123,ABC Road,Lamapara,Sylhet,Sadar-3100.">
                <label for="address" class="">Address</label>
              </div>

              <!--Region-->
              <div class="md-form mb-5">
                <input type="text" name="region" id="region" class="form-control" placeholder="">
                <label for="Region" class="">Region</label>
              </div>

              <!--City-->
              <div class="md-form mb-5">
                <input type="text" name="city" id="city" class="form-control" placeholder="">
                <label for="City" class="">City</label>
              </div>

              <!--Area-->
              <div class="md-form mb-5">
                <input type="text" name="area" id="area" class="form-control" placeholder="">
                <label for="Area" class="">Area</label>
              </div>

              <!--Zip code-->
              <div class="md-form mb-5">
                <input type="number" name="zipcode" id="zipcode" class="form-control" placeholder="">
                <label for="Zip code" class="">Zip code</label>
              </div>
              <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
              <!--Grid row-->

              <hr>

              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="same-address">
                <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="save-info">
                <label class="custom-control-label" for="save-info">Save this information for next time</label>
              </div>

              <hr>

              <div class="d-block my-3">
                <div class="custom-control custom-radio">
                  <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                  <label class="custom-control-label" for="credit">Credit card</label>
                </div>
                <div class="custom-control custom-radio">
                  <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
                  <label class="custom-control-label" for="debit">Debit card</label>
                </div>
                <div class="custom-control custom-radio">
                  <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
                  <label class="custom-control-label" for="paypal">Paypal</label>
                </div>
              </div>
              {{-- <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="cc-name">Name on card</label>
                  <input type="text" class="form-control" id="cc-name" placeholder="" required>
                  <small class="text-muted">Full name as displayed on card</small>
                  <div class="invalid-feedback">
                    Name on card is required
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="cc-number">Credit card number</label>
                  <input type="text" class="form-control" id="cc-number" placeholder="" required>
                  <div class="invalid-feedback">
                    Credit card number is required
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3 mb-3">
                  <label for="cc-expiration">Expiration</label>
                  <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
                  <div class="invalid-feedback">
                    Expiration date required
                  </div>
                </div>
                <div class="col-md-3 mb-3">
                  <label for="cc-expiration">CVV</label>
                  <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                  <div class="invalid-feedback">
                    Security code required
                  </div>
                </div>
              </div> --}}
              <hr class="mb-4">
              <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>

            </form>

          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-4 mb-4">

          <!-- Heading -->
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Your cart</span><a href="{{ URL::to('cartview') }}">
            <span class="badge badge-secondary badge-pill">{{ Cart::count() }}</span></a>
          </h4>

          <!-- Cart -->
          <ul class="list-group mb-3 z-depth-1">
            
            <button class="btn btn-primary btn-block mb-0" >Proceed to pay</button>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <h5 class="" style="border-bottom:1px solid gray;">Order Summery</h5>
            </li>
            @foreach($viewcarts as $cart)
            <li class="list-group-item d-flex justify-content-between lh-condensed" style=" padding: 5px 20px;">
              <div>
                <h6 class="my-0 font-weight-bold">‎{{ $cart->name }}</h6>
              </div>
              <div class="col-md-4">
              <span class="text-muted" style="text-align:left;">‎৳{{ $cart->price }}</span>
            </div>
            </li>
            @endforeach
            
            <li class="list-group-item d-flex justify-content-between bg-light">
              <div class="text-success">
                <h6 class="my-0">Coupon Code</h6>
              </div>
              <div class="col-md-4">
                <span class="text-success">-‎৳5</span>
              </div>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <span>Total (BDT)</span>
              <strong>‎৳{{ Cart::subtotal() }}</strong>
            </li>
            <button class="btn btn-primary btn-block mb-0" >Proceed to pay</button>
          </ul>
          <!-- Cart -->

          <!-- Promo code -->
          <form class="card p-2">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Promo code" aria-label="Recipient's username" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-secondary btn-md waves-effect m-0" type="button">Redeem</button>
              </div>
            </div>
          </form>
          <!-- Promo code -->

        </div>
        <!--Grid column-->

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