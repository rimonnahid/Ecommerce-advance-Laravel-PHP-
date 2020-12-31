<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Wishlist;
use Auth;
use Cart;

class WishlistController extends Controller
{
    public function wishlist($id)
    {
    	
    	if(Auth::check()){
    		$check = Wishlist::where('user_id',Auth::user()->id)->where('product_id',$id)->first();
    		if($check){
    			return Response::json(['error' => 'Alredy In Wishlist']);
    		}
    		else{
    			$wishlist = new Wishlist();
    			$wishlist->user_id = Auth::user()->id;
    			$wishlist->product_id = $id;
    			$wishlist->save();
    			return Response::json(['success' => 'Product Added To Wishlist']);
    		}
    	}
    	else{
    		return Response::json(['error' => 'Log In First']);
    	}
    }

    public function view()
    {
        if (Auth::check()) {
            $wishlists = Wishlist::where('user_id',Auth::id())->latest()->get();
            $viewcarts = Cart::content();
            return view('wishlist',compact('wishlists','viewcarts'));
        }else{
            return view('wishlist');
        }
    }

    public function addCart(Request $request,$id)
    {
        $product = Product::findorFail($id);
        $array = array();

        $array['id'] = $id;
        $array['name'] = $product->name;
        $array['qty'] = $request->qty;
        if($product->discount_price == null){
            $array['price'] = $product->selling_price;
        }else{
            $array['price'] = $product->selling_price;
        }
        $array['weight'] = 1;
        $array['options']['image'] =$product->image ;
        $array['options']['color'] = $product->color ;
        $array['options']['size'] =$product->size;
        Cart::add($array);
        $notification = array(
            'messege' => 'Successfully Added in cart',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    public function destroy(Wishlist $id)
    {
        $id->delete();
        if($id){
            $notification = array(
                'messege' => 'Wishlist Deleted Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'messege' => 'Not Delete! Something is wrong',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
}
