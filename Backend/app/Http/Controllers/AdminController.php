<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function post_page()
    {
        return view('admin.post_page');
    }

    public function add_post(Request $request)
    {
        $user=Auth::user();
        $user_id=$user->id;
        $user_name=$user->name;
        $user_type=$user->usertype;

        $post= new Post();
         $post->title=$request->title;
         $post->description=$request->description;
         $post->status='active';
         $post->user_id=$user_id;
         $post->name=$user_name;
         $post->usertype=$user_type;
         $image=$request->image;
         if($image){
            $imageName=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('postimage',$imageName);//save img in a folder
            $post->image=$imageName;
         }

         $post->save();
        return redirect()->back()->with('message','posted successfuly');
    }
}
