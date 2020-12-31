<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Cart;
use App\Product;
use App\User;
use App\userdetail;
use Auth;

class CartController extends Controller
{
    public function addcart($id)
    {
    	$product = Product::findorFail($id);
    	$array = array();

    	$array['id'] = $id;
        $array['name'] = $product->name;
    	$array['qty'] = 1;
    	if($product->discount_price == null){
    		$array['price'] = $product->selling_price;
    	}else{
    		$array['price'] = $product->selling_price;
    	}
    	$array['weight'] = 1;
        $array['options']['product_id'] = $product->id;
    	$array['options']['image'] =$product->image ;
    	$array['options']['color'] = '' ;
    	$array['options']['size'] ='';
    	Cart::add($array);



    	return Response()->json(['success'=>'Addcart']);
    }

    public function update($id)
    {
    	$update = Cart::update($id,request()->qty);
    	return back();
    }

    public function view()
    {
        if(Auth::check()){
        $data = User::findorFail(Auth::id());
        $userdetails = $data->userdetail;
        $viewcarts = Cart::content();
        return view('cartview',compact('userdetails','viewcarts'));
        }else{
            $notification = array(
                'messege' => '!!Login First Please',
                'alert-type' => 'error',
            );
            return redirect()->back()->with($notification);
        }
    }

    public function destroy($id)
    {
    	Cart::remove($id);
    	return back();
    }
}
