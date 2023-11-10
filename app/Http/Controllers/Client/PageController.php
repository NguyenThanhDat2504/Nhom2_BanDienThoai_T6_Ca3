<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Level;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PageController extends Controller
{

  public function index(Request  $request)
  {
    $arrival_products = Product::where('is_home', '=', true)->get();
    $categories = Category::all();

    return view('client.home', compact(['arrival_products', 'categories']));
  }


  public function store()
  {

    $products = Product::where('is_stop', '=', false)->get();
    $categories = Category::all();

    return view('client.store', compact(['products', 'categories']));
  }


  public function detail(string $slug)
  {
    $product = Product::where('slug', '=', $slug)->get()[0];

    return view('client.detail', compact(['product']));
  }


  public function cart()
  {

    $cart = Cart::where('user_id', session('currentUser')['id'])->get();

    return view('client.cart', compact('cart'));
  }


  public function checkout()
  {

    $user = User::find(session('currentUser')['id']);
    $cart = Cart::where('user_id', $user->id)->get();

    $totalPrice = 0;
    foreach ($cart as $item) {
      $totalPrice += $item->product->sale_price > 0
        ? $item->product->sale_price * $item->quantity
        : $item->product->price * $item->quantity;
    }


    $userLevel = null;
    $levels = Level::all();
    for ($i=0; $i < $levels->count(); $i++) { 
      if($user->point >= $levels[$i]->target) $userLevel = $levels[$i];
    }

    if($userLevel) $totalPrice -= $totalPrice * $userLevel->discount;

    return view('client.checkout', compact('user', 'cart', 'totalPrice', 'userLevel'));
  }


  public function userInfo() {
    $user = Auth::user();

    $userLevel = new Level();

    $levels = Level::all();

    for ($i=0; $i < $levels->count() - 1; $i++) { 
      if($user->point >= $levels[$i]->target) {
        $userLevel = $levels[$i];
        
        break;
      }

      $userLevel->title = "Chưa có hạng";
    }


    return view('client.user-info', compact('user', 'userLevel'));
  }


  public function updateUserInfo(Request $request) {
    $request->validate(
      [
        'name' => 'required',
        'phone' => 'required',
        'address' => 'required'
      ],
      [
        'name.required' => 'Vui lòng nhập tên',
        'phone.required' => 'Vui lòng nhập số điện thoại',
        'address.required' => 'Vui lòng nhập địa chỉ'
      ]
    );

    $user = User::find(session('currentUser')['id']);

    $user->update([
      'name' => $request->name,
      'phone' => $request->phone,
      'address' => $request->address
    ]);

    return redirect()->back()->with('successMessage', 'Cập nhật thành công');
  }


  public function getChangePassword() {
    return view('client.change-password');
  }


  public function changePassword(Request $request) {
    $request->validate(
      [
        'oldPassword' => 'required',
        'password' => 'required|confirmed',
      ],
      [
        'oldPassword.required' => 'Vui lòng nhập mật khẩu cũ',
        'password.required' => 'Vui lòng nhập mật khẩu mới',
        'password.confirmed' => 'Mật khẩu không trùng khớp'
      ]
    );

    $user = User::find(session('currentUser')['id']);

    if(Hash::check($request->oldPassword, $user->password)) {
      $user->update([
        'password' => Hash::make($request->password)
      ]);


      return redirect()->route('auth.logout');
    }

    return redirect()->back()->with('errorMessage', 'Đổi mật không chính xác');

  }

  
  public function orderList() {

    $orders = Order::where('user_id', session('currentUser')['id'])->latest()->get();


    return view('client.order-list', compact('orders'));
  }
}
