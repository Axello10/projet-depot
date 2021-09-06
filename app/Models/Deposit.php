<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'grade_id', 'mobile_number'
    ];

    public function emptie()
    {
        return $this->hasMany(Emptie::class);
    }

    public function giveback()
    {
        return $this->hasMany(Giveback::class);
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
