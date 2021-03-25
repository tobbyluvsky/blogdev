<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Support\Facades\Storage;
use Session;
use App\Category;
use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at','DESC')->paginate(10);
        return view('admin.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.post.create',compact('tags','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|unique:posts,title',
            'image' => 'required|image',
            'description' => 'required',
            'category' => 'required',
        ]);

        $post = Post::create([

            'title' => $request->title,
            'slug' => Str::slug( $request->title,'-'),
            'image' => 'image.jpg',
            'description' => $request->description,
            'category_id' => $request->category,
            'user_id' => auth()->user()->id,
            'published_at' => Carbon::now(),
        ]);

        $post->tags()->attach($request->tags);


        if($request->hasFile('image')){
            $image = $request->image;
            $image_new_name = time().'.'.$image->getClientOriginalExtension();
            $image->move('storage/post/',$image_new_name);
            $post->image = '/storage/post/'.$image_new_name;
            $post->save();
        }



        Session::flash('success', 'Post created successfully');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.post.edit',compact('post','categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {

        $this->validate($request,[
            'title' => "required|unique:posts,title,$post->id",
            'description' => 'required',
            'category' => 'required',
        ]);


             $post->title = $request->title;
             $post->slug = Str::slug( $request->title,'-');
             $post->description = $request->description;
             $post->category_id = $request->category;
             $post->user_id = auth()->user()->id;
             $post->published_at = Carbon::now();


        $post->tags()->sync($request->tags);

        if($request->hasFile('image')){
            $image = $request->image;
            $image_new_name = time().'.'.$image->getClientOriginalExtension();
            $image->move('storage/post/',$image_new_name);
            $post->image = '/storage/post/'.$image_new_name;

        }

        $post->save();



        Session::flash('success', 'Post updated successfully');
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if ($post){
            if (file_exists(public_path($post->image))){
                unlink(public_path($post->image));
            }
            $post->delete();
            Session::flash('success', 'Post deleted successfully');
        }
        return redirect()->back();
    }
}
