@extends('layout.nav')

@section('title','Add Product')

@section('content')
	
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <h2>Edit Category Form</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Admin</a>
            </li>
            <li class="breadcrumb-item">
                <a>Category</a>
            </li>
            <li class="breadcrumb-item">
                <a>Edit Category</a>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>All Element for Edit Category</h5>
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
                    <form action="{{ url('/admin/category/update/'.$category->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Category Name</label>

                            <div class="col-sm-10"><input type="text" name="cate_name" class="form-control" value="{{ $category->cate_name }}"><span class="form-text m-b-none">Enter a valid category name..</span></div>

                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Category Name (বাংলা)</label>

                            <div class="col-sm-10"><input type="text" name="cate_name_bn" class="form-control" value="{{ $category->cate_name_bn }}"><span class="form-text m-b-none">Enter a valid category name..</span></div>

                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Category Image</label>
                            <div class="col-sm-10"><input type="file" class="form-control" name="image" value="{{ asset('storage/app/public/'.$category->image) }}" selected><span class="form-text m-b-none">Select a Image..</span></div>
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