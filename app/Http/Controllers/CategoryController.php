<?php

namespace App\Http\Controllers;
use App\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function add_category()
    {
        $category = Category::all();
    	return view('admin.category.addcategory',compact('category'));
    }
    public function store()
    {
    	$id = Category::create($this->validateRequest());
        $this->storeImage($id);
        $notification = array(
            'messege' => 'Category added Successfully',
            'alert-type' => 'success',
        );
    	return redirect('/admin/category/add_category')->with($notification);
    }

    public function editcategory($id)
    {
        $category = Category::findorFail($id);
        return view('admin.category.editcategory',compact('category'));
    }

    public function update(Category $id)
    {
        if($id->image){
        unlink('storage/app/public/' . $id->image);
        }
        $id->update($this->validateRequest());
        $this->storeImage($id);
        $notification = array(
            'messege' => 'Category Update Successful',
            'alert-type' => 'success',
        );
        return redirect('/admin/category/add_category')->with($notification);
    }

    public function delete(Category $id)
    {   
        unlink('storage/app/public/' . $id->image);
        $id->delete();
        $notification = array(
            'messege' => 'Category Deleted Successfully',
            'alert-type' => 'error',
        );
        return back()->with($notification);
    }

    private function validateRequest()
    {
        return request()->validate([
            'cate_name'=>'required|min:3',
            'cate_name_bn'=>'required',
            'image' =>'sometimes|file|image|max:5000',
        ]);
    }

    private function storeImage($id)
    {
        if(request()->hasFile('image')){
            $id->update([
                'image' => request()->image->store('category','public'),
            ]);
        }
    }
}
