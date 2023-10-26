<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
{
  public function index()
  {
    $levels = Level::all();

    return view('admin.levels.index', compact(['levels']));
  }

  
  public function create()
  {
    return view('admin.levels.create');
  }

  public function store(Request $request)
  {
    $level = new Level();

    $level->title = $request->title;
    $level->target = $request->target;
    $level->discount = $request->discount / 100;

    $level->save();

    return redirect()->back()->with('successMessage', 'Thêm hạng khách hàng ' . $level['title'] . ' thành công');
  }


  public function edit(Level $level)
  {
    return view('admin.levels.edit', compact(['level']));
  }


  public function update(Request $request, Level $level)
  {
    $level->title = $request->title;
    $level->target = $request->target;
    $level->discount = $request->discount / 100;
    $level->save();

    return redirect()->back()->with('successMessage', 'Cập nhật hạng khách hàng ' . $level->title . ' thành công');
  }


  public function destroy(Level $level)
  {
    $level->delete();

    return redirect()->back()->with('successMessage', 'Xóa hạng khách hàng ' . $level->title . ' thành công');
  }
}
