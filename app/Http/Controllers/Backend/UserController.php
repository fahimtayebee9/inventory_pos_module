<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Image;
use Illuminate\Support\Str;
use File;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('backend.pages.user.manage', compact('users') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|max: 255',
            ],
            [
                'name.required' => 'Please Insert Category Name',
            ]
        );

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->status = $request->status;
        $user->user_type = $request->user_type;

        if( !is_null( $request->image ) ){
            $image = $request->file('image');
            $img   = rand() . '.' . $image->getClientOriginalExtension();
            $loc   = public_path('Backend/img/user/' . $img); 
            Image::make($image)->save($loc);
            $user->image = $img;
        }

        $user->save();

        $notification = array(
            'alert-type' => 'success',
            'message'    => 'User Has Been Added Successfully.',
        );

        return redirect()->route('user.manage')->with($notification);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $user = User::where('slug', $slug)->get()->first();

        if( !is_null($user) ){
            return view('backend.pages.user.profile', compact('user') );
        }
        else{
            $notification = array(
                'alert-type' => 'success',
                'message'    => 'No user Data Found.',
            );
    
            return redirect()->route('user.manage')->with($notification);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $user = User::where('slug', $slug)->get()->first();

        if( !is_null($user) ){
            return view('backend.pages.user.edit', compact('user') );
        }
        else{
            $notification = array(
                'alert-type' => 'success',
                'message'    => 'No user Data Found.',
            );
    
            return redirect()->route('user.manage')->with($notification);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'name' => 'required|max: 255',
            ],
            [
                'name.required' => 'Please Insert Category Name',
            ]
        );

        $user = User::find($id);

        $user->name         = $request->name;
        $user->slug         = Str::slug($request->name);
        $user->email        = $request->email;
        $user->password     = Hash::make($request->password);
        $user->phone        = $request->phone;
        $user->address      = $request->address;
        $user->status       = $request->status;
        $user->user_type    = $request->user_type;

        if( !is_null( $request->image ) ){

            if( File::exists('Backend/img/user/'.$user->image) ){
                File::delete('Backend/img/user/'.$user->image);
            }

            $image = $request->file('image');
            $img   = rand() . '.' . $image->getClientOriginalExtension();
            $loc   = public_path('Backend/img/user/' . $img); 
            Image::make($image)->save($loc);
            $user->image = $img;
        }

        $user->save();

        $notification = array(
            'alert-type' => 'success',
            'message'    => 'User Has Been Updated Successfully.',
        );

        return redirect()->route('user.manage')->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if( !is_null($user) ){

            if( File::exists('Backend/img/user/'.$user->image) ){
                File::delete('Backend/img/user/'.$user->image);
            }

            $user->delete();

            $notification = array(
                'alert-type' => 'success',
                'message'    => 'User Removed Successfully.',
            );

            return redirect()->route('user.manage')->with($notification);
        }
        else{
            $notification = array(
                'alert-type' => 'success',
                'message'    => 'No user Data Found.',
            );
    
            return redirect()->route('user.manage')->with($notification);
        }
    }
}
