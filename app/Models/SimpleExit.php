<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SimpleExit extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'product_id', 'deposit_id', 'quantity', 'price'];
}
