<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class AdminController extends Controller
{
    public function post_page()
    {
        return view('admin.post_page');
    }

    public function show_post()
    {
        $post=Post::all();
        return view('admin.show_post',compact('post'));
    }

    public function delete_post($id)
    {
        $post=Post::find($id);
        $post->delete();
        return redirect()->back()->with('message','post deleted successfully');
    }

    public function edit_post($id)
    {
        $post=Post::find($id);
        return view('admin.edit_page',compact('post'));
    }

    public function update_post(Request $request,$id)
    {
        $post=Post::find($id);

        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Update the post attributes
        $post->fill([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        // Handle image upload if present
        if ($request->hasFile('image')) {
            // Optionally delete the old image if necessary
            if ($post->image) {
                Storage::delete('postimage/' . $post->image);
            }

            // Store new image
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move('postimage', $imageName);
            $post->image = $imageName;
        }

        $post->save();

        return redirect()->back()->with('message','post updated successfuly');
    }

    public function add_post(Request $request)
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
            'status' => 'active',
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
        return redirect()->back()->with('message','posted successfuly');
    }
}
