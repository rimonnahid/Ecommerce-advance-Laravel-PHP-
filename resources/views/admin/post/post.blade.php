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
                    <form action="{{ url('/admin/post/post') }}" method="POST" enctype="multipart/form-data">
                    	@csrf
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Post Title</label>

                            <div class="col-sm-10"><input type="text" name="title" class="form-control"><span class="form-text m-b-none">Enter a valid category name..</span></div> 

                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Post tile (বাংলা)</label>

                            <div class="col-sm-10"><input type="text" name="title_bn" class="form-control"><span class="form-text m-b-none">Enter a valid category name..</span></div>

                        </div>
                        <div class="hr-line-dashed"></div>


                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Post Category</label>

                            <div class="col-sm-10">
                                <select class="form-control" name="postcategory_id">
                                    @foreach($postcate as $cate)
                                    <option value="{{ $cate->id }}">{{ $cate->cate_name }}</option>
                                    @endforeach
                                </select>

                                <span class="form-text m-b-none">Enter a valid category name..</span></div>

                        </div>
                        <div class="hr-line-dashed"></div>



                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Post description</label>

                            <div class="col-sm-10">
                                <textarea class="form-control" name="description" id="summary-ckeditor"></textarea>

                            </div>

                        </div>
                        <div class="hr-line-dashed"></div>




                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Post description (বাংলা)</label>

                            <div class="col-sm-10">
                                <textarea class="form-control" name="description_bn" id="summary-ckeditor1"></textarea>

                            </div>

                        </div>
                        <div class="hr-line-dashed"></div>


                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Blogpost Image</label>
                            <div class="col-sm-10"><input type="file" class="form-control" name="image"><span class="form-text m-b-none">Select a Image..</span></div>
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
                    <th width="10%">SL</th>
                    <th>Title </th>
                    <th>Title Bangla</th>
                    <th>Post Category</th>
                    <th width="15%">Action</th>
                </tr>
                </thead>
                @foreach($post as $data)
                <tbody>
                    <tr>
                        <td>{{ $count++ }}</td>
                        <td>{{ $data->title }}</td>
                        <td>{{ $data->title_bn }}</td>
                        <td>{{ $data->postcategory->cate_name }}</td>
                        <td><a class="btn btn-success btn-sm" href="{{ URL::to('admin/post/edit/'.$data->id) }}">Edit</a>
                            <a class="btn btn-danger btn-sm" href="{{ URL::to('admin/post/delete/'.$data->id) }}" id="delete">Delete</a>
                        </td>
                    </tr>
                </tbody>
                @endforeach
                <tfoot>
                <tr>
                    <th>SL</th>
                    <th>Title </th>
                    <th>Title Bangla</th>
                    <th>Post Category</th>
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