<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $products = Product::with('category')->get();
        $sliders = Product::inRandomOrder()->take(3)->get();
        $cats = Category::all();
        $latest_products = Product::latest()->limit(4)->get();
        return view('user.index', get_defined_vars());
    }
    public function about(){
        return view('user.pages.about');
    }
    public function cart(){
        return view('user.pages.cart');
    }
    public function contactus(){
        return view('user.pages.contactus');
    }
    public function checkout(){
        return view('user.pages.checkout');
    }
    public function shop(){
        return view('user.pages.shop');
    }
}
