<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Postcategory;
use Session;

class BlogController extends Controller
{
    public function index()
    {
        $blogpost = Post::all();
    	return view('blog',compact('blogpost'));
    }

    public function single($id)
    {
        $blogsingle = Post::findorFail($id);
        return view('blogsingle',compact('blogsingle'));
    }

    public function bangla()
    {
        Session::forget('lang');
        Session::put('lang','bangla');
        return redirect()->back();
    }

    public function english()
    {
        Session::forget('lang');
        Session::put('lang','english');
        return redirect()->back();
    }

    public function create()
    {
        $count = 1;
    	$post = Post::latest()->get();
    	$postcate = Postcategory::all();
    	return view('admin.post.post',compact('postcate','post','count'));
    }

    public function store()
    {
    	$post = Post::create($this->validateData());
        $this->storeImage($post);
    	$notification = array(
    		'messege' =>'Post Added Successful',
    		'alert-type' =>'success'
    	);
    	return redirect()->back()->with($notification);
    }

    public function edit(Post $post)
    {
    	$postcate = Postcategory::all();
    	return view('admin.post.editpost',compact('post','postcate'));
    }

    public function update(Post $post)
    {
        if($post->image){
        unlink('storage/app/public/' . $post->image);
        }
    	$post->update($this->validateData());
        $this->storeImage($post);
    	$notification = array(
    		'messege' =>'Post Added Successful',
    		'alert-type' =>'success'
    	);
    	return redirect('admin/post/post')->with($notification);
    }

    public function destroy(Post $post)
    {
        unlink('storage/app/public/' . $post->image);
    	$post->delete();
    	$notification = array(
    		'messege' => 'Blog post deleted successfull',
    		'alert-type' => 'error'
    	);
    	return redirect()->back()->with($notification);
    }



    //private function 
    private function validateData()
    {
    	return request()->validate([
    		'postcategory_id' => '',
    		'title' => 'required',
    		'title_bn' => 'required',
    		'description' => 'required',
    		'description_bn' => 'required',
            'image' =>'sometimes|file|image|max:5000',
    	]);
    }

    private function storeImage($post)
    {
        if(request()->hasFile('image')){
            $post->update([
                'image' => request()->image->store('blogpost','public'),
            ]);
        }
    }
}
