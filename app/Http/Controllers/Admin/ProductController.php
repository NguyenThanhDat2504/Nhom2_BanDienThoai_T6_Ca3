<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $products = Product::all();

    return view('admin.products.index', compact(['products']));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $categories = Category::all();

    return view('admin.products.create', compact(['categories']));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $product = new Product();

    $product->title = $request->title;
    $product->slug = Str::slug($request->title);
    $product->view_count = 0;
    $product->description = $request->description;
    $product->price = $request->price ? $request->price : 0;
    $product->original_price = $request->original_price ? $request->original_price : 0;
    $product->sale_price = $request->sale_price ? $request->sale_price : 0;
    $product->quantity = $request->quantity;
    $product->is_home = $request->is_home ? true : false;
    $product->is_sale = $request->is_sale ? true : false;
    $product->is_hot = $request->is_hot ? true : false;
    $product->is_stop = $request->is_stop ? true : false;
    $product->category_id = $request->category;
    $product->cover = '/storage/covers/'.$product->slug.'.'.$request->cover->extension();
    
    $request->file('cover')->storeAs('covers', $product->slug.'.'.$request->cover->extension());

    $product->save();

    return redirect()->back()->with('successMessage', 'Thêm sản phẩm thành công');

  }

  
  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Product $product)
  {
    $categories = Category::all();

    return view('admin.products.edit', compact(['product', 'categories']));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Product $product)
  {
    Storage::delete($product->cover);

    $product->title = $request->title;
    $product->slug = Str::slug($request->title);
    $product->view_count = $product->view_count;
    $product->description = $request->description;
    $product->price = $request->price ? $request->price : 0;
    $product->original_price = $request->original_price ? $request->original_price : 0;
    $product->sale_price = $request->sale_price ? $request->sale_price : 0;
    $product->quantity = $request->quantity;
    $product->is_home = $request->is_home ? true : false;
    $product->is_sale = $request->is_sale ? true : false;
    $product->is_hot = $request->is_hot ? true : false;
    $product->is_stop = $request->is_stop ? true : false;
    $product->category_id = $request->category;
    $product->cover = '/storage/covers/'.$product->slug.'.'.$request->cover->extension();
    
    $request->file('cover')->storeAs('covers', $product->slug.'.'.$request->cover->extension());

    $product->save();

    return redirect()->back()->with('successMessage', 'Cập nhật sản phẩm thành công');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Product $product)
  {
    Storage::delete($product->cover);

    $product->delete();

    return redirect()->back()->with('successMessage', 'Xóa sản phẩm ' . $product->title . ' thành công');

  }
}
