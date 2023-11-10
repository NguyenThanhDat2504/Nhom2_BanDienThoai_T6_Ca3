<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $categories = Category::all();

    return view('admin.categories.index', compact(['categories']));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('admin.categories.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $category = new Category();

    $category->title = $request->title;
    $category->slug = Str::slug($request->title);

    $category->save();

    return redirect()->back()->with('successMessage', 'Thêm danh mục ' . $category['title'] . ' thành công');
  }


  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Category $category)
  {
    return view('admin.categories.edit', compact(['category']));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Category $category)
  {
    $category->title = $request->title;
    $category->save();

    return redirect()->back()->with('successMessage', 'Cập nhật danh mục ' . $category->title . ' thành công');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Category $category)
  {
    $category->delete();

    return redirect()->back()->with('successMessage', 'Xóa danh mục ' . $category->title . ' thành công');

  }
}