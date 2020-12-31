<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Brand;

class BrandController extends Controller
{
    public function add_brand()
    {
        $brand = Brand::all();
    	$category = Category::all();
    	return view('admin.brand.addbrand',compact('category','brand'));
    }

    public function store_brand()
    {
    	$brand = Brand::create($this->validateData());
        $this->storeImage($brand);
        $notification = array(
            'messege' => 'Brand Inserted',
            'alert-type' =>'success',
        );
    	return redirect('/admin/brand/add_brand')->with($notification);
    }


    public function edit_brand(Brand $brand)
    {
        $category = Category::all();
        return view('admin.brand.editbrand',compact('brand','category'));
    }

    public function update(Brand $brand)
    {
        if($brand->image){
            unlink('storage/app/public/' . $brand->image);
        }
        $brand->update($this->validateData());
        $this->storeImage($brand);
        $notification = array(
            'messege' => 'Brand Updated',
            'alert-type' =>'success',
        );
        return redirect('/admin/brand/add_brand')->with($notification);
    }

    public function destroy(Brand $brand)
    {
        unlink('storage/app/public/' . $brand->image);
        $brand->delete();
        $notification = array(
            'messege' => 'Brand Destroyed!!',
            'alert-type' =>'error',
        );
        return redirect('/admin/brand/add_brand')->with($notification);
    }


    //-------private function--------//
    private function validateData()
    {
        return request([
            'brand_name',
            'state',
            'address',
            'email',
            'description',
            'image'=>'sometimes|file|image|max:6000',
        ]);
    }

    private function storeImage($brand)
    {
        if(request()->has('image')){
            $brand->update([
                'image'=>request()->image->store('brands','public'),
            ]);
        }
    }


}
