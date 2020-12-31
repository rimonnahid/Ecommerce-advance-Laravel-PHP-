<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Subcate;
use App\Product;
use App\Brand;
use App\User;
use Image;
use Cart;

class ProductController extends Controller
{
    public function index()
    {
        $category = Category::all();
        $brand = Brand::all();
        $subcate = Subcate::all();
        $product = Product::latest()->get();
        $count = 1;
    	return view('admin.product.addproduct',compact('product','category','subcate','brand','count'));
    }


    public function getSubcate($id)
    {
        $subcate = Subcate::where('category_id',$id)->get();
        return response()->json($subcate);
    }



    public function productView($id)
    {
        $product = Product::findorFail($id);
        $brand = Brand::all();
        $color = $product->color;
        $product_color = explode(',',$color);

        $size = $product->size;
        $product_size = explode(',',$size);

        
        return view('single_product',compact('product','brand','product_color','product_size'));
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
        $array['options']['color'] = $request->color ;
        $array['options']['size'] =$request->size;
        Cart::add($array);
        $notification = array(
            'messege' => 'Successfully Added in cart',
            'alert-type' => 'success',
        );
        return redirect('cartview')->with($notification);
    }


    

    public function store(Request $request)
    {

        
        if($request->hasFile('image')){
            foreach($request->file('image') as $image)
            {
                $name = $image->getClientOriginalName();
                
                $image->move(public_path('file'),$name);

                $data[] = $name;
            }
        }

        $product = new Product;
        $product->image=json_encode($data);
        $product->category_id = $request->category;
        $product->subcate_id = $request->subcate;
        $product->brand_id = $request->brand;
        $product->user_id = $request->input('user_id');
        $product->name = $request->name;
        $product->code = $request->code;
        $product->en_details = $request->en_details;
        $product->bn_details = $request->bn_details;
        $product->quantity = $request->quantity;
        $product->color = $request->color;
        $product->size = $request->size;
        $product->selling_price = $request->selling_price;
        $product->discount_price = $request->discount_price;
        $product->hotdeal = $request->hotdeal;
        $product->bestdeal = $request->bestdeal;
        $product->midslider = $request->midslider;
        $product->hotnew = $request->hotnew;
        $product->trend = $request->trend;
        $product->buyone_getone = $request->buyone_getone;
        $product->status = $request->status;
        $product->videolink = $request->videolink;
        $product->mainslider = $request->mainslider;
        $product->bestrated = $request->bestrated;
        $product->save();
        $notification = array(
            'messege' => 'Product Inserted Successfully',
            'alert-type' => 'success',
        );
        return back()->with($notification);
    }

    public function edit($id)
    {
        $product = Product::findorFail($id);
        $category = Category::all();
        $brand = Brand::all();
        $subcate = Subcate::all();
        return view('admin.product.editproduct',compact('product','category','subcate','brand'));
    }

    public function update(Request $request,$id)
    {
        $updateImage = Product::findorFail($id);
        if($updateImage->image){
            foreach(json_decode($updateImage->image) as $image){
                unlink('public/file/'.$image);
            }
        }
        if($request->hasFile('image')){
            foreach($request->file('image') as $image)
            {
                $name = $image->getClientOriginalName();
                
                $image->move(public_path('file'),$name);

                $data[] = $name;
            }
        }
        $product = array();
        $product['category_id'] = $request->category;
        $product['image'] = json_encode($data);
        $product['subcate_id'] = $request->subcate;
        $product['brand_id'] = $request->brand;
        $product['user_id'] = $request->input('user_id');
        $product['name'] = $request->name;
        $product['code'] = $request->code;
        $product['en_details'] = $request->en_details;
        $product['bn_details'] = $request->bn_details;
        $product['quantity'] = $request->quantity;
        $product['color'] = $request->color;
        $product['size'] = $request->size;
        $product['selling_price'] = $request->selling_price;
        $product['discount_price'] = $request->discount_price;
        $product['hotdeal'] = $request->hotdeal;
        $product['bestdeal'] = $request->bestdeal;
        $product['midslider'] = $request->midslider;
        $product['hotnew'] = $request->hotnew;
        $product['trend'] = $request->trend;
        $product['buyone_getone'] = $request->buyone_getone;
        $product['status'] = $request->status;
        $product['videolink'] = $request->videolink;
        $product['mainslider'] = $request->mainslider;
        $product['bestrated'] = $request->bestrated;

        $data = Product::where('id',$id)->update($product);
        $notification = array(
            'messege' => 'Product Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect('/admin/product/addproduct')->with($notification);
    }




    //----Delete----//
    public function destroy(Product $id)
    {
        if($id->image){
            foreach(json_decode($id->image) as $image){
            unlink('public/file/'.$image);
            }
        }

        $id->delete();
        $notification = array(
            'messege' => 'Product Deleted Successfully',
            'alert-type' => 'success',
        );
        return back()->with($notification);
    }



}
