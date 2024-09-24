<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function post_page()
    {
        return view('admin.post_page');
    }

    public function add_post(Request $request)
    {
        $post= new Post();
         $post->title=$request->title;
         $post->description=$request->description;
         $image=$request->image;
         $imageName=time().'.'.$image->getClientOriginalExtension();
         $post->save();
        return redirect()->back();
    }
}
