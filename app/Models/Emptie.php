<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emptie extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id', 'product_id', 'quantity', 'deposit_id'
    ];
}
