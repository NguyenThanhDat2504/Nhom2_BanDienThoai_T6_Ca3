<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    use HasFactory;

  public $increamenting = false;
  public $timestamps = false;

  protected $fillable = [
    'id',
    'title'
  ];
}
