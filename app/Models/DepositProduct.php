<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepositProduct extends Model
{
    use HasFactory;

    protected $fillable = ['deposit_id', 'product_id', 'user_id', 'quantity'];
}
