<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SimpleExit extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'product_id', 'deposit_id', 'quantity', 'price'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function check($id)
    {
        // This will return the difference in hours 
        return SimpleExit::findOrFail($id)->created_at->diffInHours(Carbon::now(), false);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function deposit()
    {
        return $this->belongsTo(Deposit::class);
    }
}
