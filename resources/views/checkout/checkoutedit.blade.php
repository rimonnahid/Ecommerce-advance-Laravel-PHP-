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

        <!--Grid column-->
        <div class="col-md-8 mb-4">
          <div class="card-body">
              <h3 class="text-secondary">Delevery Information Update</h3>
            </div>
          <!--Card-->
          <div class="card">

            <!--Card content-->
            <form action="{{ url('/checkoutupdate/'.$data->userdetail->id) }}" method="post" class="card-body" >
              @csrf
              <!--Username-->
              <div class="md-form mb-5">
                <input type="number" name="phone" id="phone" class="form-control" placeholder="youremail@example.com"  value="{{ $data->userdetail->phone }}">
                <label for="phone" class="">Phone</label>
              </div>

              <!--email-->
              <div class="md-form mb-5">
                <input type="text" name="email_op" id="email" class="form-control" placeholder="youremail@example.com"  value="{{ $data->userdetail->email_op }}">
                <label for="email" class="">Email (optional)</label>
              </div>

              <!--address-->
              <div class="md-form mb-5">
                <input type="text" name="address" id="address" class="form-control" placeholder="For Example:House #123,Street #123,ABC Road,Lamapara,Sylhet,Sadar-3100."  value="{{ $data->userdetail->address }}">
                <label for="address" class="">Address</label>
              </div>

              <!--Region-->
              <div class="md-form mb-5">
                <input type="text" name="region" id="region" class="form-control" placeholder=""  value="{{ $data->userdetail->region }}">
                <label for="Region" class="">Region</label>
              </div>

              <!--City-->
              <div class="md-form mb-5">
                <input type="text" name="city" id="city" class="form-control" placeholder="" value="{{ $data->userdetail->city }}">
                <label for="City">City</label>
              </div>

              <!--Area-->
              <div class="md-form mb-5">
                <input type="text" name="area" id="area" class="form-control" placeholder="" value="{{ $data->userdetail->area }}">
                <label for="Area">Area</label>
              </div>

              <!--Zip code-->
              <div class="md-form mb-5">
                <input type="number" name="zipcode" id="zipcode" class="form-control" placeholder="" value="{{ $data->userdetail->zipcode }}">
                <label for="Zip code">Zip code</label>
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
          <h4 class="d-flex justify-content-between align-items-center mb-3 mt-5">
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
                <strong class="my-0 text-muted">‎<i class="fas fa-shopping-cart " style="margin-right: 5px; font-weight: 0px; font-size: 13px;"></i>{{ $cart->name }}({{ $cart->qty }} items)</strong>
              </div>
              <div class="col-md-4">
              <span class="text-muted" style="text-align:left;">‎৳{{ $cart->price }}</span>
            </div>
            </li>
            @endforeach

            {{-- distroy coupon --}}
            @if(Session::has('coupon'))
            <a href="{{ route('remove.coupon') }}" class="btn btn-secondary btn-block mb-0" >Destroy Coupon</a>
            @else
            <button class="btn btn-secondary btn-block mb-0" >Simple Advertisement</button>
            @endif

            <li class="list-group-item d-flex justify-content-between">
              <span  class="text-muted">Subtotal({{ Cart::count() }} Items)</span>
              <strong>‎৳{{ str_replace(',', '', Cart::subtotal()) }}</strong>
            </li>

            <li class="list-group-item d-flex justify-content-between">
              <span class="text-muted">Shipping fee</span>
              <strong>‎৳100</strong>
            </li>

            <li class="list-group-item d-flex justify-content-between">
              <span  class="text-muted">Vat</span>
              <strong>‎৳5</strong>
            </li>

            
              
          <!-- Promo code -->
          @if(Session::has('coupon'))
          <li class="list-group-item d-flex justify-content-between bg-light">
          <span  class="text-muted">Coupon Discount</span>
          <strong>‎-৳{{ Session::get('coupon')['discount'] }}</strong>
          @else
          <li class="list-group-item d-flex justify-content-between">
          <form action="{{ route('apply.coupon') }}" class="card p-2" method="post">
            @csrf
            <div class="input-group">
              <input type="text" name="coupon" class="form-control" placeholder="Enter coupon name..">
              <div class="input-group-append">
                <button class="btn btn-secondary btn-md waves-effect m-0" type="submit">Redeem</button>
              </div>
            </div>
          </form>
          @endif
          <!-- Promo code -->
            </li>

            <li class="list-group-item d-flex justify-content-between">
              <span class="">Total (BDT)</span>
              @if(Session::has('coupon'))
              <strong style="color:#FF7049;">‎৳{{ Session::get('coupon')['balance'] + 100 +5}}</strong>
              @else
              <strong style="color:#FF7049;">‎৳{{ str_replace(',', '', Cart::subtotal()) + 100 +5}}</strong>
              @endif
              
            </li>
            <button class="btn btn-primary btn-block mb-0" >Proceed to pay</button>
          </ul>
          <!-- Cart -->

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