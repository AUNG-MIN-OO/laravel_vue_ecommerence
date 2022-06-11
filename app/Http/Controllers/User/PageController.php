<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PageController extends Controller
{
    public function index(){
        $product = Product::latest()->with('category')->paginate(6);
        return Inertia::render('User/Index',['product'=>$product]);
    }

    public function productDetail($slug){
        $product = Product::where('slug',$slug)->with('category')->first();

        return Inertia::render('User/ProductDetail',['product'=>$product]);
    }

    public function productByCategory($slug){
        $category_id = Category::where('slug',$slug)->first()->id;
        $product = Product::where('category_id',$category_id)->with('category')->latest()->paginate(6);

        return Inertia::render('User/Index',['product'=>$product]);
    }

    public function productSearch($keyword){
        $product = Product::where('name','like','%'.$keyword.'%')->with('category')->latest()->paginate(6);

        return Inertia::render('User/Index',['product'=>$product]);
    }
}
