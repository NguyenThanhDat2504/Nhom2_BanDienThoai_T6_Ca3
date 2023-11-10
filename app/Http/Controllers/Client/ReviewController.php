<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request, Product $product)
  {
    if (!auth()->user()) return redirect()->back()->with('errorMessage', 'Vui lòng đăng nhập');

    $isBought = OrderDetail::join('orders', 'order_details.order_id', '=', 'orders.id')
    ->where('order_details.product_id', '=', $product->id)
    ->where('orders.order_status_id', '=', 3)
    ->where('orders.user_id', '=', auth()->user()->id)->get();


    if($isBought->count()) {
      $request->validate(
        [
          'content' => 'required',
          'rate' => 'required'
        ],
        [
          'content.required' => 'Vui lòng nhập nội dung đánh giá',
          'rate.required' => 'Vui lòng chọn đánh giá',
        ]
      );
  
      $review = new Review();
  
      $review->content = $request->content;
      $review->rate = $request->rate;
      $review->product_id = $product->id;
      $review->user_id = auth()->user()->id;
  
      $review->save();
  
      return redirect()->back()->with('successMessage', 'Đánh giá thành công');
    }

    return redirect()->back()->with('errorMessage', 'Bạn chưa mua sản phẩm');
  }


  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    //
  }
}
