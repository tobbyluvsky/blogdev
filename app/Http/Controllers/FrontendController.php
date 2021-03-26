<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home(){

        $posts = Post::orderBy('created_at','DESC')->take(5)->get();
        $recentPosts = Post::with('category','user')->orderBy('created_at','DESC')->paginate(10);

        return view('website.index',compact('posts','recentPosts'));
    }

    public function category(){
        return view('website.category');
    }

    public function post($slug){
        $post = Post::with('category','user')->where('slug',$slug)->first();

        if ($post){
            return view('website.post',compact('post'));
        }
        else{
            return redirect('/');
        }

    }

}
