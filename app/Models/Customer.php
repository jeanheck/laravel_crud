<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
  protected $fillable=['name'];

  public function orders()
  {
    return $this->hasMany(Order::class);
  }
}
