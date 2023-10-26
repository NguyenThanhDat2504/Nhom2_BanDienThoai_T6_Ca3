<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cart extends Model
{
  use HasFactory; 
  
  public $increamenting = false;
  public $timestamps = false;
  
  protected $fillable = [
    'id',
    'quantity',
    'product_id',
    'user_id',
  ];


  public function product() : BelongsTo {
    return $this->belongsTo(Product::class, 'product_id', 'id');
  }
}
