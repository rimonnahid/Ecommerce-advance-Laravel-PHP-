<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Cart;
use App\Coupon;
use App\Product;
use App\User;
use App\Order;
use App\Orderdetail;
use App\Shipping;
use DB;
use Auth;
use Session;
use Stripe;

class OrderController extends Controller
{
    //checkout functions

    public function checkout()
    {
        $viewcarts = Cart::content();
        return view('checkout.checkout',compact('viewcarts'));
    }

    public function ordernow(Request $request)
    {
        //ORDER
    	$data = array();
    	$data['user_id'] = Auth::id();
    	if(Session::has('coupon')){
    		$data['ammount'] = Session::get('coupon')['balance'];
    	}else{
    		$data['ammount'] = Cart::subtotal();
    	}
    	$data['vat'] = 5;
    	$data['shipping'] = 100;

    	if(Session::has('coupon')){
    		$data['total_ammount'] = Session::get('coupon')['balance'] + 5 + 100;
    	}else{
    		$data['total_ammount'] = str_replace(',', '', Cart::subtotal()) + 100 +5;
    	}

    	if(Session::has('coupon')){
    		$data['paying_ammount'] = Session::get('coupon')['balance'] + 5 + 100;
    	}else{
    		$data['paying_ammount'] = str_replace(',', '', Cart::subtotal()) + 100 +5;
    	}

    	$data['order_date'] = date('d-m-y');
    	$data['month'] = date('F');
    	$data['year'] = date('Y');
    	$data['pay_by'] = $request->pay_by;
    	$data['card_number'] = $request->card_number;
    	$data['tracking_code'] = uniqid();

    	$order_id = DB::table('orders')->insertGetId($data);

        //STRIPE
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $ammount = str_replace(',', '', Cart::subtotal()) + 100 +5;
        Stripe\Charge::create ([
                "amount" => $ammount *100 ,
                "currency" => "bdt",
                "source" => $request->stripeToken,
                "description" => " conversation soon." ,
        ]);

        //ORDER DETAILS
    	$contents = Cart::content();
    	foreach($contents as $content){
    		$data = array();
    		$data['order_id'] = $order_id;
            $data['product_id'] = $content->options->product_id;
    		$data['product_name'] = $content->name;
    		$data['size'] = $content->options->size;
            $data['color'] = $content->options->color;
    		$data['image'] = $content->options->image;
    		$data['qty'] = $content->qty;
    		$data['single_price'] = $content->price;
    		$data['total_price'] = $content->price * $content->qty;
    		DB::table('orderdetails')->insert($data);

    	}

        //SHIPPING
    	$data = array();
    	$data['order_id'] = $order_id;
    	$data['name'] = $request->name;
    	$data['phone'] = $request->phone;
    	$data['email'] = $request->email;
    	$data['address'] = $request->address;
    	$data['region'] = $request->region;
    	$data['city'] = $request->city;
    	$data['area'] = $request->area;
    	$data['zipcode'] = $request->zipcode;

    	$shipping = DB::table('shippings')->insert($data);
    	if($shipping){
    		Cart::destroy();
    		if(Session::has('coupon')){
	    		Session::forget('coupon');
	    	}
    		$notification = array(
	            'messege' => 'Order Completed',
	            'alert-type' => 'success',
	        );
	        return redirect('/cartview/')->with($notification);
    	}

    }

    //User order view 

    public function myOrder()
    {
        $orders = Order::where('user_id',Auth::user()->id)->orderBy('order_id','DESC')->get();
        $pick_order = Order::where('user_id',Auth::user()->id)->where('order_status', 3)->get();
        $sl = 1;
        return view('user.order.myorder',compact('orders','sl','pick_order'));
    }

    //user order track
    public function orderTrack(Request $request)
    {
        $orders = Order::where('tracking_code',$request->tracking_code)->first();
        return view('user.order.trackingorders',compact('orders'));
    }

    //order details view for user
    public function myOrderdetail($id)
    {
        $orders = Order::where('order_id',$id)->first();
        $orderdetails = Orderdetail::where('order_id',$id)->get();
        $shippings = Shipping::where('order_id',$id)->first();
        $sl =1;
        return view('user.order.orderdetails',compact('sl','orders','orderdetails','shippings'));
    }
}
