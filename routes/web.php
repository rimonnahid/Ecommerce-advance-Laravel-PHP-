<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PublicController@index');
//Route::get('/category/{id}', 'PublicController@category_post');
Route::get('/add/wishlist/{id}', 'WishlistController@wishlist');
Route::get('/cartview/', 'CartController@view')->name('cart.view');
Route::post('/cartupdate/{id}', 'CartController@update');
Route::get('/cartdelete/{id}', 'CartController@destroy')->name('cart.delete');

//single product cart
Route::post('/singleproduct/addcart/{id}','ProductController@addCart');

Route::get('/add/addcart/{id}', 'CartController@addcart');
Route::get('/search/', 'PublicController@search');

//google login 
Route::get('/auth/redirect/{provider}', 'SocialiteController@redirect');
Route::get('/callback/{provider}', 'SocialiteController@callback');

//Localization
Route::get('/locale/{locale}','LocalizationController@locale');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/contact', 'PublicController@contact')->name('contact');
Route::get('/category/{id}','PublicController@categoryPosts');
Route::get('/brand/{id}','PublicController@brandPosts');
Route::get('/subcate/{id}','PublicController@subcatePosts');
Route::get('/single_product/{id}','ProductController@productView');

//user
Route::get('/user/profile','UserController@profile')->name('user/profile');
Route::get('/user/addinfo','UserController@addinfo')->name('user/addinfo');
Route::post('/user/addinfo','UserController@store');
Route::post('/user/profile/{id}','UserController@storeimage');

Route::get('/user/editinfo/','UserController@editinfo')->name('user/editinfo');
Route::post('/user/updateinfo/{id}','UserController@update');

//CHENGE PASSWORD
Route::get('/change/password','UserController@chengePassword')->name('change.password');
Route::post('/update-password','UserController@updatePassword');

//order track by user
Route::get('my/order','OrderController@myOrder')->name('my.order');
Route::post('order/track','OrderController@orderTrack')->name('order.track');
Route::get('my/order/detail/{id}','OrderController@myOrderdetail')->name('my.orderdetail');


//checout

Route::get('/checkout','OrderController@checkout');
Route::post('/order/now','OrderController@ordernow')->name('order.now');
//Route::get('/checkout','UserController@checkout');
//Route::post('/checkout','UserController@checkoutdetailsadd');
//Route::get('/checkoutview/','UserController@checkoutview');
//Route::get('/checkoutedit/','UserController@checkoutdetailsedit');
//Route::post('/checkoutupdate/{id}','UserController@checkoutdetailsupdate');

//coupon 
Route::post('/apply-coupon','UserController@coupon')->name('apply.coupon');
Route::get('/remove-coupon','UserController@removecoupon')->name('remove.coupon');

//Blog
Route::get('/blog','BlogController@index')->name('blog');
Route::get('/blog/blogsingle/{id}','BlogController@single');
Route::get('/blog/bangla','BlogController@bangla')->name('language.bangla');
Route::get('/blog/english','BlogController@english')->name('language.english');

//Blog Post
Route::get('/admin/post/post','BlogController@create');
Route::post('/admin/post/post/','BlogController@store');
Route::get('/admin/post/edit/{post}','BlogController@edit');
Route::post('/admin/post/update/{post}','BlogController@update');
Route::get('/admin/post/delete/{post}','BlogController@destroy');

//wishlist
Route::get('/wishlist/','WishlistController@view');
Route::get('/wishlist/delete/{id}','WishlistController@destroy')->name('wishlist.delete');
Route::post('/wishlist/addcart/{id}','WishlistController@addCart');





Route::middleware(['auth','admin'])->group(function(){
	//admin
	Route::get('/admin','AdminController@index');
	Route::get('/admin/adminprofile','AdminController@adminprofile');

	//admin promote demote

	Route::get('/admin/promote/{id}','AdminController@promote')->name('promote-admin');
	Route::get('/admin/demote/{id}','AdminController@demote')->name('demote-admin');
	
	//Product CRUD
	Route::get('/admin/product/addproduct','ProductController@index');
	Route::post('/admin/product/addproduct','ProductController@store');
	Route::get('/admin/product/editproduct/{id}','ProductController@edit');
	Route::post('/admin/product/updateproduct/{id}','ProductController@update');
	Route::get('/admin/product/addproduct/{id}','ProductController@destroy')->name('product.delete');

	Route::get('/admin/getsubcate/{id}','ProductController@getSubcate');


	//Category_Manage
	Route::get('/admin/category/add_category','CategoryController@add_category');
	Route::post('/admin/category/add_category','CategoryController@store');
	Route::get('/admin/category/editcategory/{id}','CategoryController@editcategory');
	Route::post('/admin/category/update/{id}','CategoryController@update');
	Route::get('/admin/category/delete/{id}','CategoryController@delete');

	//Sub Category Manage
	Route::get('/admin/category/add_subcate','SubcateController@create');
	Route::post('/admin/category/add_subcate','SubcateController@store');
	Route::get('/admin/category/edit_subcate/{subcate}','SubcateController@edit');
	Route::post('/admin/category/update_subcate/{subcate}','SubcateController@update');
	Route::get('/admin/category/destroy_subcate/{subcate}','SubcateController@destroy');

	//Brand_Manage
	Route::get('/admin/brand/add_brand','BrandController@add_brand');
	Route::post('/admin/brand/add_brand','BrandController@store_brand');
	Route::get('/admin/brand/editbrand/{brand}','BrandController@edit_brand');
	Route::post('/admin/brand/update/{brand}','BrandController@update');
	Route::get('/admin/brand/destroy/{brand}','BrandController@destroy');

	//Coupon Manage
	Route::get('/admin/coupon/add_coupon','CouponController@create');
	Route::post('/admin/coupon/add_coupon','CouponController@store');
	Route::get('/admin/coupon/editcoupon/{coupon}','CouponController@edit');
	Route::post('/admin/coupon/updatecoupon/{coupon}','CouponController@update');
	Route::get('/admin/coupon/deletecoupon/{coupon}','CouponController@destroy');

	//Blog post Category
	Route::get('/admin/post/postcategory/create','PostcategoryController@create');
	Route::post('/admin/post/postcategory/create','PostcategoryController@store');
	Route::get('/admin/post/postcategory/edit/{id}','PostcategoryController@edit');
	Route::post('/admin/post/postcategory/update/{id}','PostcategoryController@update');
	Route::get('/admin/post/postcategory/delete/{id}','PostcategoryController@destroy');

	//Orders
	Route::get('pending/orders','admin\OrderController@pendingOrders')->name('admin.pending.orders');
	Route::get('order/details/{id}','admin\OrderController@orderDetails')->name('admin.order.details');

	Route::get('/approve/order/{id}','admin\OrderController@approveOrder')->name('admin.approve.order');
	Route::get('/cancel/order/{id}','admin\OrderController@cancelOrder')->name('admin.cancel.order');
	Route::get('/process/order/{id}','admin\OrderController@processOrder')->name('admin.process.order');
	Route::get('/shipping/order/{id}','admin\OrderController@shippingOrder')->name('admin.shipping.order');

	//admin order route
	Route::get('/order/approved','admin\OrderController@orderApproved')->name('admin.approved.orders');
	Route::get('/order/processed','admin\OrderController@orderProcessed')->name('admin.processed.orders');
	Route::get('/order/shipped','admin\OrderController@orderShipped')->name('admin.shipped.orders');
	Route::get('/order/cancelled','admin\OrderController@orderCancelled')->name('admin.cancelled.orders');

	//order report search
	Route::get('search/report','admin\ReportController@index')->name('admin.search.report');
	Route::post('check/report','admin\ReportController@checkReport')->name('admin.check.report');

	//stock manage
	Route::get('stock/manage','admin\StockController@checkStock')->name('admin.stock.manage');

});

