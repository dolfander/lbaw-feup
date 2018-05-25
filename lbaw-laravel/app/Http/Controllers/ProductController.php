<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function page($id){
        $product = Product::find($id);

        return view('product.page',compact('product'));
    }

    
    public function favorite($id){
        Auth::user()->favorites()->attach($id);

        $product = Product::find($id);
        return $product;
    }

    public function unfavorite($id){
        Auth::user()->favorites()->detach($id);

        $product = Product::find($id);
        return $product;
    }
}
