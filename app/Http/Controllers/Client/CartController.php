<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
  public function __construct() {
    $this->middleware(['auth']);
  }


  public function addToCart(Request $request) {
    $quantity = (int)$request->query('quantity');
    $product = (int)$request->query('product');

    $cart = Cart
    ::where('user_id', session('currentUser')['id'])
    ->where('product_id', $product)->first();

    if ($cart) {

      $cart->update([
        'quantity' => $quantity
      ]);

      return [
        'status' => true,
      ];

    } else {
      Cart::create([
        'quantity' => $quantity,
        'product_id' => $product,
        'user_id' => session('currentUser')['id']
      ]);


      return [
        'status' => true,
      ];
    }

    return [
      'status' => false,
    ];
  }

  public function updateCartItem(Request $request, Cart $cartItem) {

    if($request->quantity <= 0) return redirect()->back()->with('errorMessage', 'Số lượng phải lớn hơn 0');

    $cartItem->update([
      'quantity' => (int)$request->quantity
    ]);

    return redirect()->back()->with('successMessage', 'Cập nhật giỏ hàng thành công');
  }

  public function deleteCartItem(Cart $cartItem) {
    
    $cartItem->delete();

    return redirect()->back()->with('successMessage', 'Cập nhật giỏ hàng thành công');
  }
  
}
