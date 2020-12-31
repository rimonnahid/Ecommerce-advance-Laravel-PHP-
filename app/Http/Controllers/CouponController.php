<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coupon;

class CouponController extends Controller
{
    public function create()
    {
    	$coupon = Coupon::all();
    	return view('admin.coupon.addcoupon',compact('coupon'));
    }

    public function store()
    {
    	$coupon = Coupon::create($this->validateData());
        if($coupon){
        	$notification = array(
            'messege' => 'Coupon Inserted Successfully',
            'alert-type' => 'success',
	        );
	   		return back()->with($notification);
        }else{
        	$notification = array(
            'messege' => 'Coupon Inserted Failed',
            'alert-type' => 'error',
	        );
	   		return back()->with($notification);
        }

    }

   	public function edit(Coupon $coupon)
   	{
   		return view('admin.coupon.editcoupon',compact('coupon'));
   	}

   	public function update(Coupon $coupon)
   	{
   		$coupon = $coupon->update($this->validateData());
   		if($coupon){
        	$notification = array(
            'messege' => 'Coupon Updated Successfully',
            'alert-type' => 'success',
	        );
	   		return redirect('admin/coupon/add_coupon')->with($notification);
        }else{
        	$notification = array(
            'messege' => 'Coupon Updated Failed',
            'alert-type' => 'error',
	        );
	   		return redirect('admin/coupon/add_coupon')->with($notification);
        }
   	}

   	public function destroy(Coupon $coupon)
   	{
   		$data = $coupon->delete();
   		if($data){
   			$notification = array(
            'messege' => 'Coupon Deleted Successfully',
            'alert-type' => 'success',
	        );
	   		return back()->with($notification);
	   	}else{
	   		$notification = array(
            'messege' => 'Coupon no Deleted Successfully',
            'alert-type' => 'error',
	        );
	   		return back()->with($notification);
	   	}
   	}

    private function validateData()
    {
    	return request()->validate([
			'coupon' => 'required',
			'discount'=>'required',
    	]);
    }
}
