<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price_in', 'price_out', 'user_id'];

    public function emptie()
    {
        return $this->hasMany(Emptie::class);
    }

    public function giveback()
    {
        return $this->hasMany(Product::class);
    }

    public function entrie()
    {
        return $this->hasMany(Entrie::class);
    }

    public function sortie()
    {
        return $this->hasMany(Sortie::class);
    }
}
