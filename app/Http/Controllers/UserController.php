<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Hash;
use Cart;
use App\User;
use App\Userdetail;
use App\Coupon;
use App\Product;
use App\Wishlist;
use Auth;
use Image;
use Session;

class UserController extends Controller
{
    
    public function profile()
    {
        $data = User::findorFail(Auth::id());
        $wishlist = Wishlist::where('user_id',$data);
        return view('user.profile',compact('data' ,'wishlist'));
    }


    public function addinfo()
    {
        $data = User::findorFail(Auth::id());
        return view('user.addinfo',compact('data'));
    }


    public function store()
    {
        $data = Userdetail::create($this->validateRequest());
        $notification = array(
            'messege' => 'New Information Added',
            'alert-type' => 'success',
        );
        return redirect('/user/profile')->with($notification);
    }


    public function storeimage(User $id)
    {
        $data = request()->validate([
            'image'=>'sometimes|file|image|max:5000',
        ]);
        
        if(request()->has('image')){
            $id->update([
                'image'=>request()->image->store('uploads','public'),
            ]);
        }
        return back();
    }



    public function editinfo()
    {       
        $data = User::findorFail(Auth::id());
        
        return view('user.editinfo',compact('data'));
    }


    public function update(Userdetail $id)
    {
        $id->update($this->validateRequest());
        $notification = array(
            'messege' => 'Information Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect('/user/profile')->with($notification);
    }

    //PASSWORD CHANGE
    public function chengePassword()
    {
        return view('auth.passwords.chenge_password');
    }

    public function updatePassword(Request $request)
    {
        $password = Auth::user()->password;
        $oldpass = $request->oldpass;
        if(Hash::check($oldpass,$password)){
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            if($user->save()){
                $notification = array(
                    'messege' => 'Password changed successfully',
                    'alert-type' => 'success',
                );
                return redirect()->route('login')->with($notification);
            }else{
                $notification = array(
                    'messege' => 'Upps!!there was a problem',
                    'alert-type' => 'error',
                );
                return redirect()->back()->with($notification);
            }

        }
    }


    //checkout functions

    public function checkout()
    {
        $user = User::findorFail(Auth::id());
        $viewcarts = Cart::content();
        return view('checkout.checkout',compact('user','viewcarts'));
    }

    public function checkoutdetailsadd()
    {
        $data = Userdetail::create($this->validateRequest());
        $notification = array(
            'messege' => 'Checkout Completed..',
            'alert-type' => 'success',
        );
        return redirect('/checkoutview/')->with($notification);
    }

    public function checkoutdetailsedit()
    {
        $viewcarts = Cart::content();
        $data = User::findorFail(Auth::id());
        return view('checkout.checkoutedit',compact('viewcarts','data'));
    }

    public function checkoutdetailsupdate(Userdetail $id)
    {
        $id->update($this->validateRequest());
        $notification = array(
            'messege' => 'Information Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect('/checkoutview/')->with($notification);
    }

    public function checkoutview()
    {
        $viewcarts = Cart::content();
        $data = User::findorFail(Auth::id());
        $userdetail = $data->Userdetail;
        return view('checkout.checkoutview',compact('data','viewcarts','userdetail'));
    }

    // private methods

    private function validateRequest()
    {
        return request([
            'user_id','profession','birthdate','nationality','about','phone','email_op','address','region','city','area','zipcode',
        ]);
    }

    //coupon Apply
    public function coupon(Request $request)
    {
        $check = Coupon::where('coupon',$request->coupon)->first();
        if($check){
            Session::put('coupon',[
                'name' => $request->coupon,
                'discount' => $check->discount,
                'balance' => str_replace(',','', Cart::subtotal()) - $check->discount
            ]);
            $notification = array(
                'messege' => 'Coupon Applied Successfully',
                'alert-type' => 'success',
            );
            return redirect()->back()->with($notification);

        }else{
            $notification = array(
                'messege' => '!!Error ,Coupon not found',
                'alert-type' => 'error',
            );
            return redirect()->back()->with($notification);
        }
    }

    //coupon remove
    public function removecoupon()
    {
        Session::forget('coupon');
        $notification = array(
            'messege' => 'Coupon Destroyes',
            'alert-type' => 'error',
        );
        return redirect()->back()->with($notification);
    }
}
