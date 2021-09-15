<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepotProduct extends Model
{
    use HasFactory;

    protected $fillable = ['deposit_id', 'product_id', 'user_id'];

    // public function product()
    // {
    //     return $this->hasMany(Product::class);
    // }
}
