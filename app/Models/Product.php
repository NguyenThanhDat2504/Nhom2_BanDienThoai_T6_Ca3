<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
  use HasFactory;

  public $increamenting = false;
  protected $fillable = [
    'id',
    'title',
    'slug',
    'description',
    'detail',
    'cover',
    'price',
    'original_price',
    'sale_price',
    'quantity',
    'view_count',
    'is_home',
    'is_sale',
    'is_hot',
    'is_active',
  ];

  public function category(): BelongsTo {
    return $this->belongsTo(Category::class, 'category_id', 'id');
  }

  public function reviews(): HasMany {
    return $this->hasMany(Review::class, 'product_id', 'id');
}
}
