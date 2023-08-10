<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class ShopController extends Controller
{
    public function index(){
        $products = Product::paginate(10);
        $cats = Category::get();
        return view('user.pages.shop', get_defined_vars());
    }
    public function filterbycategory($slug){
        $cats = Category::all();
        $cat = Category::where('slug',$slug)->first();
        if(!empty($cat)){
            $products = Product::where('category_id', $cat->id)->paginate(10);
            // dd($products);
        }
        return view('user.pages.shop', compact('cats', 'products'));
    }
    public function addtocart($id){
        $product = Product::findOrFail($id);
        // session()->forget('cart');
        // dd(session('cart'));
        if(session('cart')){
            $cart = session('cart');
            dd($cart);
            foreach($cart ?? [] as $c){
                if($id != $c){
                    $cart =array_merge($cart,[$id]);
                }
            }
            session(['cart'=>$cart]);
        }else{
            session(['cart'=>[$id]]);
        }

        dd(session('cart'));
        return redirect('addtocart')->with('success', 'Product added to cart successfully!');


        // $cart = [];
        $cart = session()->get('cart', []);
        $cart[] = $id;

        if(!in_array($id,$cart)){
            session()->put('cart', $cart);
        }
        dd(session('cart'));



        // $cart = session()->get('cart', []);
        // // $cart[] = $id;
        // // dd($cart);
        // if(!in_array($id,$cart)){
        //     $cart1 = session()->get('cart', []);
        //     $cart1[] = $id;
        //     // dd($cart);
        //     session()->put('cart', $cart1);
        // }
        // dd(session('cart'));
    }

}
