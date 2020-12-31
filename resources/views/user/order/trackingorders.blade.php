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
            <h6>Order ID: OD45345345435</h6>
            <article class="card">
                <div class="card-body row">
                    <div class="col"> <strong>Estimated Delivery time:</strong> <br>{{ $orders->order_date }} to up 7 days</div>
                    <div class="col"> <strong>Shipping BY:</strong> <br> BLUEDART, | <i class="fa fa-phone"></i> +1598675986 </div>
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
            <a href="{{ route('my.order') }}" class="btn btn-warning" data-abc="true"> <i class="fa fa-chevron-left"></i> Back to orders</a>
            <a href="{{ route('my.orderdetail',$orders->order_id) }}" class="btn btn-primary " style="float:right; border-radius:0;" data-abc="true"> See this order details <i class="fa fa-chevron-right"></i></a>
        </div>
    </article>
</div>
@endsection

@section('customscript')

<script src="{{ asset('public/front/plugins/parallax-js-master/parallax.min.js') }}"></script>
<script src="{{ asset('public/front/js/shop_custom.js') }}"></script>
@endsection