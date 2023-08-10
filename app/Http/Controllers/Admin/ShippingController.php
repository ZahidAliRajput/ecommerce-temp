<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shippings = Shipping::paginate(10);
        return view('admin.shipping.manage', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $shippings = Shipping::all();
        return view('admin.shipping.add', compact('shippings'));
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
            'type' => 'required',
            'price' => 'required',
            'status' => 'required'
        ]);

        $shipping = new Shipping();
        $shipping->type = $request->type;
        $shipping->price = $request->price;
        $shipping->status = $request->status;
        $shipping->save();
        return redirect()->route('shippings.index')->with('success','shipping created successfully.');
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
        $shipping = Shipping::where('id', $id)->first();
        return view('admin.shipping.update', compact('shipping'));
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
            'type' => 'required',
            'price' => 'required',
            'status' => 'required'
        ]);

        $shipping = Shipping::where('id', $request->id)->first();
        $shipping->type = $request->type;
        $shipping->price = $request->price;
        $shipping->status = $request->status;
        $shipping->save();  return redirect()->route('shippings.index')->with('success','shipping updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Shipping $shipping,$id)
    {
        $shipping->find($id)->delete();
        return back()->withError("Deleted sucessfully!");
    }
}
