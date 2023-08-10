<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        $cats = Category::all();
        $coupons = Coupon::all();
        $products = Product::paginate(10);
        return view('admin.product.manage',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $coupons = Coupon::where('status', 'active')->get();
        $brands = Brand::where('status', 'active')->get();
        $cats = Category::where('status', 'active')->get();
        return view('admin.product.add', get_defined_vars());
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
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category' => 'required',
            'brand_id' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $product = new Product();
        $product->name = $request->name;
        $slug=Str::slug($request->name);
        $count=Product::where('slug',$slug)->count();
        if($count>0){
            $slug=$slug.'-'.date('ymdis').'-'.rand(0,999);
        }
        $product->slug = $slug;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->brand_id = $request->brand;
        $product->category_id = $request->category;
        $product->coupon_id = $request->coupon;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/productimages');
            $image->move($destinationPath, $name);
            $product->image = $name;
        }
        $product->save();
        return redirect()->route('products.index')->with('success','Product created successfully.');
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
        $pro = Product::where('id', $id)->first();
        $coupons = Coupon::where('status', 'active')->get();
        $brands = Brand::where('status', 'active')->get();
        $cats = Category::where('status', 'active')->get();
        return view('admin.product.update',get_defined_vars());
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
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category' => 'required',
            'brand' => 'required',

            // 'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $product = Product::where('id', $request->id)->first();
        $product->name = $request->name;

        $slug=Str::slug($request->name);
        $count=Product::where('slug',$slug)->count();
        if($count>0){
            $slug=$slug.'-'.date('ymdis').'-'.rand(0,999);
        }
        $product->slug = $slug;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->brand_id = $request->brand;
        $product->category_id = $request->category;
        $product->coupon_id = $request->coupon;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/productimages');
            $image->move($destinationPath, $name);
            $product->image = $name;
        }
        $product->save();
        return redirect()->route('products.index')->with('success','Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Product $product,$id)
    {
        $product->find($id)->delete();
        return back()->withError("Deleted sucessfully!");
    }
}
