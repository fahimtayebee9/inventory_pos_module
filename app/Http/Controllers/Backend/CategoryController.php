<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderby('name','asc')->where('sub_category', 0)->paginate(10);
        return view('backend.pages.category.manage', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.category.create');
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

        $category = new Category();
        $category->name                 = $request->name;
        $category->slug                 = Str::slug($request->name);
        $category->description          = $request->description;
        $category->sub_category         = $request->sub_category;
        $category->status               = $request->status;

        $category->save();

        $notification = array(
            'alert-type' => 'success',
            'message'    => 'Category Has Been Created Successfully.',
        );

        return redirect()->route('category.manage')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $category = Category::where('slug', $slug)->get()->first();
        if( !is_null($category) ){

            return view('backend.pages.category.edit', compact('category'));
        }
        else{
            $notification = array(
                'alert-type' => 'danger',
                'message'    => 'No Category Found!!'
            );
            return redirect()->route('category.manage')->with($notification);
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

        $category = Category::find($id);
        $category->name                 = $request->name;
        $category->slug                 = Str::slug($request->name);
        $category->description          = $request->description;
        $category->sub_category         = $request->sub_category;
        $category->status               = $request->status;

        $category->save();

        $notification = array(
            'alert-type' => 'success',
            'message'    => 'Category Has Been Updated Successfully.',
        );

        return redirect()->route('category.manage')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);

        $notification = array(
            'alert-type' => '',
            'message'    => '',
        );

        if( !is_null($category) ){
            $category->delete();

            $notification = array(
                'alert-type' => 'success',
                'message'    => 'Category Has Been Deleted Successfully...',
            );

            return redirect()->route('category.manage')->with($notification);
        }
        else{
            $notification = array(
                'alert-type' => 'danger',
                'message'    => 'Category Not Deleted...',
            );
            return redirect()->route('category.manage')->with($notification);
        }
    }
}
