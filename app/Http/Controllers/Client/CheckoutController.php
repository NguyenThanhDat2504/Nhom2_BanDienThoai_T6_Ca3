<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Utils\GenerateId;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{

  public function store(Request $request)
  {
    $request->validate(
      [
        'phone' => 'required',
        'address' => 'required'
      ],
      [
        'phone.required' => 'Vui lòng nhập số điện thoại',
        'address.required' => 'Vui lòng nhập địa chỉ'
      ]
    );

    $cart = Cart::where('user_id', session('currentUser')['id'])->get();
    $totalPrice = 0;
    foreach ($cart as $item) {
      $totalPrice += $item->product->sale_price > 0 
        ? $item->product->sale_price * $item->quantity 
        : $item->product->price * $item->quantity;
    }

    $order = new Order();
    
    $order->id = GenerateId::make('', 8);
    $order->code = GenerateId::make('#', 9);
    $order->name = $request->name;
    $order->phone = $request->phone;
    $order->address = $request->address;
    $order->total = $totalPrice;
    $order->user_id = session('currentUser')['id'];

    $order->save();

    foreach ($cart as $item) {
      $product = Product::find($item->product->id);
      $product->update([
        'quantity' => $product->quantity - $item->quantity
      ]);
      
      OrderDetail::create([
        'price' => $item->product->sale_price > 0 ? $item->product->sale_price * $item->quantity : $item->product->price * $item->quantity,
        'quantity' => $item->quantity,
        'product_id' => $item->product->id,
        'order_id' => $order->id
      ]);



    }

    return redirect()->route('checkout.success');
  }

  public function checkoutSuccess() {
    return view('client.checkoutSuccess');
  }
}
