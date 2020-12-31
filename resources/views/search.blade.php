
@extends('layouts.app')

@section('title','Electro Store')
@section('customlink')
{{-- Shop Product link --}}

<link rel="stylesheet" type="text/css" href="{{ asset('public/front/plugins/jquery-ui-1.12.1.custom/jquery-ui.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/front/styles/shop_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/front/styles/shop_responsive.css') }}">

@endsection

@section('content')

    
    <!-- Home -->

    <div class="home">
        <div class="home_background parallax-window" data-parallax="scroll" data-image-src="{{ asset('public/front/images/shop_background.jpg') }}"></div>
        <div class="home_overlay"></div>
        <div class="home_content d-flex flex-column align-items-center justify-content-center">
            <h2 class="home_title">All  Product</h2>
        </div>
    </div>
    <!-- Shop -->

    <div class="shop">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">

                    <!-- Shop Sidebar -->
                    <div class="shop_sidebar">
                        <div class="sidebar_section">
                            <div class="sidebar_title">Categories</div>
                            <ul class="sidebar_categories">

                                @php 
                                $cate = App\Category::all();
                                @endphp 
                                @foreach($cate as $category)
                                <li><a href="{{ $category->path() }}">{{ $category->cate_name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="sidebar_section filter_by_section">
                            <div class="sidebar_title">Filter By</div>
                            <div class="sidebar_subtitle">Price</div>
                            <div class="filter_price">
                                <div id="slider-range" class="slider_range"></div>
                                <p>Range: </p>
                                <p><input type="text" id="amount" class="amount" readonly style="border:0; font-weight:bold;"></p>
                            </div>
                        </div>
                        <div class="sidebar_section">
                            <div class="sidebar_subtitle color_subtitle">Color</div>
                            <ul class="colors_list">
                                <li class="color"><a href="#" style="background: #b19c83;"></a></li>
                                <li class="color"><a href="#" style="background: #000000;"></a></li>
                                <li class="color"><a href="#" style="background: #999999;"></a></li>
                                <li class="color"><a href="#" style="background: #0e8ce4;"></a></li>
                                <li class="color"><a href="#" style="background: #df3b3b;"></a></li>
                                <li class="color"><a href="#" style="background: #ffffff; border: solid 1px #e1e1e1;"></a></li>
                            </ul>
                        </div>
                        <div class="sidebar_section">
                            <div class="sidebar_subtitle brands_subtitle">Brands</div>
                            <ul class="brands_list">
                                @php
                                    $brandlist = App\Brand::all();
                                @endphp
                                @foreach($brandlist as $brand)
                                <li class="brand"><a href="{{ $brand->path() }}">{{ $brand->brand_name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                </div>

                <div class="col-lg-9">
                    
                    <!-- Shop Content -->

                    <div class="shop_content">
                        <div class="shop_bar clearfix">
                            <div class="shop_product_count"><span>186</span> products found</div>
                            <div class="shop_sorting">
                                <span>Sort by:</span>
                                <ul>
                                    <li>
                                        <span class="sorting_text">highest rated<i class="fas fa-chevron-down"></span></i>
                                        <ul>
                                            <li class="shop_sorting_button" data-isotope-option='{ "sortBy": "original-order" }'>highest rated</li>
                                            <li class="shop_sorting_button" data-isotope-option='{ "sortBy": "name" }'>name</li>
                                            <li class="shop_sorting_button"data-isotope-option='{ "sortBy": "price" }'>price</li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="product_grid">
                            <div class="product_grid_border"></div>

                            <!-- Product Item -->
                            @if(count($product) > 0)
                            @foreach($product as $data)
                            <div class="product_item is_new">
                                <div class="product_border"></div>
                                <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                    <?php foreach(array(json_decode($data->image)) as $image){?>
                                    <img src="{{ asset('public/file/'.$image[0]) }}">
                                    <?php }?>
                                </div>
                                <div class="product_content">
                                    <div class="product_price text-dark">{{ $data->selling_price }}</div>
                                    <div class="product_name"><div><a href="{{ $data->path() }}" tabindex="0">{{ $data->name }}</a></div></div>
                                </div>
                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                <ul class="product_marks">
                                    <li class="product_mark product_discount">-25%</li>
                                    <li class="product_mark product_new">new</li>
                                </ul>
                            </div>
                            @endforeach
                            @elseif(count($categories) > 0)
                            @foreach($categories as $cate)
                            @foreach($cate->Product as $data)
                            <div class="product_item is_new">
                                <div class="product_border"></div>
                                <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                    <?php foreach(array(json_decode($data->image)) as $image){?>
                                    <img src="{{ asset('public/file/'.$image[0]) }}">
                                    <?php }?>
                                </div>
                                <div class="product_content">
                                    <div class="product_price text-dark">{{ $data->selling_price }}</div>
                                    <div class="product_name"><div><a href="{{ $data->path() }}" tabindex="0">{{ $data->name }}</a></div></div>
                                </div>
                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                <ul class="product_marks">
                                    <li class="product_mark product_discount">-25%</li>
                                    <li class="product_mark product_new">new</li>
                                </ul>
                            </div>
                            @endforeach
                            @endforeach

                            @elseif(count($subcate) > 0)
                            @foreach($subcate as $subcate)
                            @foreach($subcate->Product as $data)
                            <div class="product_item is_new">
                                <div class="product_border"></div>
                                <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                    <?php foreach(array(json_decode($data->image)) as $image){?>
                                    <img src="{{ asset('public/file/'.$image[0]) }}">
                                    <?php }?>
                                </div>
                                <div class="product_content">
                                    <div class="product_price text-dark">{{ $data->selling_price }}</div>
                                    <div class="product_name"><div><a href="{{ $data->path() }}" tabindex="0">{{ $data->name }}</a></div></div>
                                </div>
                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                <ul class="product_marks">
                                    <li class="product_mark product_discount">-25%</li>
                                    <li class="product_mark product_new">new</li>
                                </ul>
                            </div>
                            @endforeach
                            @endforeach

                            @elseif( count($brands) > 0)
                            @foreach( $brands as $brand)
                            @foreach( $brand->Product as $data)
                            <div class="product_item is_new">
                                <div class="product_border"></div>
                                <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                    <?php foreach(array(json_decode($data->image)) as $image){?>
                                    <img src="{{ asset('public/file/'.$image[0]) }}">
                                    <?php }?>
                                </div>
                                <div class="product_content">
                                    <div class="product_price text-dark">{{ $data->selling_price }}</div>
                                    <div class="product_name"><div><a href="{{ $data->path() }}" tabindex="0">{{ $data->name }}</a></div></div>
                                </div>
                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                <ul class="product_marks">
                                    <li class="product_mark product_discount">-25%</li>
                                    <li class="product_mark product_new">new</li>
                                </ul>
                            </div>
                            @endforeach
                            @endforeach
                            @endif

                        </div>

                        <!-- Shop Page Navigation -->

                        <div class="shop_page_nav d-flex flex-row">
                            <div class="page_prev d-flex flex-column align-items-center justify-content-center"><i class="fas fa-chevron-left"></i></div>
                            <ul class="page_nav d-flex flex-row">
                                <li><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">...</a></li>
                                <li><a href="#">21</a></li>
                            </ul>
                            <div class="page_next d-flex flex-column align-items-center justify-content-center"><i class="fas fa-chevron-right"></i></div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection



@section('customscript')
{{-- Shop product script --}}
<script src="{{ asset('public/front/plugins/Isotope/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('public/front/plugins/jquery-ui-1.12.1.custom/jquery-ui.js') }}"></script>
<script src="{{ asset('public/front/plugins/parallax-js-master/parallax.min.js') }}"></script>
<script src="{{ asset('public/front/js/shop_custom.js') }}"></script>

@endsection



