<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cops = Coupon::paginate(10);
        return view('admin.coupon.manage', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.coupon.add');
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
            'coupon_code'=> 'required',
            'discount_price'=> 'required'
        ]);
        $coupon = new Coupon();
        $coupon->coupon_code = $request->coupon_code;
        $coupon->discount_price = $request->discount_price;
        $coupon->status = $request->status;

        $coupon->save();
        return redirect()->route('coupons.index');
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
        $coupon = Coupon::where('id', $id)->first();
        return view('admin.coupon.update', compact('coupon'));
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
        $coupon = Coupon::where('id', $id)->first();
        if(!is_null($coupon)){
            $coupon->coupon_code = $request->coupon_code;
            $coupon->discount_price = $request->discount_price;
            $coupon->status = $request->status;
            $coupon->save();
        }
        return redirect()->route('coupons.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $coupon = Coupon::where('id', $id)->first();
        $coupon->delete();
        return redirect()->route('coupons.index');
    }

    public function status($id){
        $category = Coupon::where('id', $id)->first();
        if($category->status == 'active'){
            $category->status = 'inactive';
        }else{
            $category->status = 'active';
        }
        $category->save();
        return redirect()->route('coupons.index');

    }

}
