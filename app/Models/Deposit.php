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

}
