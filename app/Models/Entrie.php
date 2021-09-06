<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrie extends Model
{
    use HasFactory;

    protected $fillable = [
        'vendor_id', 'product_id', 'quantity', 'user_id',
        'empty', 'deposit_id'
    ];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
}
