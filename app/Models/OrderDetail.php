<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'id',
        'price',
        'quantity',
        'product_id',
        'order_id'
    ];

    // public function product() {
    //     return $this->belongsTo(Product::class, 'product_id', 'id');
    // }
}
