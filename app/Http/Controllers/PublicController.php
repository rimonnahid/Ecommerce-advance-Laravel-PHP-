<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Category;
use App\Subcate;
use App\Product;
use App\Brand;
use Image;




class PublicController extends Controller
{
    public function index()
    {

        $product = Product::latest()->get();
        $category = Category::all();
    	$brand = Brand::all();
        $relatedproduct = Product::inRandomOrder()->skip(0)->take(6)->get();
    	return view('home',compact('product','brand','category','relatedproduct'));
    }

    public function search(Request $request)
    { 
        $search = $request->input('search');
        $product = Product::where('name','LIKE', "%$search%")->latest()->paginate(12);
        $categories = array();
        $subcate = array();
        $brands = array();
        if (count($product) == 0) {
            $categories = Category::where('cate_name','LIKE', "%$search%")->latest()->paginate(12);
            if (count($categories) == 0) {
                $subcate = Subcate::where('name','LIKE',"%$search%")->latest()->paginate(12);
                if (count($subcate) == 0) {
                $brands = Brand::where('brand_name','LIKE',"%$search%")->latest()->paginate(12);
            }
            }
        }
        return view('search',compact('product','search','categories','subcate','brands'));
    }

    public function categoryPosts($id)
    {
		$category = Category::findorFail($id);
		$product = $category->product()->latest()->paginate(20);
        $relatedproduct = $category->product()->inRandomOrder()->take(6)->get();
		return view('category',compact('category','product','relatedproduct'));

    }

    public function brandPosts($id)
    {
        $brand = Brand::findorFail($id);
        $product = $brand->Product()->latest()->paginate(20);
        return view('brand',compact('brand','product'));
    }

    public function subcatePosts($id)
    {
        $subcate = Subcate::findorFail($id);
        $product = $subcate->Product()->latest()->get();
        return view('subcate',compact('subcate','product'));
    }

    public function contact()
    {
        return view('contact');
    }




}