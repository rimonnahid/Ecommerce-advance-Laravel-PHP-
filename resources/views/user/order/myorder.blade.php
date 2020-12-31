@extends('layouts.app')

@section('title','Electro Home')
@section('customlink')
<link rel="stylesheet" type="text/css" href="{{ asset('public/front/styles/style.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/front/styles/shop_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/front/styles/shop_responsive.css') }}">
@endsection
@section('content')
<div style="background-color: #eeeeee;">

<div class="container content">
    <article class="card" style="box-shadow:0px 5px 5px rgba(0,0,0,.5);">
        <header class="card-header"> My Orders </header>
        <div class="card-body">
            <h6>Order ID: OD45345345435</h6>
            <article class="card">
                <div class="card-body row">
                    <div class="col"> <strong>Last Order time:</strong> <br>29 nov 2019 </div>
                    <div class="col"> <strong>Shipping BY:</strong> <br> Sylhet, | <i class="fa fa-phone"></i> +1598675986 </div>
                    <div class="col"> <strong>Status:</strong> <br> Picked by the courier </div>
                    <div class="col"> <strong>Tracking #:</strong> <br> BD045903594059 </div>
                </div>
            </article>
            <h4 class="mt-5">All times order details</h4>
            <div class="track">
                <div class="step active"> <span class="icon"> {{ count($orders) }} </span> <span class="text">Total Order</span> </div>
                <div class="step active"><span class="icon">{{ count($pick_order) }} </span>
                <span class="text"> Pick Order</span> </div>
                <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
                <div class="step active"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Cancelled Order</span> </div>
            </div>
            <hr>
            <ul class="row">
                <table class="table table-striped">
                	<tr>
                		<th>Sl</th>
                		<th>Track code</th>
                		<th>Pay by</th>
                		<th>Ammount</th>
                		<th>Ordered date</th>
                		<th>Status</th>
                		<th>Action</th>
                	</tr>
                	@foreach($orders as $order)
                	<tr>
                		<td>{{ $sl++ }}</td>
                		<td>{{ $order->tracking_code }}</td>
                		<td>{{ $order->pay_by }}</td>
                		<td>{{ $order->total_ammount }}</td>
                		<td>{{ $order->created_at }}</td>
                		<td>
                			@if($order->order_status == 0)
                                    <h2 class="badge bg-warning">Pending</h2>
                                @elseif($order->order_status == 1)
                                    <h2 class="badge bg-success">Approved</h2>
                                @elseif($order->order_status == 2)
                                    <h2 class="badge bg-primary">Processed</h2>
                                @elseif($order->order_status == 3)
                                    <h2 class="badge bg-success">Shipped</h2>
                                @elseif($order->order_status == 4)
                                    <h2 class="badge bg-danger">Cancel</h2>
                                @endif
                		</td>
                		<td><a href="{{ route('my.orderdetail',$order->order_id) }}" class="btn">Details</a></td>
                	</tr>
                	@endforeach
                </table>
            </ul>
            <hr>
        </div>
    </article>
</div>	
</div>
@endsection

@section('customscript')

<script src="{{ asset('public/front/plugins/parallax-js-master/parallax.min.js') }}"></script>
<script src="{{ asset('public/front/js/shop_custom.js') }}"></script>
@endsection