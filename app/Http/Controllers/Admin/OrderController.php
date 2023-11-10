<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\User;
use Illuminate\Http\Request;

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

    if($request->status == 3) {
      $user = User::find($order->user_id);
      $user->point += $order->total / 10000;

      $user->save();
    }

    return redirect()->back()->with('successMessage', 'Cập nhật trạng thái đơn hàng ' . $order->code . ' thành công');
  }

}
