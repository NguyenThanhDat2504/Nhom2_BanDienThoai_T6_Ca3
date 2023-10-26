<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrderController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $orders = Order::all();
    $orderStatuses = OrderStatus::all();

    return view('admin.orders.index', compact('orders', 'orderStatuses'));
  }


  public function show(Order $order) {
    return view('admin.orders.show', compact('order'));
  }


  public function update(Request $request, Order $order)
  {
    $order->order_status_id = $request->status;
    $order->save();

    return redirect()->back()->with('successMessage', 'Cập nhật trạng thái đơn hàng ' . $order->code . ' thành công');
  }

}
