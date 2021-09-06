<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price'];

    public function emptie()
    {
        return $this->hasMany(Emptie::class);
    }

    public function giveback()
    {
        return $this->hasMany(Product::class);
    }
}
