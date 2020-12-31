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
              <h3>Delevery Information</h3>
            </div>
          <!--Card-->
          <div class="card">
            

            <!--Card content-->
            <form 

                            role="form" 

                            action="{{ route('order.now') }}"

                            method="post" 

                            class="require-validation card-body"

                            data-cc-on-file="false"

                            data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"

                            id="payment-form">
              @csrf
              <!--name-->
              <div class="md-form mb-5">
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter your first and last name">
                <label for="name" class="">Name</label>
              </div>

              <!--phone-->
              <div class="md-form mb-5">
                <input type="number" name="phone" id="phone" class="form-control" placeholder="Enter your valid phone number">
                <label for="phone" class="">Phone</label>
              </div>

              <!--email-->
              <div class="md-form mb-5">
                <input type="text" name="email" id="email" class="form-control" placeholder="youremail@example.com">
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
              <!--Grid row-->

{{-- 
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="same-address">
                <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="save-info">
                <label class="custom-control-label" for="save-info">Save this information for next time</label>
              </div>

              <hr> --}}

              {{-- <div class="d-block my-3">
                <div class="custom-control custom-radio">
                  <input id="paypal" name="pay_by" type="radio" class="custom-control" value="Paypal" required>
                  <label class="custom-control-label" for="paypal">Paypal</label>
                </div>
                <div class="custom-control custom-radio">
                  <input id="credit" name="pay_by" type="radio" class="custom-control" value="Credit card" required>
                  <label class="custom-control-label" for="credit">Credit card</label>
                </div>
              </div> --}}
              <hr>

                        {{-- Stripe --}}
              
                        <div class='row'>

                            <div class='col-xs-12 col-md-6 form-group required'>

                                <label class='control-label'>Name on Card</label> <input

                                    class='form-control' size='4' type='text' name="pay_by">

                            </div>

                            <div class='col-xs-6 col-md-6 form-group required'>

                                <label class='control-label'>Card Number</label> <input

                                    autocomplete='off' class='form-control card-number' size='20'

                                    type='text' name="card_number">

                            </div>

                        </div>


  

                        <div class='form-row row'>

                            <div class='col-xs-12 col-md-4 form-group cvc required'>

                                <label class='control-label'>CVC</label> <input autocomplete='off'

                                    class='form-control card-cvc' placeholder='ex. 311' size='4'

                                    type='text'>

                            </div>

                            <div class='col-xs-12 col-md-4 form-group expiration required'>

                                <label class='control-label'>Expiration Month</label> <input

                                    class='form-control card-expiry-month' placeholder='MM' size='2'

                                    type='text'>

                            </div>

                            <div class='col-xs-12 col-md-4 form-group expiration required'>

                                <label class='control-label'>Expiration Year</label> <input

                                    class='form-control card-expiry-year' placeholder='YYYY' size='4'

                                    type='text'>

                            </div>
                            
                        </div>

                        {{-- //Stripe --}}
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
              <h5 class="text-secondary">Order Summery</h5>
            </li>
            @foreach($viewcarts as $cart)
            <li class="list-group-item d-flex justify-content-between lh-condensed" style=" padding: 5px 20px;">
              <div>
                <strong class="my-0 text-muted">‎<i class="fas fa-shopping-cart " style="margin-right: 5px; font-weight: 0px; font-size: 13px;"></i>{{ $cart->name }}({{ $cart->qty }} items)</strong>
              </div>
              <span class="text-muted" style="text-align:left;">‎৳{{ $cart->price }}</span>

            </li>
            @endforeach
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

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">

$(function() {

   

    var $form         = $(".require-validation");

   

    $('form.require-validation').bind('submit', function(e) {

        var $form         = $(".require-validation"),

        inputSelector = ['input[type=email]', 'input[type=password]',

                         'input[type=text]', 'input[type=file]',

                         'textarea'].join(', '),

        $inputs       = $form.find('.required').find(inputSelector),

        $errorMessage = $form.find('div.error'),

        valid         = true;

        $errorMessage.addClass('hide');

  

        $('.has-error').removeClass('has-error');

        $inputs.each(function(i, el) {

          var $input = $(el);

          if ($input.val() === '') {

            $input.parent().addClass('has-error');

            $errorMessage.removeClass('hide');

            e.preventDefault();

          }

        });

   

        if (!$form.data('cc-on-file')) {

          e.preventDefault();

          Stripe.setPublishableKey($form.data('stripe-publishable-key'));

          Stripe.createToken({

            number: $('.card-number').val(),

            cvc: $('.card-cvc').val(),

            exp_month: $('.card-expiry-month').val(),

            exp_year: $('.card-expiry-year').val()

          }, stripeResponseHandler);

        }

  

  });

  

  function stripeResponseHandler(status, response) {

        if (response.error) {

            $('.error')

                .removeClass('hide')

                .find('.alert')

                .text(response.error.message);

        } else {

            /* token contains id, last4, and card type */

            var token = response['id'];

               

            $form.find('input[type=text]').empty();

            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");

            $form.get(0).submit();

        }

    }

   

});

</script>
  </main>
  <!--Main layout-->
@endsection

@section('customscript')
<script src="{{ asset('public/front/plugins/parallax-js-master/parallax.min.js') }}"></script>
<script src="{{ asset('public/front/js/shop_custom.js') }}"></script>
<script src="{{ asset('public/front/js/mdb.min.js') }}"></script>


<script type="text/javascript">

$(function() {

   

    var $form         = $(".require-validation");

   

    $('form.require-validation').bind('submit', function(e) {

        var $form         = $(".require-validation"),

        inputSelector = ['input[type=email]', 'input[type=password]',

                         'input[type=text]', 'input[type=file]',

                         'textarea'].join(', '),

        $inputs       = $form.find('.required').find(inputSelector),

        $errorMessage = $form.find('div.error'),

        valid         = true;

        $errorMessage.addClass('hide');

  

        $('.has-error').removeClass('has-error');

        $inputs.each(function(i, el) {

          var $input = $(el);

          if ($input.val() === '') {

            $input.parent().addClass('has-error');

            $errorMessage.removeClass('hide');

            e.preventDefault();

          }

        });

   

        if (!$form.data('cc-on-file')) {

          e.preventDefault();

          Stripe.setPublishableKey($form.data('stripe-publishable-key'));

          Stripe.createToken({

            number: $('.card-number').val(),

            cvc: $('.card-cvc').val(),

            exp_month: $('.card-expiry-month').val(),

            exp_year: $('.card-expiry-year').val()

          }, stripeResponseHandler);

        }

  

  });

  

  function stripeResponseHandler(status, response) {

        if (response.error) {

            $('.error')

                .removeClass('hide')

                .find('.alert')

                .text(response.error.message);

        } else {

            /* token contains id, last4, and card type */

            var token = response['id'];

               

            $form.find('input[type=text]').empty();

            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");

            $form.get(0).submit();

        }

    }

   

});

</script>
@endsection