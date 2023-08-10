<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::paginate(10);
        return view('admin.banner.manage', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $banners = Banner::all();
        return view('admin.banner.add', compact('banners'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            // 'slug' => 'required|unique:banners,slug',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required'
        ]);
        $banner = new Banner();
        $banner->title = $request->title;
        $banner->description = $request->description;
        $slug=Str::slug($request->title);
        $count=Banner::where('slug',$slug)->count();
        if($count>0){
            $slug=$slug.'-'.date('ymdis').'-'.rand(0,999);
        }
        $banner->slug = $slug;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/bannerimages');
            $image->move($destinationPath, $name);
            $banner->image = $name;
        }
        $banner->status = $request->status;
        $banner->save();
        return redirect()->route('banners.index')->with('success','banner created successfully.');
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
    public function edit($id)
    {
        $banner = Banner::where('id', $id)->first();
        return view('admin.banner.update', compact('banner'));
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
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            // 'slug' => 'required|unique:banners,slug',
            // 'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required'
        ]);

        $banner = banner::where('id', $request->id)->first();
        $banner->description = $request->description;

        if($banner->title != $request->title){
            $slug=Str::slug($request->title);
            $count=Banner::where('slug',$slug)->count();
            if($count>0){
                $slug=$slug.'-'.date('ymdis').'-'.rand(0,999);
            }
            $banner->slug = $slug;
        }
        $banner->title = $request->title;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/bannerimages');
            $image->move($destinationPath, $name);
            $banner->image = $name;
        }
        $banner->status = $request->status;
        $banner->save();  return redirect()->route('banners.index')->with('success','banner updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Banner $banner,$id)
    {
        $banner->find($id)->delete();
        return back()->withError("Deleted sucessfully!");
    }

    public function status($id){
        $category = Banner::where('id', $id)->first();
        if($category->status == 'active'){
            $category->status = 'inactive';
        }else{
            $category->status = 'active';
        }
        $category->save();
        return redirect()->route('banners.index');

    }

}
