<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrderStatusController extends Controller
{
  
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

  public function store(Request $request)
  {
    $orderStatus = new OrderStatus();

    $orderStatus->title = $request->title;

    $orderStatus->save();

    return redirect()->back()->with('successMessage', 'Thêm trạng thái đơn hàng ' . $orderStatus['title'] . ' thành công');
  }


  public function edit(OrderStatus $orderStatus)
  {
    return view('admin.orderStatuses.edit', compact(['orderStatus']));
  }

 
  public function update(Request $request, OrderStatus $orderStatus)
  {
    $orderStatus->title = $request->title;
    $orderStatus->save();

    return redirect()->back()->with('successMessage', 'Cập nhật trạng thái đơn hàng ' . $orderStatus->title . ' thành công');
  }

  
  public function destroy(OrderStatus $orderStatus)
  {
    $orderStatus->delete();

    return redirect()->back()->with('successMessage', 'Xóa trạng thái đơn hàng ' . $orderStatus->title . ' thành công');

  }
}
