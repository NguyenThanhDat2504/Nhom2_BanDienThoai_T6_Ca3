<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Level;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use App\Utils\GenerateId;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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


    $user = User::find(session('currentUser')['id']);
    $userLevel = null;
    $levels = Level::all();
    for ($i=0; $i < $levels->count(); $i++) { 
      if($user->point >= $levels[$i]->target) $userLevel = $levels[$i];
    }


    $order = new Order();
    
    $order->id = GenerateId::make('', 8);
    $order->code = GenerateId::make('#', 9);
    $order->name = $request->name;
    $order->phone = $request->phone;
    $order->address = $request->address;
    $order->total =  $userLevel ? $totalPrice - ($totalPrice * $userLevel->discount) : $totalPrice;
    $order->user_id = session('currentUser')['id'];
    $order->order_status_id = 1;

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

    foreach ($cart as $item) {
      $item->delete();
    }

    // $user = User::find(session('currentUser')['id']);
    // $user->point += $order->total / 10000;

    // $user->save();

    return redirect()->route('checkout.success');
  }

  public function checkoutSuccess() {
    return view('client.checkoutSuccess');
  }
}
