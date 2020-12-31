<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subcate;
use App\Category;

class SubcateController extends Controller
{
    public function create()
    {
        $subcate = Subcate::latest()->get();
    	$category = Category::all();
        $count= 1;
    	return view('admin.category.subcate.addsubcate',compact('category','subcate','count'));
    }

    public function store()
    {
    	$brand = Subcate::create($this->validateData());
        $notification = array(
            'messege' => 'Sub-Category added Successfully',
            'alert-type' => 'success',
        );
    	return redirect('/admin/category/add_subcate')->with($notification);
    }

    public function edit(Subcate $subcate)
    {
        $category = Category::all();
        return view('admin.category.subcate.editsubcate',compact('category','subcate'));
    }

    public function update(Subcate $subcate)
    {
        $subcate->update($this->validateData());
        $notification = array(
            'messege' => 'Category Updated Successful',
            'alert-type' => 'success',
        );
        return redirect('/admin/category/add_subcate')->with($notification);
    }

    public function destroy(Subcate $subcate)
    {
        $subcate->delete();
        $notification = array(
            'messege' => 'Sub-Category Deleted Successful',
            'alert-type' => 'error',
        );
        return back();
    }

    private function validateData()
    {
    	return request()->validate([
            'category_id'=>'required',
            'name'=> 'required',
            'name_bn'=> 'required',
        ]);
    }


}
