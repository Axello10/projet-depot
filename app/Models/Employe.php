<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    use HasFactory;

    protected $fillable = ['fullname', 'salary', 'adress', 'mobile_number'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
