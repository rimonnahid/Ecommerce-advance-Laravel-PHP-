<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Order;

class StockController extends Controller
{
    //STOCK MANAGE
    public function checkStock()
    {
        $product = Product::where('quantity',null)->get();
        $orders = Order::all();
        $neworders = Order::where('order_status',0)->get();
        $processorders = Order::where('order_status',2)->orwhere('order_status',1)->get();
        $doneorders = Order::where('order_status',3)->get();
        $count = 1;
        $daily = Order::where('order_date',date('d-m-y'))->get();
        $monthly = Order::where('month',date('F'))->get();
        $yearly = Order::where('year',date('Y'))->get();

        return view('admin.stock.view',compact('count','product','orders','neworders','doneorders','processorders','daily','monthly','yearly'));
    }
}
