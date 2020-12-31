<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Order;
use App\Orderdetail;
use App\Shipping;
use App\User;

class OrderController extends Controller
{
    public function pendingOrders()
    {
    	$orders = Order::where('order_status',0)->get();
    	$sl = 1;
    	return view('admin.order.orders',compact('sl','orders'));
    }

    public function orderDetails($id)
    {
    	$orders = Order::where('order_id',$id)->first();
    	$orderdetails = Orderdetail::where('order_id',$id)->get();
    	$shippings = Shipping::where('order_id',$id)->first();
    	$sl =1;
    	return view('admin.order.orderdetails',compact('sl','orders','orderdetails','shippings'));
    }

    public function approveOrder($id)
    {
        $order = Order::where('order_id',$id)->update(['order_status' => 1]);
        $notification = array(
            'messege' => 'Order Approved and threw next step',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.approved.orders')->with($notification);
    }

    public function cancelOrder($id)
    {
        $order = Order::where('order_id',$id)->update(['order_status' => 4]);
        $notification = array(
            'messege' => 'Order Cancelled Successfully',
            'alert-type' => 'error'
        );
        return redirect()->route('admin.pending.orders')->with($notification);
    }

    public function processOrder($id)
    {
        $order = Order::where('order_id',$id)->update(['order_status' => 2]);
        $notification = array(
            'messege' => 'Order in Processing',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.processed.orders')->with($notification);
    }

    public function shippingOrder($id)
    {
        $order = Order::where('order_id',$id)->update(['order_status' => 3]);

        $orderdetails = Orderdetail::where('order_id',$id)->get();
        foreach($orderdetails as $orderdetail){
            $product = Product::where('id',$orderdetail->product_id)->first();
            $mainqty = $product->quantity;
            $minusqty = $orderdetail->qty;
            $newqty = $mainqty - $minusqty;

            Product::where('id',$orderdetail->product_id)->update(['quantity' => $newqty]);
        }


        $notification = array(
            'messege' => 'Order Shipped Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.shipped.orders')->with($notification);
    }

    public function orderApproved()
    {
        $orders = Order::where('order_status', 1)->get();
        $sl = 1;
        return view('admin.order.approved',compact('sl','orders'));
    }

    public function orderProcessed()
    {
        $orders = Order::where('order_status', 2)->get();
        $sl = 1;
        return view('admin.order.processed',compact('sl','orders'));
    }

    public function orderShipped()
    {
        $orders = Order::where('order_status', 3)->get();
        $sl = 1;
        return view('admin.order.shipped',compact('sl','orders'));
    }

    public function orderCancelled()
    {
        $orders = Order::where('order_status', 4)->get();
        $sl = 1;
        return view('admin.order.cancelled',compact('sl','orders'));
    }
}
