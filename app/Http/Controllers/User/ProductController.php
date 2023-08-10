<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function onsale(){
        $products = Product::all();
        $latest_products = Product::latest()->first();
        return view('user.product.onsale', get_defined_vars());
    }
}
