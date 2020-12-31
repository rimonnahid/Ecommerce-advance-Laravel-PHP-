<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Postcategory;

class PostcategoryController extends Controller
{
    public function create()
    {
    	$postcate = Postcategory::latest()->get();
        $count = 1;
    	return view('admin.post.postcategory.create',compact('postcate','count'));
    }

    public function store()
    {
    	$data = Postcategory::create($this->validateData());
    	$notification = array(
    		'messege' => 'Post Category Inserted',
    		'alert-type' =>'success',
    	);
    	return redirect('/admin/post/postcategory/create')->with($notification);
    }

    public function edit($id)
    {
    	$data = Postcategory::findorFail($id);
    	return view('admin.post.postcategory.edit',compact('data'));
    }

    public function update(Postcategory $id)
    {
    	$id->update($this->validateData());
    	$notification = array(
    		'messege' => 'Post Category Updated Successfully',
    		'alert-type' => 'success',
    	);
    	return redirect('/admin/post/postcategory/create')->with($notification);
    }

    public function destroy(Postcategory $id)
    {
    	$id->delete();
    	$notification = array(
    		'messege' => 'Post Category Destroyed',
    		'alert-type' => 'error',
    	);
    	return redirect()->back()->with($notification);
    }

    //private functions
    
    private function validateData()
    {
    	return request()->validate([
            'cate_name'=>'required|min:3',
            'cate_name_bn'=>'required',
        ]);
    }
}
