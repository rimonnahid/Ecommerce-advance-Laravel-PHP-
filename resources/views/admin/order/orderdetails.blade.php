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
        {{-- Order Details --}}
        <div class="col-md-4">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Customer Detail</h5>
                </div>
                <div>@if($orders->user->image)
                    <div class="ibox-content no-padding border-left-right">
                        <img alt="image" class="img-fluid" src="{{ asset('storage/app/public/'.$orders->user->image) }}">
                    </div>
                    @endif
                    <div class="ibox-content profile-content">
                        <h4><strong>{{ $orders->user->phone }}</strong></h4>
                        <p><i class="fa fa-envelope-open" aria-hidden="true"></i> {{ $orders->user->email }}</p>
                        <table class="table table-bordered">
                            <tr>
                                <th>Phone :</th>
                                <td>{{ $shippings->phone }}</td>
                            </tr>
                        </table>
                        <div class="row m-t-lg">
                            <div class="col-md-4">
                                <span class="bar">5,3,9,6,5,9,7,3,5,2</span>
                                <h5><strong>169</strong> Posts</h5>
                            </div>
                            <div class="col-md-4">
                                <span class="line">5,3,9,6,5,9,7,3,5,2</span>
                                <h5><strong>28</strong> Following</h5>
                            </div>
                            <div class="col-md-4">
                                <span class="bar">5,3,2,-1,-3,-2,2,3,5,2</span>
                                <h5><strong>240</strong> Followers</h5>
                            </div>
                        </div>
                        <div class="user-button">
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-primary btn-sm btn-block"><i class="fa fa-envelope"></i> Send Message</button>
                                </div>
                                <div class="col-md-6">

                                @if($orders->order_status == 0)
                                    <button type="button" class="btn btn-warning btn-sm btn-block">Pending</button>
                                @elseif($orders->order_status == 1)
                                    <button type="button" class="btn btn-success btn-sm btn-block">Approved</button>
                                @elseif($orders->order_status == 2)
                                    <button type="button" class="btn btn-primary btn-sm btn-block">Processed</button>
                                @elseif($orders->order_status == 3)
                                    <button type="button" class="btn btn-success btn-sm btn-block">Shipped</button>
                                @elseif($orders->order_status == 4)
                                    <button type="button" class="btn btn-danger btn-sm btn-block">Cancelled</button>
                                @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--  Shipping Address --}}
        <div class="col-lg-8">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Shipping Details</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
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
                                        <th> Name </th>
                                        <td>{{ $shippings->name }}</td>
                                    </tr>
                                    <tr>
                                        <th> Phone </th>
                                        <td>{{ $shippings->phone }}</td>
                                    </tr>
                                    <tr>
                                        <th> Email </th>
                                        <td>{{ $shippings->email }}</td>
                                    </tr>
                                    <tr>
                                        <th> Address</th>
                                        <td>{{ $shippings->address }}</td>
                                    </tr>
                                    <tr>
                                        <th> Region </th>
                                        <td>{{ $shippings->region }}</td>
                                    </tr>
                                    <tr>
                                        <th> City </th>
                                        <td>{{ $shippings->city }}</td>
                                    </tr>
                                    <tr>
                                        <th> Area </th>
                                        <td>{{ $shippings->area }}</td>
                                    </tr>
                                    <tr>
                                        <th> Zip-code </th>
                                        <td>{{ $shippings->zipcode }}</td>
                                    </tr>

                                    <tr>
                                        <th> Area </th>
                                        <td>{{ $shippings->area }}</td>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="margin:0px; padding:0px;">
    @foreach($orderdetails as $orderdetail)
        <div class="col-lg-4">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Ordered Product {{ $sl++ }}</h5>
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
                <div class="">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner" >
                            <div class="carousel-item active">
                                <?php foreach(array(json_decode($orderdetail->image)) as $image ){?>
                                <img class="d-block w-100" src="{{ asset('public/file/'.$image[0]) }}" alt="First slide" height="250px">
                                <?php }?>
                            </div>
                            <div class="carousel-item">
                                <?php foreach(array(json_decode($orderdetail->image)) as $image ){?>
                                <img class="d-block w-100" src="{{ asset('public/file/'.$image[1]) }}" alt="First slide" height="250px">
                                <?php }?>
                            </div>
                            <div class="carousel-item">
                                <?php foreach(array(json_decode($orderdetail->image)) as $image ){?>
                                <img class="d-block w-100" src="{{ asset('public/file/'.$image[2]) }}" alt="First slide" height="250px">
                                <?php }?>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Ordered Product details</h5>
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
                                <th>Product Name </th>
                                <th>Size</th>
                                <th>Color</th>
                                <th>Quentity</th>
                                <th>Price</th>
                                <th>Total Price</th>
                            </tr>
                            </thead>
                            @foreach($orderdetails as $orderdetail)
                            <tbody>
                            <tr>
                                <td>{{ $sl++ }}</td>
                                <td>{{ $orderdetail->product_name }}</td>
                                <td>{{ $orderdetail->size }}</td>
                                <td>{{ $orderdetail->color }}</td>
                                <td>{{ $orderdetail->qty }}</td>
                                <td>৳{{ $orderdetail->single_price }}</td>
                                <td>৳{{ $orderdetail->total_price }}</td>
                                
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
                    @if($orders->order_status == 0)
                        <a href="{{ route('admin.approve.order',$orders->order_id) }}" class="btn btn-success btn-sm btn-block">Approve</a>
                        <a href="{{ route('admin.cancel.order',$orders->order_id) }}" class="btn btn-danger btn-sm btn-block">Cancel</a>
                    @elseif($orders->order_status == 1)
                        <a href="{{ route('admin.process.order',$orders->order_id) }}" class="btn btn-primary btn-sm btn-block">Send to Processed</a>
                    @elseif($orders->order_status == 2)
                        <a href="{{ route('admin.shipping.order',$orders->order_id) }}" class="btn btn-success btn-sm btn-block">Shipped</a>
                    @elseif($orders->order_status == 3)
                        <a href="" class="btn btn-success btn-sm btn-block">Order Shipped Successfully</a>
                    @elseif($orders->order_status == 4)
                    <a href="" class="btn btn-danger btn-sm btn-block">Order has Cancelled</a>
                    @endif

                   
                </div>
            </div>
        </div>
    </div>
</div>
        
@endsection