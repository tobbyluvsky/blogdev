<?php

namespace App\Http\Controllers;

use Session;
use App\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function newsletter()
    {
        $newsletter = Newsletter::latest()->paginate(10);
        return view('admin.newsletter.index',compact('newsletter'));
    }



    public function store(Request $request)
    {

        $this->validate($request,[
            'email' => 'required|email|max:200',
        ]);


        $newsLetter = Newsletter::create($request->all());

        Session::flash('success', 'newsletter sent successfully');
        return redirect()->back();
    }



    public function delete($id)
    {
        $newsletter = Newsletter::find($id);
        $newsletter->delete();
        Session::flash('error','$newsletter deleted succesfully');

        return redirect()->back();
    }
}
