<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;

class ReportController extends Controller
{
    public function index()
    {
    	return view('admin.report.search');
    }

    public function checkReport(Request $request)
    {
    	if($request->date){
    		$date = date('d-m-y',strtotime($request->date));
    		$orders = Order::where('order_date',$date)->where('order_status',3)->get();
    		$sum = Order::where('order_date',$date)->where('order_status',3)->sum('paying_ammount');
    		$sl = 1;
    		return view('admin.report.result',compact('orders','sum','date','sl'));
    	}else if($request->month && $request->year){
    		$month = $request->month;
    		$year = $request->year;
    		$orders = Order::where('month',$month)->where('year',$year)->where('order_status',3)->get();
    		$sum = Order::where('month',$month)->where('year',$year)->where('order_status',3)->sum('paying_ammount');
    		$sl = 1;
    		return view('admin.report.result',compact('orders','sum','month','year','sl'));
    	}else{ 
    		$year = $request->year;
    		$orders = Order::where('year',$year)->where('order_status',3)->get();
    		$sum = Order::where('year',$year)->where('order_status',3)->sum('paying_ammount');
    		$sl = 1;
    		return view('admin.report.result',compact('orders','sum','year','sl'));
    	}
    }
}
