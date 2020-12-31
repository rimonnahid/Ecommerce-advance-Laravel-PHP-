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
                <a>Add Brand</a>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>All Element for Add Brand</h5>
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
                    <form action="{{ URL::to('/admin/brand/update/'.$brand->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf


                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Brand Name</label>

                            <div class="col-sm-10"><input type="text" name="brand_name" class="form-control" value="{{ $brand->brand_name }}"><span class="form-text m-b-none">Enter a valid Brand name..</span></div>

                        </div>
                        <div class="hr-line-dashed"></div>


                        <div class="form-group  row"><label class="col-sm-2 col-form-label">State</label>
                            <div class="col-sm-10"><input type="text" name="state" class="form-control" value="{{ $brand->state }}"><span class="form-text m-b-none">Enter state name..</span></div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-10"><textarea name="address" class="form-control">{{ $brand->address }}</textarea><span class="form-text m-b-none"></span></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        
                        
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">E-mail</label>
                            <div class="col-sm-10"><input type="email" name="email" class="form-control" placeholder="@" value="{{ $brand->email }}"><span class="form-text m-b-none"></span></div>
                        </div>

                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10"><textarea name="description" class="form-control">{{ $brand->description }}</textarea><span class="form-text m-b-none">Enter description about brand..</span></div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Image</label>
                            <div class="col-sm-10"><input type="file" class="form-control" name="image" value="{{ asset('storage/app/public/'.$brand->image) }}"><span class="form-text m-b-none">Select a Image..</span></div>
                        </div>
                        <div class="hr-line-dashed"></div>



                              
                        <div class="form-group row">
                            <div class="col-sm-4 col-sm-offset-2">
                                <button class="btn btn-primary btn-sm" type="submit">Save Brand</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


        
@endsection
