<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DepositProduct extends Model
{
    use HasFactory;

    protected $fillable = ['deposit_id', 'product_id', 'user_id', 'quantity'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function deposit()
    {
        return $this->belongsTo(Deposit::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
