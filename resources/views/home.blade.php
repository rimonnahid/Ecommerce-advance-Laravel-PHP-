@extends('layouts.app')

@section('title',"Rimon's Store")
@section('customlink')
<link rel="stylesheet" type="text/css" href="{{ asset('public/front/plugins/slick-1.8.0/slick.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/front/styles/main_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/front/styles/responsive.css') }}">
@endsection
@section('content')
<!-- Banner -->

    <div class="banner">
        <div class="banner_background" style="background-image:url({{asset('public/front/images/banner_background.jpg')}})"></div>
        <div class="container fill_height">
            <div class="row fill_height">
                <div class="banner_product_image"><img src="{{asset('public/front/images/banner_product.png')}}" alt="">
                </div>
                <div class="col-lg-5 offset-lg-4 fill_height">
                    <div class="banner_content">
                        <h1 class="banner_text">new era of smartphones</h1>
                        <div class="banner_price"><span>$530</span>$460</div>
                        <div class="banner_product_name">Apple Iphone 6s</div>
                        <div class="button banner_button"><a href="#">Shop Now</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Characteristics -->

    <div class="characteristics">
        <div class="container">
            <div class="row">

                <!-- Char. Item -->
                <div class="col-lg-3 col-md-6 char_col">
                    
                    <div class="char_item d-flex flex-row align-items-center justify-content-start">
                        <div class="char_icon"><img src="{{asset('public/front/images/char_1.png')}}" alt=""></div>
                        <div class="char_content">
                            <div class="char_title">Free Delivery</div>
                            <div class="char_subtitle">from $50</div>
                        </div>
                    </div>
                </div>

                <!-- Char. Item -->
                <div class="col-lg-3 col-md-6 char_col">
                    
                    <div class="char_item d-flex flex-row align-items-center justify-content-start">
                        <div class="char_icon"><img src="{{asset('public/front/images/char_2.png')}}" alt=""></div>
                        <div class="char_content">
                            <div class="char_title">Free Delivery</div>
                            <div class="char_subtitle">from $50</div>
                        </div>
                    </div>
                </div>

                <!-- Char. Item -->
                <div class="col-lg-3 col-md-6 char_col">
                    
                    <div class="char_item d-flex flex-row align-items-center justify-content-start">
                        <div class="char_icon"><img src="{{asset('public/front/images/char_3.png')}}" alt=""></div>
                        <div class="char_content">
                            <div class="char_title">Free Delivery</div>
                            <div class="char_subtitle">from $50</div>
                        </div>
                    </div>
                </div>

                <!-- Char. Item -->
                <div class="col-lg-3 col-md-6 char_col">
                    
                    <div class="char_item d-flex flex-row align-items-center justify-content-start">
                        <div class="char_icon"><img src="{{asset('public/front/images/char_4.png')}}" alt=""></div>
                        <div class="char_content">
                            <div class="char_title">Free Delivery</div>
                            <div class="char_subtitle">from $50</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Deals of the week -->

    <div class="deals_featured">
        <div class="container">
            <div class="row">
                <div class="col d-flex flex-lg-row flex-column align-items-center justify-content-start">
                    
                    <!-- Deals -->

                    <div class="deals">
                        <div class="deals_title">@lang('home.hotdeal')</div>
                        <div class="deals_slider_container">
                            
                            <!-- Deals Slider -->
                            <div class="owl-carousel owl-theme deals_slider">
                                
                                <!-- Deals Item -->
                               
                                @foreach($product as $data)
                                 @if($data->hotdeal)
                                <div class="owl-item deals_item">
                                    <div class="deals_image">
                                        <?php foreach(array(json_decode($data->image)) as $image) {?>
                                        <img src="{{ asset('public/file/'.$image[0]) }}" alt="" height="300px" width="auto">
                                        <?php }?>
                                    </div>
                                    <div class="deals_content">
                                        <div class="deals_info_line d-flex flex-row justify-content-start">
                                            <div class="deals_item_category"><a href="#">{{ $data->subcate->name }}</a></div>
                                            <div class="deals_item_price_a ml-auto"><del>{{ $data->discount_price }}</del></div>
                                        </div>
                                        <div class="deals_info_line d-flex flex-row justify-content-start">
                                            <div class="deals_item_name">{{ $data->name }}</div>
                                            <div class="deals_item_price ml-auto">{{ $data->selling_price}}</div>
                                        </div>
                                        <div class="available">
                                            <div class="available_line d-flex flex-row justify-content-start">
                                                <div class="available_title">Available: <span>{{ $data->quantity }}</span></div>
                                                <div class="sold_title ml-auto">Already sold: <span>28</span></div>
                                            </div>
                                            <div class="available_bar"><span style="width:17%"></span></div>
                                        </div>
                                        <div class="deals_timer d-flex flex-row align-items-center justify-content-start">
                                            <div class="deals_timer_title_container">
                                                <div class="deals_timer_title">Hurry Up</div>
                                                <div class="deals_timer_subtitle">Offer ends in:</div>
                                            </div>
                                            <div class="deals_timer_content ml-auto">
                                                <div class="deals_timer_box clearfix" data-target-time="">
                                                    <div class="deals_timer_unit">
                                                        <div id="deals_timer1_hr" class="deals_timer_hr"></div>
                                                        <span>hours</span>
                                                    </div>
                                                    <div class="deals_timer_unit">
                                                        <div id="deals_timer1_min" class="deals_timer_min"></div>
                                                        <span>mins</span>
                                                    </div>
                                                    <div class="deals_timer_unit">
                                                        <div id="deals_timer1_sec" class="deals_timer_sec"></div>
                                                        <span>secs</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach

                            </div>

                        </div>

                        <div class="deals_slider_nav_container">
                            <div class="deals_slider_prev deals_slider_nav"><i class="fas fa-chevron-left ml-auto"></i></div>
                            <div class="deals_slider_next deals_slider_nav"><i class="fas fa-chevron-right ml-auto"></i></div>
                        </div>
                    </div>
                    
                    <!-- Featured -->
                    <div class="featured">
                        <div class="tabbed_container">
                            <div class="tabs">
                                <ul class="clearfix">
                                    <li class="active">@lang('home.featured')</li>
                                    <li>@lang('home.onsale')</li>
                                    <li>@lang('home.bestrated')</li>
                                </ul>
                                <div class="tabs_line"><span></span></div>
                            </div>

                            <!-- Product Panel -->
                            <div class="product_panel panel active">
                                <div class="featured_slider slider">
                                    <!-- Slider Item -->

                                    @foreach($product as $feature)
                                    <div class="featured_slider_item">
                                        <div class="border_active"></div>
                                        <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                            <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                                <?php foreach(array(json_decode($feature->image)) as $image) {?>
                                                <img src="{{ asset('public/file/'.$image[0]) }}" alt="">
                                                <?php }?>

                                            </div>
                                            <div class="product_content">
                                                <div class="product_price discount">{{ $feature->selling_price }}<span>{{ $feature->discount_price }}</span></div>
                                                <div class="product_name"><div><a href="{{ $feature->path() }}">{{ $feature->name }}</a></div></div>
                                                <div class="product_extras">
                                                    <div class="product_color">
                                                        <input type="radio" checked name="product_color" style="background:#b19c83">
                                                        <input type="radio" name="product_color" style="background:#000000">
                                                        <input type="radio" name="product_color" style="background:#999999">
                                                    </div>
                                                    <button @if($feature->quantity == 0)disabled="" style="background: salmon;" 
                                                    @endif class="product_cart_button addcart" data-id="{{ $feature->id }}">Add to Cart</button>
                                                </div>
                                            </div>
                                            <button class="addwishlist" data-id="{{ $feature->id }}">
                                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                            </button>
                                            <ul class="product_marks">
                                                <li class="product_mark product_discount">-25%</li>
                                                <li class="product_mark product_new">new</li>
                                            </ul>
                                        </div>
                                    </div>
                                    @endforeach

                                </div>
                                <div class="featured_slider_dots_cover"></div>
                            </div>

                            <!--On Sale Product Panel -->

                            <div class="product_panel panel">
                                <div class="featured_slider slider">

                                    <!-- Slider Item -->
                                    @foreach($product as $feature)
                                    <div class="featured_slider_item">
                                        <div class="border_active"></div>
                                        <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                            <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                                <?php foreach(array(json_decode($feature->image)) as $image) {?>
                                                <img src="{{ asset('public/file/'.$image[0]) }}" alt="">
                                                <?php }?>

                                            </div>
                                            <div class="product_content">
                                                <div class="product_price discount">{{ $feature->selling_price }}<span>{{ $feature->discount_price }}</span></div>
                                                <div class="product_name"><div><a href="{{ $feature->path() }}">{{ $feature->name }}</a></div></div>
                                                <div class="product_extras">
                                                    <div class="product_color">
                                                        <input type="radio" checked name="product_color" style="background:#b19c83">
                                                        <input type="radio" name="product_color" style="background:#000000">
                                                        <input type="radio" name="product_color" style="background:#999999">
                                                    </div>
                                                    <button class="product_cart_button addcart" data-id="{{ $feature->id }}">Add to Cart</button>
                                                </div>
                                            </div>
                                            <button class="addwishlist" data-id="{{ $feature->id }}">
                                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                            </button>
                                            <ul class="product_marks">
                                                <li class="product_mark product_discount">-25%</li>
                                                <li class="product_mark product_new">new</li>
                                            </ul>
                                        </div>
                                    </div>
                                    @endforeach

                                </div>
                                <div class="featured_slider_dots_cover"></div>
                            </div>

                            <!-- Product Panel -->

                            <div class="product_panel panel">
                                <div class="featured_slider slider">

                                   
                                    <!-- Slider Item -->
                                    @foreach($product as $bestrated)
                                    @if($bestrated->bestrated)
                                    <div class="featured_slider_item">
                                        <div class="border_active"></div>
                                        <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                            <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                                <?php foreach(array(json_decode($bestrated->image)) as $image) {?>
                                                <img src="{{ asset('public/file/'.$image[0]) }}" alt="">
                                                <?php }?>

                                            </div>
                                            <div class="product_content">
                                                <div class="product_price discount">{{ $bestrated->selling_price }}<span>{{ $bestrated->discount_price }}</span></div>
                                                <div class="product_name"><div><a href="{{ $bestrated->path() }}">{{ $bestrated->name }}</a></div></div>
                                                <div class="product_extras">
                                                    <div class="product_color">
                                                        <input type="radio" checked name="product_color" style="background:#b19c83">
                                                        <input type="radio" name="product_color" style="background:#000000">
                                                        <input type="radio" name="product_color" style="background:#999999">
                                                    </div>
                                                    <button class="product_cart_button addcart" data-id="{{ $bestrated->id }}">Add to Cart</button>
                                                </div>
                                            </div>
                                            <button class="addwishlist" data-id="{{ $bestrated->id }}">
                                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                            </button>
                                            <ul class="product_marks">
                                                <li class="product_mark product_discount">-25%</li>
                                                <li class="product_mark product_new">new</li>
                                            </ul>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach

                                </div>
                                <div class="featured_slider_dots_cover"></div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Popular Categories -->

    <div class="popular_categories">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="popular_categories_content">
                        <div class="popular_categories_title">@lang('home.popularcate')</div>
                        <div class="popular_categories_slider_nav">
                            <div class="popular_categories_prev popular_categories_nav"><i class="fas fa-angle-left ml-auto"></i></div>
                            <div class="popular_categories_next popular_categories_nav"><i class="fas fa-angle-right ml-auto"></i></div>
                        </div>
                        <div class="popular_categories_link"><a href="#">full catalog</a></div>
                    </div>
                </div>
                
                <!-- Popular Categories Slider -->

                <div class="col-lg-9">
                    <div class="popular_categories_slider_container">
                        <div class="owl-carousel owl-theme popular_categories_slider">

                            <!-- Popular Categories Item -->
                            @foreach($category as $data)
                            <div class="owl-item">
                                <div class="popular_category d-flex flex-column align-items-center justify-content-center">
                                    <a href="{{ $data->path() }}" class="text-dark">
                                    <div class="popular_category_image"><img src="{{ asset('storage/app/public/'.$data->image) }}" alt=""></div>
                                    <div class="popular_category_text">{{ $data->cate_name }}</div>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Banner -->

    <div class="banner_2">
        <div class="banner_2_background" style="background-image:url({{ asset('public/front/images/banner_2_background.jpg') }})"></div>
        <div class="banner_2_container">
            <div class="banner_2_dots"></div>

            <!-- Banner 2 Slider -->
            <div class="owl-carousel owl-theme banner_2_slider">

                <!-- Banner 2 Slider Item -->
                @foreach($product as $data)
                @if($data->midslider)
                <div class="owl-item">
                    <div class="banner_2_item">
                        <div class="container fill_height">
                            <div class="row fill_height">
                                <div class="col-lg-4 col-md-6 fill_height">
                                    <div class="banner_2_content">
                                        <div class="banner_2_category">{{ $data->subcate->name }}</div>
                                        <div class="banner_2_title">{{ $data->name }}</div>
                                        <div class="banner_2_text">
                                            {!! Str::words($data->en_details,20,'...') !!}<a href="{{ $data->path() }}">Read More</a> <span class="float-right pr-5">{{ $data->created_at->diffForHumans() }}</span>

                                            </div>
                                        <div class="rating_r rating_r_4 banner_2_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="button banner_2_button"><a href="#">Explore</a></div>
                                    </div>
                                    
                                </div>
                                <div class="col-lg-8 col-md-6 fill_height">
                                    <div class="banner_2_image_container">
                                        <div class="banner_2_image">
                                             <?php foreach(array(json_decode($data->image)) as $image) {?>
                                                <img src="{{ asset('public/file/'.$image[0]) }}" alt="" style="padding-left: 170px; width: 700px;">
                                                <?php }?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>          
                    </div>
                </div>
                @endif
                @endforeach

              


            </div>
        </div>
    </div>

    <!-- Hot New Arrivals -->

    <div class="new_arrivals">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="tabbed_container">
                        <div class="tabs clearfix tabs-right">
                            <div class="new_arrivals_title">@lang('home.hotnew')</div>
                            <ul class="clearfix">
                                <li class="active">@lang('home.newfeature')</li>
                                <li>@lang('home.newupcoming')</li>
                                <li>Laptops & Computers</li>
                            </ul>
                            <div class="tabs_line"><span></span></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-9" style="z-index:1;">

                                <!-- Product Panel -->
                                <div class="product_panel panel active">
                                    <div class="arrivals_slider slider">

                                        

                                        <!-- Slider Item -->
                                        @foreach($product as $data)
                                        @if($data->hotnew)
                                        <div class="arrivals_slider_item">
                                            <div class="border_active"></div>
                                            <div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                                <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                                    <?php foreach(array(json_decode($data->image)) as $image) {?>
                                                <img src="{{ asset('public/file/'.$image[0]) }}" alt="">
                                                <?php }?>
                                                </div>
                                                <div class="product_content">
                                                    <div class="product_price">{{ $data->selling_price }}</div>
                                                    <div class="product_name"><div><a href="{{ $data->path() }}">{{ $data->name }}</a></div></div>
                                                    <div class="product_extras">
                                                        <div class="product_color">
                                                            <input type="radio" checked name="product_color" style="background:#b19c83">
                                                            <input type="radio" name="product_color" style="background:#000000">
                                                            <input type="radio" name="product_color" style="background:#999999">
                                                        </div>
                                                        
                                                    <button @if($data->quantity == 0)disabled="" style="background: salmon;" 
                                                    @endif class="product_cart_button addcart" data-id="{{ $feature->id }}">Add to Cart</button>
                                                    </div>
                                                </div>
                                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                <ul class="product_marks">
                                                    <li class="product_mark product_discount"></li>
                                                    <li class="product_mark product_new">new</li>
                                                </ul>
                                            </div>
                                        </div>
                                        @endif

                                        @endforeach
                                    </div>
                                    <div class="arrivals_slider_dots_cover"></div>
                                </div>

                                <!-- Product Panel -->
                                <div class="product_panel panel">
                                    <div class="arrivals_slider slider">

                                        

                                        <!-- Slider Item -->
                                        <div class="arrivals_slider_item">
                                            <div class="border_active"></div>
                                            <div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                                <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/new_8.jpg" alt=""></div>
                                                <div class="product_content">
                                                    <div class="product_price">$225</div>
                                                    <div class="product_name"><div><a href="product.html">Huawei MediaPad...</a></div></div>
                                                    <div class="product_extras">
                                                        <div class="product_color">
                                                            <input type="radio" checked name="product_color" style="background:#b19c83">
                                                            <input type="radio" name="product_color" style="background:#000000">
                                                            <input type="radio" name="product_color" style="background:#999999">
                                                        </div>
                                                        <button class="product_cart_button">Add to Cart</button>
                                                    </div>
                                                </div>
                                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                <ul class="product_marks">
                                                    <li class="product_mark product_discount"></li>
                                                    <li class="product_mark product_new">new</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="arrivals_slider_dots_cover"></div>
                                </div>

                                <!-- Product Panel -->
                                <div class="product_panel panel">
                                    <div class="arrivals_slider slider">

                                        

                                        <!-- Slider Item -->
                                        <div class="arrivals_slider_item">
                                            <div class="border_active"></div>
                                            <div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                                <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/new_8.jpg" alt=""></div>
                                                <div class="product_content">
                                                    <div class="product_price">$225</div>
                                                    <div class="product_name"><div><a href="product.html">Huawei MediaPad...</a></div></div>
                                                    <div class="product_extras">
                                                        <div class="product_color">
                                                            <input type="radio" checked name="product_color" style="background:#b19c83">
                                                            <input type="radio" name="product_color" style="background:#000000">
                                                            <input type="radio" name="product_color" style="background:#999999">
                                                        </div>
                                                        <button class="product_cart_button">Add to Cart</button>
                                                    </div>
                                                </div>
                                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                <ul class="product_marks">
                                                    <li class="product_mark product_discount"></li>
                                                    <li class="product_mark product_new">new</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="arrivals_slider_dots_cover"></div>
                                </div>

                            </div>

                            <div class="col-lg-3">
                                <div class="arrivals_single clearfix">
                                    <div class="d-flex flex-column align-items-center justify-content-center">
                                        <div class="arrivals_single_image"><img src="images/new_single.png" alt=""></div>
                                        <div class="arrivals_single_content">
                                            <div class="arrivals_single_category"><a href="#">Smartphones</a></div>
                                            <div class="arrivals_single_name_container clearfix">
                                                <div class="arrivals_single_name"><a href="#">LUNA Smartphone</a></div>
                                                <div class="arrivals_single_price text-right">$379</div>
                                            </div>
                                            <div class="rating_r rating_r_4 arrivals_single_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                            <form action="#"><button class="arrivals_single_button">Add to Cart</button></form>
                                        </div>
                                        <div class="arrivals_single_fav product_fav active"><i class="fas fa-heart"></i></div>
                                        <ul class="arrivals_single_marks product_marks">
                                            <li class="arrivals_single_mark product_mark product_new">new</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                                
                    </div>
                </div>
            </div>
        </div>      
    </div>

    <!-- Best Sellers -->

    <div class="best_sellers">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="tabbed_container">
                        <div class="tabs clearfix tabs-right">
                            <div class="new_arrivals_title">@lang('home.bestdeal')</div>
                            <ul class="clearfix">
                                <li class="active">@lang('home.bestdealtop')</li>
                                <li>Audio & Video</li>
                                <li>Laptops & Computers</li>
                            </ul>
                            <div class="tabs_line"><span></span></div>
                        </div>

                        <div class="bestsellers_panel panel active">

                            <!-- Best Sellers Slider -->

                            <div class="bestsellers_slider slider">

                            <!-- Best Sellers Item -->
                            @foreach($product as $data)
                                @if($data->bestdeal)
                                <div class="bestsellers_item">
                                    <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="bestsellers_image">
                                            <?php foreach(array(json_decode($data->image)) as $image) {?>
                                                <img src="{{ asset('public/file/'.$image[0]) }}" alt="">
                                                <?php }?>

                                        </div>
                                        <div class="bestsellers_content">
                                            <div class="bestsellers_category"><a href="#">{{ $data->subcate->name }}</a></div>
                                            <div class="bestsellers_name"><a href="{{ $data->path() }}">{{ $data->name }}</a></div>
                                            <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                            <div class="bestsellers_price discount">{{ $data->selling_price }}<span>{{ $data->discount_price }}</span></div>
                                        </div>
                                    </div>
                                    <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                    <ul class="bestsellers_marks">
                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                    </ul>
                                </div>
                                @endif
                            @endforeach

                            </div>
                        </div>

                        <div class="bestsellers_panel panel">
                            <!-- Best Sellers Slider -->
                            <div class="bestsellers_slider slider">        
                                <!-- Best Sellers Item -->
                                <div class="bestsellers_item">
                                    <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="bestsellers_image"><img src="images/best_6.png" alt=""></div>
                                        <div class="bestsellers_content">
                                            <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                            <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                            <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                            <div class="bestsellers_price discount">$225<span>$300</span></div>
                                        </div>
                                    </div>
                                    <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                    <ul class="bestsellers_marks">
                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="bestsellers_panel panel">

                            <!-- Best Sellers Slider -->

                            <div class="bestsellers_slider slider">

                                <!-- Best Sellers Item -->
                                <div class="bestsellers_item">
                                    <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="bestsellers_image"><img src="images/best_6.png" alt=""></div>
                                        <div class="bestsellers_content">
                                            <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                            <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                            <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                            <div class="bestsellers_price discount">$225<span>$300</span></div>
                                        </div>
                                    </div>
                                    <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                    <ul class="bestsellers_marks">
                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                        
                </div>
            </div>
        </div>
    </div>

    <!-- Adverts -->

    <div class="adverts">
        <div class="container">
            <div class="row">

                <div class="col-lg-4 advert_col">
                    
                    <!-- Advert Item -->

                    <div class="advert d-flex flex-row align-items-center justify-content-start">
                        <div class="advert_content">
                            <div class="advert_title"><a href="#">Trends 2018</a></div>
                            <div class="advert_text">Lorem ipsum dolor sit amet, consectetur adipiscing Donec et.</div>
                        </div>
                        <div class="ml-auto"><div class="advert_image"><img src="{{ asset('public/front/images/adv_1.png') }}" alt=""></div></div>
                    </div>
                </div>

                <div class="col-lg-4 advert_col">
                    
                    <!-- Advert Item -->

                    <div class="advert d-flex flex-row align-items-center justify-content-start">
                        <div class="advert_content">
                            <div class="advert_subtitle">Trends 2018</div>
                            <div class="advert_title_2"><a href="#">Sale -45%</a></div>
                            <div class="advert_text">Lorem ipsum dolor sit amet, consectetur.</div>
                        </div>
                        <div class="ml-auto"><div class="advert_image"><img src="{{ asset('public/front/images/adv_2.png') }}" alt=""></div></div>
                    </div>
                </div>

                <div class="col-lg-4 advert_col">
                    
                    <!-- Advert Item -->

                    <div class="advert d-flex flex-row align-items-center justify-content-start">
                        <div class="advert_content">
                            <div class="advert_title"><a href="#">Trends 2018</a></div>
                            <div class="advert_text">Lorem ipsum dolor sit amet, consectetur.</div>
                        </div>
                        <div class="ml-auto"><div class="advert_image"><img src="{{ asset('public/front/images/adv_3.png') }}" alt=""></div></div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Trends -->

    <div class="trends">
        <div class="trends_background" style="background-image:url(images/trends_background.jpg)"></div>
        <div class="trends_overlay"></div>
        <div class="container">
            <div class="row">

                <!-- Trends Content -->
                <div class="col-lg-3">
                    <div class="trends_container">
                        <h2 class="trends_title">@lang('home.trend')</h2>
                        <div class="trends_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing Donec et.</p></div>
                        <div class="trends_slider_nav">
                            <div class="trends_prev trends_nav"><i class="fas fa-angle-left ml-auto"></i></div>
                            <div class="trends_next trends_nav"><i class="fas fa-angle-right ml-auto"></i></div>
                        </div>
                    </div>
                </div>

                <!-- Trends Slider -->
                <div class="col-lg-9">
                    <div class="trends_slider_container">

                        <!-- Trends Slider -->

                        <div class="owl-carousel owl-theme trends_slider">

                            <!-- Trends Slider Item -->
                        @foreach($product as $data)
                            @if($data->trend)
                            <div class="owl-item">
                                <div class="trends_item is_new">
                                    <div class="trends_image d-flex flex-column align-items-center justify-content-center">
                                        <?php foreach(array(json_decode($data->image)) as $image) {?>
                                            <img src="{{ asset('public/file/'.$image[0]) }}" alt="">
                                            <?php }?>
                                    </div>
                                    <div class="trends_content">
                                        <div class="trends_category"><a href="#">{{ $data->subcate->name }}</a></div>
                                        <div class="trends_info clearfix">
                                            <div class="trends_name"><a href="{{ $data->path() }}">{{ $data->name }}</a></div>
                                            <div class="trends_price">{{ $data->selling_price }}</div>
                                        </div>
                                    </div>
                                    <ul class="trends_marks">
                                        <li class="trends_mark trends_discount">-25%</li>
                                        <li class="trends_mark trends_new">new</li>
                                    </ul>
                                    <div class="trends_fav"><i class="fas fa-heart"></i></div>
                                </div>
                            </div>
                            @endif
                        @endforeach

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

        <!-- Reviews -->

    <div class="reviews">
        <div class="container">
            <div class="row">
                <div class="col">
                    
                    <div class="reviews_title_container">
                        <h3 class="reviews_title">@lang('home.latestreview')</h3>
                        <div class="reviews_all ml-auto"><a href="#">view all <span>reviews</span></a></div>
                    </div>

                    <div class="reviews_slider_container">
                        
                        <!-- Reviews Slider -->
                        <div class="owl-carousel owl-theme reviews_slider">
                            
                            <!-- Reviews Slider Item -->
                            @foreach($product as $review)
                            @if($review->bestrated)
                            <div class="owl-item">
                                <div class="review d-flex flex-row align-items-start justify-content-start">
                                    <div><div class="review_image">
                                        <?php foreach(array(json_decode($review->image)) as $image){?>
                                        <img src="{{ asset('public/file/'.$image[0]) }}">
                                        <?php }?>
                                    </div></div>
                                    <div class="review_content">
                                        <div class="review_name">{{ $review->name }}</div>
                                        <div class="review_rating_container">
                                            <div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                            <div class="review_time">{{ $review->created_at->diffForHumans() }}</div>
                                        </div>
                                        <div class="review_text"><p>{!! Str::words($review->details,8) !!}</p><a href="{{ $review->path() }}">Read more..</a></div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endforeach


                        </div>
                        <div class="reviews_dots"></div>
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
                        <h3 class="viewed_title">@lang('home.recentview')</h3>
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
                            @foreach($brand as $brand)
                            <div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><a href="{{ $brand->path() }}"><img src="{{ asset('storage/app/public/'.$brand->image) }}" alt="" height="150px"></a></div></div>
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
    <script src="{{ asset('public/back/js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('public/back/js/popper.min.js') }}"></script>
    <script src="{{ asset('public/back/js/bootstrap.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $('.addwishlist').on('click',function(){
            var id = $(this).data('id');
            if(id){
                $.ajax({
                    type:"GET",
                    url:"{{url('/add/wishlist/')}}/"+id,
                    dataType:'json',
                    success:function(data){
                        const Toast = Swal.mixin({
                            toast:true,
                            position:'top-end',
                            showConfirmButton:false,
                            timer:3000,
                            timerProgressBar:true,
                            onOpen:(toast)=>{
                                toast.addEventListener('mouseenter',Swal.stopTimer)
                                toast.addEventListener('mouseleave',Swal.resumeTimer)

                            }
                        })
                        if($.isEmptyObject(data.error)){
                            Toast.fire({
                                icon:'success',
                                title:data.success
                            })
                        }else{
                            Toast.fire({
                                icon:'error',
                                title:data.error
                            })
                        }
                    }
                })
            }
        })

        $('.addcart').on('click',function(){
            var id = $(this).data('id');
            if(id){
                $.ajax({
                    type:"GET",
                    url:"{{url('/add/addcart/')}}/"+id,
                    dataType:'json',
                    success:function(data){
                        const Toast = Swal.mixin({
                            toast:true,
                            position:'top-end',
                            showConfirmButton:false,
                            timer:3000,
                            timerProgressBar:true,
                            onOpen:(toast)=>{
                                toast.addEventListener('mouseenter',Swal.stopTimer)
                                toast.addEventListener('mouseleave',Swal.resumeTimer)

                            }
                        })
                        if($.isEmptyObject(data.error)){
                            Toast.fire({
                                icon:'success',
                                title:data.success
                            })
                        }else{
                            Toast.fire({
                                icon:'error',
                                title:data.error
                            })
                        }
                    }
                })
            }
        })
    })
</script>
@endsection

@section('customscript')
<script src="{{ asset('public/front/js/custom.js') }}"></script>
<script src="{{ asset('public/front/js/vue.min.js')}}"></script>
@endsection


