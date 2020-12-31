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
                    <h5>All Element for Add Product<small> With custom checbox and radion elements.</small></h5>
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
                    <form action="{{ url('/admin/product/addproduct') }}" method="POST" enctype="multipart/form-data">
                        @csrf


                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">Product Name</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="name">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group  row"><label class="col-sm-2 col-form-label text-right">Category </label>
                            <div class="col-sm-4">
                                <select class="form-control" name="category" id="category" required>

                                    <option value="" selected="">Select</option>
                                    @foreach($category as $cate)
                                    <option value="{{ $cate->id }}">{{ $cate->cate_name }}</option>

                                    @endforeach
                              </select><span class="form-text m-b-none">Select a Category Name</span>
                              </div>
                              <label class="col-sm-2 col-form-label text-right">Sub-Category </label>
                                <div class="col-sm-4">
                                    <select class="form-control" name="subcate" id="subcate" required>
                                    
                                    </select><span class="form-text m-b-none">Select a Category Name</span>
                                </div>
                            
                        </div>
                       



                        <div class="form-group row"><label class="col-sm-2 col-form-label text-right">Brand</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="brand">
                                    @foreach($brand as $brand)

                                    <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>

                                    @endforeach
                                </select><span class="form-text m-b-none">Select a Brand Name</span>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">Product Color</label>
                            <div class="col-sm-4"><input type="text" data-role="tagsinput"  class="form-control" name="color">
                            </div>
                            <label class="col-sm-2 col-form-label text-right">Product Size</label>
                            <div class="col-sm-4"><input type="text" data-role="tagsinput"  class="form-control" name="size">
                            </div>
                            
                        </div>
                        <div class="hr-line-dashed"></div>


                        <div class="form-group row"><label class="col-sm-2 col-form-label text-right">Image</label>
                            <div class="col-sm-10 row">
                                <div class="col-md-4"><input type="file" class="form-control" name="image[]" required><span class="form-text m-b-none"> Primary image</span>
                                </div>
                                <div class="col-md-4"><input type="file" class="form-control" name="image[]" required><span class="form-text m-b-none">Secondary</span>
                                </div>
                                <div class="col-md-4"><input type="file" class="form-control" name="image[]" required><span class="form-text m-b-none">Secondary</span>
                                </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">Video Link</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="videolink">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">Product Code</label>
                            <div class="col-sm-4"><input type="number" class="form-control" name="code">
                            </div>
                            <label class="col-sm-2 col-form-label text-right">Product Quantity</label>
                            <div class="col-sm-4"><input type="number" class="form-control" name="quantity">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        
                        {{-- <input type="hidden" name="details_key" value="details" > --}}
                        <div class="form-group row"><label class="col-sm-2 col-form-label text-right">Details English</label>
                            <div class="col-sm-10"><textarea class="form-control" name="en_details"></textarea>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group row"><label class="col-sm-2 col-form-label text-right">Details Bangla</label>
                            <div class="col-sm-10"><textarea class="form-control" name="bn_details"></textarea>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>


                        <div class="form-group row"><label class="col-sm-2 col-form-label text-right">Selling Price</label>
                            <div class="col-sm-4"><input type="number" class="form-control" name="selling_price">
                            </div>
                            <label class="col-sm-2 col-form-label text-right">Discount Price</label>
                            <div class="col-sm-4"><input type="number" class="form-control" name="discount_price">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        

                        <div class="row">
                            <div class="col-md-2">
                                
                            </div>
                            <div class="col-md-10">
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <div class="checkbox i-checks"><label> <input type="checkbox" name="hotdeal" value="1"><i></i> Hot Deal </label></div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="checkbox i-checks"><label> <input type="checkbox" name="bestdeal" value="1"><i></i> Best Deal </label></div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="checkbox i-checks"><label> <input type="checkbox" name="midslider" value="1"><i></i> Mid Slider </label></div>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>


                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <div class="checkbox i-checks"><label> <input type="checkbox" name="hotnew" value="1"><i></i> Hot New </label></div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="checkbox i-checks"><label> <input type="checkbox" name="trend" value="1"><i></i> Trend </label></div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="checkbox i-checks"><label> <input type="checkbox" name="buyone_getone" value="1"><i></i> BuyOne GetOne </label></div>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>


                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <div class="checkbox i-checks"><label> <input type="checkbox" name="mainslider" value="1"><i></i> Main Slider </label></div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="checkbox i-checks"><label> <input type="checkbox" name="bestrated" value="1"><i></i> Best Rated </label></div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="checkbox i-checks"><label> <input type="checkbox" name="status" value="1"><i></i> Status </label></div>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                            </div>
                            
                        </div>

                        

                         <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">


                        <div class="form-group row">
                            <div class="col-sm-4 col-sm-offset-2">
                                <a href="" class="btn btn-white btn-sm">Cancel</a>
                                <button class="btn btn-primary btn-sm" type="submit">Save New Product</button>
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
                            <th width="10%">Sl</th>
                            <th>Category</th>
                            <th>Sub-category</th>
                            <th>Company</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th width="15%">Image</th>
                            <th>Quantity</th>
                            <th width="12%">Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($product as $data)
                        @if(!$data->quantity == 0)
                        <tr>
                            <td>{{ $count++ }}</td>
                            <td>{{ $data->category->cate_name }}</td>
                            <td>{{ $data->subcate->name }}</td>
                            <td>{{ $data->brand->brand_name }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->selling_price }}</td>
                            <td>
                                @if($data->image)
                                <?php foreach(json_decode($data->image) as $image){?>
                                <img src="{{ asset('public/file/'.$image) }}" height="30px" width="40px">
                                <?php }?>
                                @endif
                            </td>
                            <td>{{ $data->quantity }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="#" class="btn btn-secondary btn-xs">View</a>
                                <a href="{{ URL::to('/admin/product/editproduct/'.$data->id) }}" class="btn btn-success btn-xs" >Edit</a>
                                <a href="{{ URL::to('/admin/product/addproduct/'.$data->id) }}" class="btn btn-danger btn-xs" id="delete">Delete</a>
                                </div>

                            </td>
                        </tr>
                        @endif
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Sl</th>
                            <th>Category</th>
                            <th>Sub-category</th>
                            <th>Company</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Quantity</th>
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
    <script src="{{ asset('public/back/js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('public/back/js/popper.min.js') }}"></script>
    <script src="{{ asset('public/back/js/bootstrap.js') }}"></script>


    <script type="text/javascript">
    $(document).ready(function() {
         $('select[name="category"]').on('change', function(){
             var category = $(this).val();
             if(category) {
                 $.ajax({
                     url: "{{  url("/admin/getsubcate/") }}/"+category,
                     type:"GET",
                     dataType:"json",
                     success:function(data) {
                        var d =$('select[name="subcate"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="subcate"]').append('<option value="'+ 
                                value.id +'">' + value.name + '</option>');
                           });
                    },
                    
                 });
             } else {
                 alert('danger');
             }

         });
     });

    </script>
        
@endsection
