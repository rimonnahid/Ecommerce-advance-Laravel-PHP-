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
                <a>Add Sub-category</a>
            </li>
        </ol>
    </div>
</div>


<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>All Element for Sub-category</h5>
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
                    <form action="{{ URL::to('/admin/category/add_subcate') }}" method="POST"  enctype="multipart/form-data">
                        @csrf
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Category </label>
                            <div class="col-sm-10">
                                <select name="category_id" class="form-control">
                                    <option disabled="">--Select a Category--</option>
                                    @foreach($category as $data)
                                    <option value="{{ $data->id }}">{{ $data->cate_name }}</option>
                                    @endforeach
                                </select>
                                <span class="form-text m-b-none">Select a valid Category..</span>
                            </div>

                        </div>
                        <div class="hr-line-dashed"></div>


                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Sub-Category Name</label>
                            <div class="col-sm-10"><input type="text" name="name" class="form-control"><span class="form-text m-b-none">Enter a valid Sub-Category name..</span></div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Sub-Category Name(বাংলা)</label>
                            <div class="col-sm-10"><input type="text" name="name_bn" class="form-control"><span class="form-text m-b-none">Enter a valid Sub-Category name..</span></div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        
                        <div class="form-group row">
                            <div class="col-sm-4 col-sm-offset-2">
                                <button class="btn btn-primary btn-sm" type="submit">Save Sub-category</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


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
                            <th>Name </th>
                            <th>নাম </th>
                            <th>Category</th>
                            <th>Create at </th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($subcate as $row)
                        <tr class="gradeX">
                            <td>{{ $count++ }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->name_bn }}</td>
                            <td>{{ $row->category->cate_name }}</td>
                            <td>{{ $row->created_at }}</td>
                            <td><a href="{{ url('/admin/category/edit_subcate/'.$row->id) }}" class="btn btn-success btn-xs">Edit</a>
                                <a href="{{ url('/admin/category/destroy_subcate/'.$row->id) }}" class="btn btn-danger btn-xs" id="delete">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>SL</th>
                            <th>Name </th>
                            <th>Category</th>
                            <th>Create at </th>
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