<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Inertia\Inertia;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::latest()->paginate(5);
        return Inertia::render('Admin/Product/Index',['product' => $product]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat = Category::all();
        return Inertia::render('Admin/Product/Create',['cat' => $cat]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        validate data
        $request->validate([
            "name" => "required",
            "image" => "required|mimes:jpg,png,jpeg",
            "description" => "required",
            "price" => "required|numeric",
            "category_id" => "required",
        ]);

//        image file upload to public/image folder
        $image = $request->file('image');
        $new_image_name = uniqid().$image->getClientOriginalName();
        $image->move(public_path('/Image'),$new_image_name);
        $save_to_db_image = "Image/".$new_image_name;
//        add data to db
        Product::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name,'-'),
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'image' => $save_to_db_image,
            'view_count' => 0,
        ]);

        return redirect()->back()->with('success','New Product is Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::where('id',$id)->with('category')->first();
        return Inertia::render('Admin/Product/Show',['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::where('id',$id)->first();
        $cat = Category::all();
        return Inertia::render('Admin/Product/Edit',['product' => $product, 'cat' => $cat]);
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
        $product = Product::where('id',$id) ;

//        validate new photo is uploaded or not
        if ($request->file('image')){
            \Illuminate\Support\Facades\File::delete($product->first()->image);
            $image = $request->file('image');
            $new_image_name = uniqid().$image->getClientOriginalName();
            $image->move(public_path('/Image'),$new_image_name);
            $save_to_db_image = "Image/".$new_image_name;
        }else{
            $save_to_db_image = $product->first()->image;
        }

//        update product
        $product->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name,'-'),
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'image' => $save_to_db_image,
        ]);



        return redirect()->back()->with('success','Product is updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        get product from db
        $product = Product::where('id',$id);
//        delete product image from file
        \Illuminate\Support\Facades\File::delete($product->first()->image);
//        delete product from db
        $product->delete();

        return redirect()->back()->with('success','Product is deleted!');
    }
}
