
@extends('layouts.app')

@section('title',$product->name .'-'. 'Electro Store')
@section('customlink')
{{-- single Product link --}}

<link rel="stylesheet" type="text/css" href="{{ asset('public/front/styles/product_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/front/styles/product_responsive.css') }}">


@endsection

@section('content')
{{-- Facebook share --}}
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v6.0"></script>


<!-- Single Product -->

<div class="single_product">
    <div class="container">
        <div class="row">

            <!-- Images -->
            <div class="col-lg-2 order-lg-1 order-2">
                <ul class="image_list">
                    <?php foreach(array(json_decode($product->image)) as $image) {?>
                    <li data-image="{{ asset('public/file/'.$image[0]) }}">
                        
                        <img src="{{ asset('public/file/'.$image[0]) }}" alt="">
                    </li>
                    <li data-image="{{ asset('public/file/'.$image[1]) }}">

                        <img src="{{ asset('public/file/'.$image[1]) }}" alt="">
                    </li>
                    <li data-image="{{ asset('public/file/'.$image[2]) }}">

                        <img src="{{ asset('public/file/'.$image[2]) }}" alt="" width="100%" height="100%">
                        <?php }?>
                    </li>
                </ul>
            </div>

            <!-- Selected Image -->
            <div class="col-lg-5 order-lg-2 order-1">
                <div class="image_selected">
                    <?php foreach(array(json_decode($product->image)) as $image) {?>
                        <img src="{{ asset('public/file/'.$image[0]) }}" alt="">
                    <?php }?>
                </div>
            </div>

            <!-- Description -->
            <div class="col-lg-5 order-3">
                <div class="product_description">
                    <div class="product_category">{{ $product->category->cate_name }} <i class="fas fa-chevron-right"></i> {{ $product->subcate->name }}</div>
                    <div class="product_name">{{ $product->name }}</div>
                    <div class="rating_r rating_r_4 product_rating"><i></i><i></i><i></i><i></i><i></i></div>
                    <div class="product_text"><p>@lang('product.details')</p></div>
                    <div class="order_info d-flex flex-row">
                        <form action="{{ url('/singleproduct/addcart/'.$product->id) }}" method="post">
                            @csrf
                            <div class=" row" style="z-index: 1000;">


                                <!-- Product Color -->
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <select class="form-control input-lg" style="height:50px" name="color">
                                            @foreach($product_color as $color)
                                            <option value="{{ $color }}">{{ $color }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- Product size -->
                                @if($product->size  == NULL)
                                @else
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <select class="form-control input-lg" style="height:50px" name="size">
                                            @foreach($product_size as $size)
                                            <option value="{{ $size }}">{{ $size }}</option>
                                            @endforeach
                                        </select>
                                    </div>   
                                </div>
                                @endif
                                <!-- Product Quantity -->
                                <div class="col-lg-4">
                                    <div class=" product_quantity clearfix">
                                        <span>Quantity: </span>
                                        <input id="quantity_input" class="form-control" type="text" pattern="[0-9]*" value="1" name="qty">
                                        <div class="quantity_buttons">
                                            <div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fas fa-chevron-up"></i></div>
                                            <div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fas fa-chevron-down"></i></div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="product_price">Price : {{ $product->selling_price }} tk</div>
                            <div class="button_container">
                                <button type="submit" class="button cart_button">Add to Cart</button>
                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <div class="row m-4">
            <div class="fb-comments card" data-href="http://localhost/ecomerce/single_product/" data-numposts="10" data-width="">
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
                            @foreach($brand as $brand)
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
{{-- single product script --}}
<script src="{{ asset('public/front/js/product_custom.js') }}"></script>
@endsection



