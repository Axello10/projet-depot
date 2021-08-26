<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    use HasFactory;

    protected $fillable = [
        'vendor_id', 'product_id', 'quantity', 'price', 'user_id',
        'empty', 'deposit_id'
    ];
}
