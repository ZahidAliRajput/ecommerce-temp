<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Posttag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PosttagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posttags = Posttag::paginate(10);
        return view('admin.posttag.manage', compact('posttags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $posttags = Posttag::all();
        return view('admin.posttag.add', compact('posttags'));
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
    
        $posttag = new Posttag();
        $posttag->title = $request->title;
        $slug=Str::slug($request->title);
        $count=Posttag::where('slug',$slug)->count();
        if($count>0){
            $slug=$slug.'-'.date('ymdis').'-'.rand(0,999);
        }
        $posttag->slug = $slug;
        
        $posttag->status = $request->status;
        $posttag->save();
        return redirect()->route('posttags.index')->with('success','posttag created successfully.');
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
        $posttag = Posttag::where('id', $id)->first();
        return view('admin.posttag.update', compact('posttag'));
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
    
        $posttag = Posttag::where('id', $request->id)->first();        
        if($posttag->title != $request->title){
            $slug=Str::slug($request->title);
            $count=Posttag::where('slug',$slug)->count();
            if($count>0){
                $slug=$slug.'-'.date('ymdis').'-'.rand(0,999);
            }
            $posttag->slug = $slug;   
        }
        $posttag->title = $request->title;
        $posttag->status = $request->status;
        $posttag->save();  return redirect()->route('posttags.index')->with('success','posttag updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Posttag $posttag,$id)
    {
        $posttag->find($id)->delete();
        return back()->withError("Deleted sucessfully!");
    }
}
