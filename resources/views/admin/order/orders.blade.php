@extends('layout.nav')

@section('title','Add Product')

@section('content')
	
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <h2>Basic Form</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Admin</a>
            </li>
            <li class="breadcrumb-item">
                <a>Add Product</a>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Basic Data Tables example with responsive plugin</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#" class="dropdown-item">Config option 1</a>
                            </li>
                            <li><a href="#" class="dropdown-item">Config option 2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                            <tr>
                                <th width="15%">SL</th>
                                <th>Pay Bill </th>
                                <th>Card Number</th>
                                <th>Total Ammount</th>
                                <th>Order Date</th>
                                <th>Order Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            @foreach($orders as $order)
                            <tbody>
                            <tr>
                                <td>{{ $sl++ }}</td>
                                <td>৳{{ $order->paying_ammount }}</td>
                                <td>{{ $order->card_number }}</td>
                                <td>৳{{ $order->total_ammount }}</td>
                                <td>{{ $order->order_date }}</td>
                                <td>
                                @if($order->status == 0)
                                    <span class="badge bg-warning">Pending</span>
                                @elseif($order->status == 1)
                                    <span class="badge bg-success">Approved</span>
                                @elseif($order->status == 2)
                                    <span class="badge bg-primary">Processed</span>
                                @elseif($order->status == 3)
                                    <span class="badge bg-success">Shipped</span>
                                @elseif($order->status == 4)
                                    <span class="badge bg-danger">Cancel</span>
                                @endif
                                </td>
                                <td><a href="{{ route('admin.order.details',$order->order_id) }}" class="btn btn-success btn-xs">View</a></td>
                            </tr>
                            </tbody>
                            @endforeach
                            <tfoot>
                            <tr>
                                <th width="15%">SL</th>
                                <th>Pay Bill </th>
                                <th>Card Number</th>
                                <th>Total Ammount</th>
                                <th>Order Date</th>
                                <th>Order Status</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        
@endsection