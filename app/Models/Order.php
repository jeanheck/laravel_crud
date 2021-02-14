<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  protected $fillable=['customer_id'];

  public function customer()
  {
    return $this->belongsTo(Customer::class);
  }
  public function products()
  {
    return $this->belongsToMany(Product::class)->withPivot('amount');
  }

  public function getTotalAttribute()
  {
    $total = 0;

    foreach ($this->products as $product) {
      $total += $product->pivot->amount * $product->price;
    }

    return $total;
  }
}
