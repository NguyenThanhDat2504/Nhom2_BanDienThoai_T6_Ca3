<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrderStatusController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $orderStatuses =OrderStatus::all();

    return view('admin.orderStatuses.index', compact(['orderStatuses']));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('admin.orderStatuses.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $orderStatus = new OrderStatus();

    $orderStatus->title = $request->title;

    $orderStatus->save();

    return redirect()->back()->with('successMessage', 'Thêm trạng thái đơn hàng ' . $orderStatus['title'] . ' thành công');
  }


  /**
   * Show the form for editing the specified resource.
   */
  public function edit(OrderStatus $orderStatus)
  {
    return view('admin.orderStatuses.edit', compact(['orderStatus']));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, OrderStatus $orderStatus)
  {
    $orderStatus->title = $request->title;
    $orderStatus->save();

    return redirect()->back()->with('successMessage', 'Cập nhật trạng thái đơn hàng ' . $orderStatus->title . ' thành công');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(OrderStatus $orderStatus)
  {
    $orderStatus->delete();

    return redirect()->back()->with('successMessage', 'Xóa trạng thái đơn hàng ' . $orderStatus->title . ' thành công');

  }
}
