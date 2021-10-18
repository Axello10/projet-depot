<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sortiedepot extends Model
{
    use HasFactory;

    protected $fillable = [
        'deposit_id', 'from_deposit_id', 'product_id', 'user_id', 'quantity'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function deposit()
    {
        return $this->belongsTo(Deposit::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function from_deposit()
    {
        return $this->belongsTo(Deposit::class);
    }
}
