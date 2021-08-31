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

    public function grade() {
        return $this->belongsTo(Grade::class);
    }

    public function emptie()
    {
        return $this->hasOne(Client::class);
    }

}
