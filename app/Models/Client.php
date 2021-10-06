<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'adress', 'mobile_number', 'grade_id'
    ];

    public function empties()
    {
        return $this->hasMany(Emptie::class);
    }

    public function sortie()
    {
        return $this->hasMany(Sortie::class);
    }

    public function deposit()
    {
        return $this->belongsTo(Deposit::class);
    }
}
