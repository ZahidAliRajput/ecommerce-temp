<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Postcat;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostcatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postcats = Postcat::paginate(10);
        return view('admin.postcat.manage',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $postcats = Postcat::all();
        return view('admin.postcat.add', compact('postcats'));
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
            'status' => 'required'
        ]);

        $postcat = new Postcat();
        $postcat->title = $request->title;
        $slug=Str::slug($request->title);
        $count=Postcat::where('slug',$slug)->count();
        if($count>0){
            $slug=$slug.'-'.date('ymdis').'-'.rand(0,999);
        }
        $postcat->slug = $slug;

        $postcat->status = $request->status;
        $postcat->save();
        return redirect()->route('postcats.index')->with('success','postcat created successfully.');
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
        $postcat = Postcat::where('id', $id)->first();
        return view('admin.postcat.update', compact('postcat'));
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
            'status' => 'required'
        ]);

        $postcat = Postcat::where('id', $request->id)->first();
        if($postcat->title != $request->title){
            $slug=Str::slug($request->title);
            $count=Postcat::where('slug',$slug)->count();
            if($count>0){
                $slug=$slug.'-'.date('ymdis').'-'.rand(0,999);
            }
            $postcat->slug = $slug;
        }
        $postcat->title = $request->title;
        $postcat->status = $request->status;
        $postcat->save();  return redirect()->route('postcats.index')->with('success','postcat updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Postcat $postcat,$id)
    {
        $postcat->find($id)->delete();
        return back()->withError("Deleted sucessfully!");
    }
}
