<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
  use HasFactory;

  public $incrementing = false;
  public $fillable = [
    'id',
    'code',
    'name',
    'phone',
    'address',
    'total',
    'user_id'
  ];

  public function products() : BelongsToMany {
    return $this->belongsToMany(Product::class, 'order_details')->withPivot('quantity');
  }
  
  public function orderStatus(): BelongsTo {
    return $this->belongsTo(OrderStatus::class, 'order_status_id', 'id');
  }
}
