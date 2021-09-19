<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepotEmptie extends Model
{
    use HasFactory;

    public $fillable = ['deposit_id', 'emptie_id', 'user_id'];
}
