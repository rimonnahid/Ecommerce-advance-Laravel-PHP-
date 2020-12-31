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
                    <form action="{{ URL::to('/admin/coupon/updatecoupon/'.$coupon->id) }}" method="POST" enctype="multipart/form-data">
                    	@csrf
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Coupon Name</label>

                            <div class="col-sm-10"><input type="text" name="coupon" class="form-control" value="{{ $coupon->coupon }}"></div>

                        </div>
                        <div class="hr-line-dashed"></div>


                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Discount</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="discount">
                                    <option value="" selected="">Select a discount type</option>
                                    <option>10%</option>
                                    <option>15%</option>
                                    <option>20%</option>
                                    <option>50%</option>
                                    <option>70%</option>
                                    <option>80%</option>
                                </select>
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
</div>
        
@endsection