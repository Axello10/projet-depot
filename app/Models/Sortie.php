<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Sortie extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id', 'product_id', 'quantity', 'price', 'user_id', 'num_cheque',
        'empty', 'deposit_id', 'payer'
    ];

    public function check($id)
    {
        // This will return the difference in hours 
        return Sortie::findOrFail($id)->created_at->diffInHours(Carbon::now(), false);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
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
