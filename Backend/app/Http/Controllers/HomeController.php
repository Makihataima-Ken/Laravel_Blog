<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\User;
use illuminate\Support\Facades\Auth;
use App\Models\Post;
use RealRashid\SweetAlert\Facades\Alert;
   

class HomeController extends Controller
{
    public function index()
    {
        if(Auth::id()){
            $usertype=Auth::user()->usertype;

            if($usertype=='user')
            {
                $post=Post::all();
                return view('home.homepage',compact('post'));
            }
            else if($usertype=='admin'){

                return view('admin.index');

            }
            else return redirect()->back();
        }

    }

    public function homepage()
    {
        $post=Post::all();
        return view('home.homepage',compact('post'));
    }

    public function create_post()
    {
        return view('home.create_post');
    }

    public function post_details($id)
    {
        $post=Post::find($id);
        return view('home.post_details',compact('post'));
    }

    public function user_post(Request $request)
    {
        $user=Auth::user();

        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Create a new post instance with mass assignment
        $post = new Post([
            'title' => $request->title,
            'description' => $request->description,
            'status' => 'pending',
            'user_id' => $user->id,
            'name' => $user->name,
            'usertype' => $user->usertype,
        ]);
        
         // Handle image upload if present
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move('postimage', $imageName);
            $post->image = $imageName;
        }

        $post->save();
        Alert::success('congrats','you made a post');
        return redirect()->back()->with('message','posted successfuly');
    }
}
