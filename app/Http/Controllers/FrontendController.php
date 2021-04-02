<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home(){


        //first category posts
        $posts = Post::with('category','user')->orderBy('created_at','DESC')->take(5)->get();
        $firstPost2 = $posts->splice(0,2);
        $middlePost = $posts->splice(0,1);
        $lastPost = $posts->splice(0);

        //footer category posts
        $footerPosts = Post::with('category','user')->inRandomOrder()->limit(4)->get();
        $firstFooterPost = $footerPosts->splice(0,1);
        $middleFooterPost2 = $footerPosts->splice(0,2);
        $lastFooterPost = $footerPosts->splice(0,1);


        //for general post
        $recentPosts = Post::with('category','user')->orderBy('created_at','DESC')->paginate(10);

        return view('website.index',compact('posts','recentPosts','firstPost2','middlePost','lastPost','firstFooterPost','middleFooterPost2','lastFooterPost'));
    }

    public function category($slug){
        $category = Category::where('slug',$slug)->first();


        if ($category){
            $posts = Post::where('category_id',$category->id)->paginate(9);
            return view('website.category',compact('category','posts'));
        }else{
            return view('website.index');
        }

    }

    public function post($slug){
        $post = Post::with('category','user')->where('slug',$slug)->first();
        $posts =  Post::with('category','user')->inRandomOrder()->limit(4)->get();

        $relatedPosts = Post::orderBy('category_id','desc')->inRandomOrder()->take(4)->get();
        $firstRelatedFooterPost = $relatedPosts->splice(0,1);
        $middleRelatedFooterPost2 = $relatedPosts->splice(0,2);
        $lastRelatedFooterPost = $relatedPosts->splice(0,1);


        $categories = Category::latest()->take(5)->get();
        $tags = Tag::all();
        if ($post){
            return view('website.post',compact('post','posts','categories','tags','firstRelatedFooterPost','middleRelatedFooterPost2','lastRelatedFooterPost'));
        }
        else{
            return redirect('/');
        }

    }

}
