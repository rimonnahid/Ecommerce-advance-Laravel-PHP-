@extends('layouts.app')

@section('title','Electro Home')
@section('customlink')
<link rel="stylesheet" type="text/css" href="{{ asset('public/front/styles/style.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/front/styles/shop_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/front/styles/shop_responsive.css') }}">
@endsection
@section('content')
<div class="container content">
    <article class="card">
        <header class="card-header"> My Orders / Tracking </header>
        <div class="card-body">
            <h6 class="text-danger">Order Date: {{ $orders->order_date }}</h6>
            <article class="card">
                <div class="card-body row">
                    <div class="col"> <strong>Total Ammount</strong> <br><span class="text-danger">৳{{ $orders->total_ammount }}</span> - (Including Charges)</div>
                    <div class="col"> <strong>Shipping BY:</strong> <br> {{ $shippings->address }}</div>
                    <div class="col"> <strong>Status:</strong> <br>

                    @if($orders->order_status == 0)
                        Your Order is Panding
                    @elseif($orders->order_status == 1)
                        Your Order is Approved
                    @elseif($orders->order_status == 2)
                        Your Order is On the way
                    @elseif($orders->order_status == 3)
                        Successfully Shipped Order
                    @elseif($orders->order_status == 4)
                        Upps!!order cancel..
                    @endif
                </div>
                    <div class="col"> <strong>Tracking #:</strong> <br> {{ $orders->tracking_code }} </div>
                </div>
            </article>
            <div class="track">
                @if($orders->order_status == 0)
                <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text">Order Process</span> </div>
                <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Order Confirm</span> </div>
                <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
                <div class="step"> <span class="icon"> <i class="fas fa-gift"></i> </span> <span class="text">Ready for pickup</span> </div>
                @endif
                @if($orders->order_status == 1)
                <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text">Order Process</span> </div>
                <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Order Confirm</span> </div>
                <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
                <div class="step"> <span class="icon"> <i class="fas fa-gift"></i> </span> <span class="text">Ready for pickup</span> </div>
                @endif
                @if($orders->order_status == 2)
                <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text">Order Process</span> </div>
                <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Order Confirm</span> </div>
                <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
                <div class="step"> <span class="icon"> <i class="fas fa-gift"></i> </span> <span class="text">Ready for pickup</span> </div>
                @endif
                @if($orders->order_status == 3)
                <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text">Order Process</span> </div>
                <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Order Confirm</span> </div>
                <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
                <div class="step active"> <span class="icon"> <i class="fas fa-gift"></i> </span> <span class="text">Ready for pickup</span> </div>
                @endif
                @if($orders->order_status == 4)
                <div class="step active"> <span class="icon"> <i class="fas fa-ban"></i> </span> <span class="alert alert-danger">Upps!!Order has been cancelled.</span> </div>
                @endif
            </div>
            <hr>
            <ul class="row">
                @foreach($orderdetails as $orderdetail)
                 <!--Grid column-->
        <div class="col-md-3 mb-4">

          <!-- Cart -->
          <ul class="list-group mb-3 z-depth-1">

            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <?php foreach(array(json_decode($orderdetail->image)) as $image) {?>
              <img src="{{ asset('public/file/'.$image[0]) }}" height="200px" width="100%">
              <?php }?>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed" style=" padding: 5px 20px;">
              <div>
                <strong class="my-0 text-muted">‎<i class="fas fa-shopping-cart " style="margin-right: 5px; font-weight: 0px; font-size: 13px;"></i>{{ $orderdetail->product_name }}</strong>
              </div>
              <span class="text-muted" style="text-align:left;">‎</span>

            </li>
            <li class="list-group-item d-flex justify-content-between pb-0">
              <span  class="text-muted">Color</span>
              <strong>‎{{ $orderdetail->color }}
              </strong>
            </li>

            <li class="list-group-item d-flex justify-content-between pb-0">
              <span class="text-muted">Price</span>
              <strong>‎৳{{ $orderdetail->single_price }}</strong>
            </li>

            <li class="list-group-item d-flex justify-content-between pb-0">
              <span  class="text-muted">Quantity</span>
              <strong>‎{{ $orderdetail->qty }}</strong>
            </li>

            
              
            <li class="list-group-item d-flex justify-content-between">
              <span  class="text-muted">Discount Price</span>
              <strong>‎৳{{ $orderdetail->total_price }}</strong>
            </li>
            <a href="{{ $orderdetail->product->path() }}" type="submit" class="btn btn-primary btn-block mb-0" >View details</a>
          </form>
          </ul>
          <!-- Cart -->

        </div>
        <!--Grid column-->
        @endforeach
            </ul>
            <hr>
            <a href="{{ route('my.order') }}" class="btn btn-warning" data-abc="true"> <i class="fa fa-chevron-left"></i> Back to orders</a>
        </div>
    </article>
</div>
@endsection

@section('customscript')

<script src="{{ asset('public/front/plugins/parallax-js-master/parallax.min.js') }}"></script>
<script src="{{ asset('public/front/js/shop_custom.js') }}"></script>
@endsection