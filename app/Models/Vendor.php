<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'adress', 'mobile_number'];

    public function giveback()
    {
        return $this->hasMany(Giveback::class);
    }

    public function entrie()
    {
        return $this->hasMany(Entrie::class);
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }
}
