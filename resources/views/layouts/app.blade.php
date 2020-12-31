
@php 
$categories = App\Category::all();
$brand = App\Brand::all();


@endphp


<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Meta tag Keywords -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="Electro Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"
/>
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">    
<link rel="shortcut icon" href="{{ asset('public/front/images/rimon.png') }}" type="image/png">

<title>@yield('title')</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="OneTech shop project">
<link rel="stylesheet" type="text/css" href="{{ asset('public/front/styles/bootstrap4/bootstrap.min.css') }}">
<link href="{{ asset('public/front/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ asset('public/front/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/front/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/front/plugins/OwlCarousel2-2.2.1/animate.css') }}">
<!-- Toastr style -->
<link href="{{ asset('public/front/styles/toastr.min.css') }}" rel="stylesheet">
@yield('customlink')
<link rel="stylesheet" type="text/css" href="{{asset('public/front/styles/sweetalert2.min.css')}}">




</head>

<body>

<div class="super_container">
    
    <!-- Header -->
    
    <header class="header">

        <!-- Top Bar -->

        <div class="top_bar">
            <div class="container">
                <div class="row">
                    <div class="col d-flex flex-row">
                        <div class="top_bar_contact_item"><div class="top_bar_icon"><img src="{{asset('public/front/images/phone.png')}}" alt=""></div>+880 1792 544-275</div>
                        <div class="top_bar_contact_item"><div class="top_bar_icon"><img src="{{asset('public/front/images/mail.png')}}" alt=""></div><a href="mailto:fastsales@gmail.com">rimonnahid19@gmail.com</a></div>
                        <div class="top_bar_content ml-auto">
                            <div class="top_bar_menu">
                                <ul class="standard_dropdown top_bar_dropdown">
                                    <li>
                                        <a href="#" data-toggle="modal" data-target="#orderTrack">Order Tracking<i class="fas fa-chevron-down"></i></a>
                                    </li>
                                    <li>
                                        <a href="#">@lang('home.language')<i class="fas fa-chevron-down"></i></a>
                                        <ul>
                                            <li><a href="locale/en">English</a></li>
                                            <li><a href="locale/bn">Bangla</a></li>
                                            <li>@if(Session::get('lang') == 'bangla')
                                                <a href="{{ route('language.english') }}">English</a>
                                                @else
                                                <a href="{{ route('language.bangla') }}">Bangla</a>
                                                @endif
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">@lang('home.currency')<i class="fas fa-chevron-down"></i></a>
                                        <ul>
                                            <li><a href="#">EUR Euro</a></li>
                                            <li><a href="#">GBP British Pound</a></li>
                                            <li><a href="#">JPY Japanese Yen</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="top_bar_user">
                                <div class="user_icon"><img src="{{asset('public/front/images/user.svg')}}" alt=""></div>
                                @guest
                                <div><a href="{{ route('register') }}">@lang('home.register')</a></div>
                                <div><a href="{{ route('login') }}">@lang('home.signin')</a></div>
                                @else
                                <div><a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">@lang('home.logout')</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                                @endguest
                            </div>
                        </div>
                    </div>
                </div>
            </div>      
        </div>

        <!-- Header Main -->

        <div class="header_main">
            <div class="container">
                <div class="row">

                    <!-- Logo -->
                    <div class="col-lg-2 col-sm-3 col-3 order-1">
                        <div class="logo_container">
                            <div class="logo"><a href="#">Rimon's Store</a></div>
                        </div>
                    </div>

                    <!-- Search -->
                    <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
                        <div class="header_search">
                            <div class="header_search_content">
                                <div class="header_search_form_container">
                                    <form action="{{ url('/search/') }}" class="header_search_form clearfix" method="GET">
                                        @csrf
                                        <input type="search" required="required" class="header_search_input" name="search" placeholder="Search for products..." style="width:50%">
                                        <div class="custom_dropdown">
                                            <div class="custom_dropdown_list">
                                                <span class="custom_dropdown_placeholder clc" style="font-size: 14px;">All Categories</span>
                                                <i class="fas fa-chevron-down"></i>
                                                <ul class="custom_list clc" style="width:110%;">
                                                    <li><a class="clc" href="#">All Categories</a></li>
                                                    @foreach($categories as $category)
                                                    <li><a class="clc" href="#">{{ $category->cate_name }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        <button type="submit" class="header_search_button trans_300" value="Submit"><img src="{{asset('public/front/images/search.png')}}" alt=""></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Wishlist -->
                    <div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
                        <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
                            <div class="wishlist d-flex flex-row align-items-center justify-content-end">
                                <div class="wishlist_icon"><img src="{{asset('public/front/images/heart.png')}}" alt=""></div>
                                <div class="wishlist_content">
                                    <div class="wishlist_text"><a href="{{ URL::to('/wishlist/') }}">Wishlist</a></div>
                                    <div class="wishlist_count">
                                        @php 
                                        $wishlist = App\Wishlist::where('user_id',Auth::id())->get();
                                        @endphp

                                        @if($wishlist)
                                        {{ count($wishlist) }}
                                        @else
                                        0
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- Cart -->
                            <div class="cart">
                                <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                                    <div class="cart_icon">
                                        <img src="{{asset('public/front/images/cart.png')}}" alt="">
                                        <div class="cart_count"><span>{{ Cart::count() }}</span></div>
                                    </div>
                                    <div class="cart_content">
                                        <div class="cart_text"><a href="{{ URL::to('/cartview/') }}">Cart</a></div>
                                        <div class="cart_price">৳{{ Cart::subtotal() }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Main Navigation -->

        <nav class="main_nav">
            <div class="container">
                <div class="row">
                    <div class="col">
                        
                        <div class="main_nav_content d-flex flex-row">

                            <!-- Categories Menu -->

                            <div class="cat_menu_container">
                                <div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
                                    <div class="cat_burger"><span></span><span></span><span></span></div>
                                    <div class="cat_menu_text">@lang('home.category')</div>
                                </div>

                                <ul class="cat_menu">
                                    @foreach($categories as $category)
                                    @if(Session::get('lang') == 'english')
                                    <li class="hassubs">
                                        <a href="{{ $category->path() }}">{{ $category->cate_name }}<i class="fas fa-chevron-right"></i></a>
                                        <ul>@foreach($category->subcate as $subcate)
                                            <li><a href="{{ $subcate->path() }}">{{ $subcate->name }}<i class="fas fa-chevron-right"></i></a></li>
                                            @endforeach
                                          
                                        </ul>
                                    </li>
                                    @else
                                    <li class="hassubs">
                                        <a href="{{ $category->path() }}">{{ $category->cate_name_bn }}<i class="fas fa-chevron-right"></i></a>
                                        <ul>@foreach($category->subcate as $subcate)
                                            <li><a href="{{ $subcate->path() }}">{{ $subcate->name_bn }}<i class="fas fa-chevron-right"></i></a></li>
                                            @endforeach
                                          
                                        </ul>
                                    </li>
                                    @endif
                                    @endforeach
                                    
                                </ul>
                            </div>

                            <!-- Main Nav Menu -->

                            <div class="main_nav_menu ml-auto">
                                <ul class="standard_dropdown main_nav_dropdown">
                                    <li><a href="{{URL::to('/')}}">@lang('home.home')<i class="fas fa-chevron-down"></i></a></li>
                                    <li class="hassubs">
                                        <a href="#">@lang('home.brand')<i class="fas fa-chevron-down"></i></a>
                                        <ul>
                                            @foreach($brand as $brand)
                                            <li>
                                                <a href="{{ $brand->path() }}">{{ $brand->brand_name }}<i class="fas fa-chevron-down"></i></a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li><a href="{{ route('blog') }}">@lang('home.blog')<i class="fas fa-chevron-down"></i></a></li>
                                    <li><a href="{{route('contact')}}">@lang('home.contact')<i class="fas fa-chevron-down"></i></a></li>
                                    @guest
                                    @else

                                    <li class="hassubs">
                                        <a href="#">@lang('home.profile')<i class="fas fa-chevron-down"></i></a>
                                        <ul>
                                            @if(Auth::user()->is_admin == 1)
                                            <li><a href="{{ URL::to('/admin/') }}">Dashboard<i class="fas fa-chevron-down"></i></a></li>
                                            @endif
                                            <li><a href="{{ URL::to('/user/profile') }}">Profile<i class="fas fa-chevron-down"></i></a></li>
                                            <li><a href="{{ URL::to('my/order') }}">My Orders<i class="fas fa-chevron-down"></i></a></li>
                                        </ul>
                                    </li>
                                    @endguest
                                </ul>
                            </div>

                            <!-- Menu Trigger -->


                            <div class="menu_trigger_container ml-auto">
                                <div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
                                    <div class="menu_burger">
                                        <div class="menu_trigger_text">menu</div>
                                        <div class="cat_burger menu_burger_inner"><span></span><span></span><span></span></div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </nav>
        
        <!-- Menu -->

        <div class="page_menu">
            <div class="container">
                <div class="row">
                    <div class="col">
                        
                        <div class="page_menu_content">
                            
                            <div class="page_menu_search">
                                <form action="#">
                                    <input type="search" required="required" class="page_menu_search_input" placeholder="Search for products...">
                                </form>
                            </div>
                            <ul class="page_menu_nav">
                                <li class="page_menu_item has-children">
                                    <a href="#">Language<i class="fa fa-angle-down"></i></a>
                                    <ul class="page_menu_selection">
                                        <li><a href="#">English<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">Italian<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">Spanish<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">Japanese<i class="fa fa-angle-down"></i></a></li>
                                    </ul>
                                </li>
                                <li class="page_menu_item has-children">
                                    <a href="#">Currency<i class="fa fa-angle-down"></i></a>
                                    <ul class="page_menu_selection">
                                        <li><a href="#">US Dollar<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">EUR Euro<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">GBP British Pound<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">JPY Japanese Yen<i class="fa fa-angle-down"></i></a></li>
                                    </ul>
                                </li>
                                <li class="page_menu_item">
                                    <a href="#">Home<i class="fa fa-angle-down"></i></a>
                                </li>
                                <li class="page_menu_item has-children">
                                    <a href="#">Super Deals<i class="fa fa-angle-down"></i></a>
                                    <ul class="page_menu_selection">
                                        <li><a href="#">Super Deals<i class="fa fa-angle-down"></i></a></li>
                                        <li class="page_menu_item has-children">
                                            <a href="#">Menu Item<i class="fa fa-angle-down"></i></a>
                                            <ul class="page_menu_selection">
                                                <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                                <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                                <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                                <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                    </ul>
                                </li>
                                <li class="page_menu_item has-children">
                                    <a href="#">Featured Brands<i class="fa fa-angle-down"></i></a>
                                    <ul class="page_menu_selection">
                                        <li><a href="#">Featured Brands<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                    </ul>
                                </li>
                                <li class="page_menu_item has-children">
                                    <a href="#">Trending Styles<i class="fa fa-angle-down"></i></a>
                                    <ul class="page_menu_selection">
                                        <li><a href="#">Trending Styles<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                    </ul>
                                </li>
                                <li class="page_menu_item"><a href="blog.html">blog<i class="fa fa-angle-down"></i></a></li>
                                <li class="page_menu_item"><a href="contact.html">contact<i class="fa fa-angle-down"></i></a></li>
                            </ul>
                            
                            <div class="menu_contact">
                                <div class="menu_contact_item"><div class="menu_contact_icon"><img src="images/phone_white.png" alt=""></div>+38 068 005 3570</div>
                                <div class="menu_contact_item"><div class="menu_contact_icon"><img src="images/mail_white.png" alt=""></div><a href="mailto:fastsales@gmail.com">fastsales@gmail.com</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </header>


<!--================== order tracking The Modal =============== -->
<!-- The Modal -->
<div class="modal fade" id="orderTrack">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Track your order</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <form action="{{ route('order.track') }}" method="post">
        @csrf

      <div class="modal-body">
        <input type="text" class="form-control" name="tracking_code" placeholder="Put your tracking code">
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </form>
    </div>
  </div>
</div>
<!----------- Content------------>

    @yield('content')

<!-----------/Content------------>


   <!-- Footer -->

    <footer class="footer" style="  background: #E9F0F4;">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 footer_col">
                    <div class="footer_column footer_contact">
                        <div class="logo_container">
                            <div class="logo"><a href="#">Rimon's Store</a></div>
                        </div>
                        <div class="footer_title">Got Question? Call Us 24/7</div>
                        <div class="footer_phone">+088 017 92 544275</div>
                        <div class="footer_contact_text">
                            <p>Sobuj-sena Block-A,Ghasitula</p>
                            <p>Lamapara,Sylhet-Sadar,Bangladesh</p>
                        </div>
                        <div class="footer_social">
                            <ul>
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                <li><a href="#"><i class="fab fa-google"></i></a></li>
                                <li><a href="#"><i class="fab fa-vimeo-v"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 offset-lg-2">
                    <div class="footer_column">
                        <div class="footer_title">Find it Fast</div>
                        <ul class="footer_list">
                            @foreach($categories as $category )
                            <li><a href="{{ $category->path() }}">{{ $category->cate_name }}</a></li>
                            @endforeach
                        </ul>
                        <div class="footer_subtitle">Gadgets</div>
                        <ul class="footer_list">
                            <li><a href="#">Car Electronics</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-2">
                    <div class="footer_column">
                        <ul class="footer_list footer_list_2">
                            <li><a href="#">Video Games & Consoles</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-2">
                    <div class="footer_column">
                        <div class="footer_title">Customer Care</div>
                        <ul class="footer_list">
                            @if(Auth::user())
                            <li><a href="{{ URL::to('/user/profile') }}">My Account</a></li>
                            @else
                            <li><a href="{{ URL::to('register') }}">My Account</a></li>
                            @endif
                            <li><a href="#" data-toggle="modal" data-target="#orderTrack">Order Tracking</a></li>
                            <li><a href="{{ URL::to('/wishlist/') }}">Wish List</a></li>
                            <li><a href="#">Customer Services</a></li>
                            <li><a href="#">Returns / Exchange</a></li>
                            <li><a href="#">FAQs</a></li>
                            <li><a href="#">Product Support</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </footer>

    <!-- Copyright -->

    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col">
                    
                    <div class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
                        <div class="copyright_content"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is Develope<i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">M Rimon Nahid</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</div>
                        <div class="logos ml-sm-auto">
                            <ul class="logos_list">
                                <li><a href="#"><img src="{{ asset('public/front/images/logos_1.png') }}" alt=""></a></li>
                                <li><a href="#"><img src="{{ asset('public/front/images/logos_2.png') }}" alt=""></a></li>
                                <li><a href="#"><img src="{{ asset('public/front/images/logos_3.png') }}" alt=""></a></li>
                                <li><a href="#"><img src="{{ asset('public/front/images/logos_4.png') }}" alt=""></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('public/front/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('public/front/styles/bootstrap4/popper.js') }}"></script>
<script src="{{ asset('public/front/styles/bootstrap4/bootstrap.min.js') }}"></script>
<script src="{{ asset('public/front/plugins/greensock/TweenMax.min.js') }}"></script>
<script src="{{ asset('public/front/plugins/greensock/TimelineMax.min.js') }}"></script>
<script src="{{ asset('public/front/plugins/scrollmagic/ScrollMagic.min.js') }}"></script>
<script src="{{ asset('public/front/plugins/greensock/animation.gsap.min.js') }}"></script>
<script src="{{ asset('public/front/plugins/greensock/ScrollToPlugin.min.js') }}"></script>
<script src="{{ asset('public/front/plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
<script src="{{ asset('public/front/plugins/slick-1.8.0/slick.js') }}"></script>
<script src="{{ asset('public/front/plugins/easing/easing.js') }}"></script>
@yield('customscript')
<script src="{{ asset('public/front/js/sweetalert2.js')}}"></script>

{{-- Product Controller Script --}}



<!-- Toastr -->
<script src="{{ asset('public/front/js/toastr.min.js') }}"></script>
{{-- toastr js --}}
    <script>
        @if(Session::has('messege'))
            var type="{{Session::get('alert-type','info')}}"
            switch(type){
                case 'info':
                     toastr.info("{{ Session::get('messege') }}");
                     break;
                case 'success':
                    toastr.success("{{ Session::get('messege') }}");
                    break;
                case 'warning':
                    toastr.warning("{{ Session::get('messege') }}");
                    break;
                case 'error':
                    toastr.error("{{ Session::get('messege') }}");
                    break;
            }
          @endif
    </script>
</body>

</html>