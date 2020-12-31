
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
        <div class="home_background parallax-window" data-parallax="scroll" data-image-src="{{ asset('storage/app/public/'.$category->image) }}"></div>
        <div class="home_overlay"></div>
        <div class="home_content d-flex flex-column align-items-center justify-content-center">
            <h2 class="home_title">All {{ $category->cate_name }} Product</h2>
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
                            <div class="shop_product_count"><span>{{ count($product) }}</span> products found</div>
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

                        </div>

                        <!-- Shop Page Navigation -->

                        <div class="shop_page_nav d-flex flex-row">
                            <div class="justify-content-right">
                                {{ $product->links() }}
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
<!-- Recently Viewed -->

    <div class="viewed">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="viewed_title_container">
                        <h3 class="viewed_title">Recently Viewed</h3>
                        <div class="viewed_nav_container">
                            <div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
                            <div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
                        </div>
                    </div>

                    <div class="viewed_slider_container">
                        
                        <!-- Recently Viewed Slider -->

                        <div class="owl-carousel owl-theme viewed_slider">
                            
                            <!-- Recently Viewed Item -->
                            @foreach($relatedproduct as $data)
                            <div class="owl-item">
                                <div class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                    <div class="viewed_image">
                                    <?php foreach(array(json_decode($data->image)) as $image){?>
                                        <img src="{{ asset('public/file/'.$image[0]) }}">
                                        <?php }?>
                                    </div>
                                    <div class="viewed_content text-center">
                                        <div class="viewed_price">{{ $data->selling_price }}<span>{{ $data->discount_price }}</span></div>
                                        <div class="viewed_name"><a href="#">{{ $data->name }}</a></div>
                                    </div>
                                    <ul class="item_marks">
                                        <li class="item_mark item_discount">-25%</li>
                                        <li class="item_mark item_new">new</li>
                                    </ul>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Brands -->

    <div class="brands">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="brands_slider_container">
                        
                        <!-- Brands Slider -->

                        <div class="owl-carousel owl-theme brands_slider">
                            @foreach($brandlist as $brand)
                            <div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><a href="{{ $brand->path() }}"><img src="{{ asset('storage/app/public/'.$brand->image) }}" alt=""></a></div></div>
                            @endforeach

                        </div>
                        <!-- Brands Slider Navigation -->
                        <div class="brands_nav brands_prev"><i class="fas fa-chevron-left"></i></div>
                        <div class="brands_nav brands_next"><i class="fas fa-chevron-right"></i></div>

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



