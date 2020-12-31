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
                    <h5>All Element for Add Category</h5>
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
                    <form action="{{ URL::to('/admin/coupon/add_coupon') }}" method="POST" enctype="multipart/form-data">
                    	@csrf
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Coupon Name</label>

                            <div class="col-sm-10"><input type="text" name="coupon" class="form-control"><span class="form-text m-b-none">Enter a valid Coupon name..</span></div>

                        </div>
                        <div class="hr-line-dashed"></div>


                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Discount</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="discount">
                                    <option value="" selected="">Select a discount type</option>
                                    <option>1000</option>
                                    <option>2000</option>
                                    <option>3000</option>
                                    <option>4000</option>
                                    <option>5000</option>
                                    <option>10000</option>
                                </select>
                                <span class="form-text m-b-none"></span>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        
                         
                        <div class="form-group row">
                            <div class="col-sm-4 col-sm-offset-2">
                                <button class="btn btn-primary btn-sm" type="submit">Save changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>List of All Categories </h5>
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
                    <div class="row">
                        <div class="col-sm-5 m-b-xs"><select class="form-control-sm form-control input-s-sm inline">
                            <option value="0">Option 1</option>
                            <option value="1">Option 2</option>
                            <option value="2">Option 3</option>
                            <option value="3">Option 4</option>
                        </select>
                        </div>
                        <div class="col-sm-4 m-b-xs">
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-sm btn-white ">
                                    <input type="radio" name="options" id="option1" autocomplete="off" checked> Day
                                </label>
                                <label class="btn btn-sm btn-white active">
                                    <input type="radio" name="options" id="option2" autocomplete="off"> Week
                                </label>
                                <label class="btn btn-sm btn-white">
                                    <input type="radio" name="options" id="option3" autocomplete="off"> Month
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="input-group"><input placeholder="Search" type="text" class="form-control form-control-sm"> <span class="input-group-append"> <button type="button" class="btn btn-sm btn-primary">Go!
                            </button> </span></div>

                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>

                                <th>Id</th>
                                <th>Coupon Name </th>
                                <th>Discount Type </th>
                                <th>Create at </th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($coupon as $coupon)
                            <tr>
                                <td>{{ $coupon->id }}</td>
                                <td>{{ $coupon->coupon }}</td>
                                <td>{{ $coupon->discount }}</td>
                                <td>{{ $coupon->created_at }}</td>
                                <td><a href="{{ URL::to('/admin/coupon/editcoupon/'.$coupon->id) }}" class="btn btn-success btn-xs">Edit</a>
                                    <a href="{{ URL::to('/admin/coupon/deletecoupon/'.$coupon->id) }}" class="btn btn-danger btn-xs" id="delete">Delete</a>
                                </td>
                                
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
        
@endsection