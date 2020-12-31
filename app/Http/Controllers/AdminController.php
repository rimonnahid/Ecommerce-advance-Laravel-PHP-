<?php

namespace App\Http\Controllers;
use App\User;
use App\Userdetail;
use App\Product;
use App\Category;
use App\Subcate;
use App\Brand;
use App\Order;
use App\post;
use App\Coupon;
use Auth;


use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {	
    	$admin = user::findorFail(Auth::id());
    	$count_admin = User::count();
    	$admin_list = User::where('is_admin',1)->get();
        $user_list = User::where('is_admin',null)->get();
        $product = Product::all();
        $category = Category::all();
        $subcategory = Subcate::all();
        $brand = Brand::all();
        $blog = post::all();
        $coupon = Coupon::all();
    	return view('admin.index',compact('admin','admin_list','user_list','product','category','subcategory','brand','count_admin','blog','coupon'));
    }

    public function adminprofile()
    {
    	return view('admin.adminprofile');
    }

    public function promote($id)
    {
        User::where('id',$id)->update(['is_admin' => 1]);
        $notification = array(
            'messege' =>'Promoted to Admin',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);
    }

    public function demote($id)
    {
        User::where('id',$id)->update(['is_admin' => null]);
        $notification = array(
            'messege' =>'Demoted to User',
            'alert-type' =>'error'
        );
        return redirect()->back()->with($notification);
    }
}
