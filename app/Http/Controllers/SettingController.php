<?php

namespace App\Http\Controllers;

use Session;
use App\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $requestw
     * @return \Illuminate\Http\Response
     */

    public function edit(Setting $setting)
    {
        $setting = Setting::first();
        return view('admin.setting.edit',compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {

        $this->validate($request,[
            'name' => 'required',
            'copyright' => 'required',

        ]);




        $setting = Setting::first();
        $setting->update($request->all());

        if($request->hasFile('site_logo')){
            $image = $request->site_logo;
            $image_new_name = time().'.'.$image->getClientOriginalExtension();
            $image->move('storage/settings/',$image_new_name);
            $setting->site_logo = '/storage/settings/'.$image_new_name;
            $setting->save();
        }


        Session::flash('success', 'Settings updated successfully');
        return redirect()->back();


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */

}
