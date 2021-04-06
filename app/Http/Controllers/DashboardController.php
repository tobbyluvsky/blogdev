<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $posts = Post::orderBy('created_at','DESC')->take(10)->get();
        $postsCount = Post::all()->count();
        $categoriesCount = Category::all()->count();
        $tagsCount = Tag::all()->count();
        $usersCount = User::all()->count();
        return view('admin.dashboard.index',compact('posts','postsCount','categoriesCount','tagsCount','usersCount'));
    }
}
