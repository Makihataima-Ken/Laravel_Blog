<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\User;
use illuminate\Support\Facades\Auth;
use App\Models\Post;
   

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
}
