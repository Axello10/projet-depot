<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emptie extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id', 'product_id', 'quantity', 'deposit_id', 'payer'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function deposits()
    {
        return $this->belongsTo(Deposit::class);
    }
}
