<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RareCase extends Model
{
    use HasFactory;

    protected $fillable = [
        'incident', 'justification', 'acteur', 'user_id', 'price', 'deposit_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function deposit()
    {
        return $this->belongsTo(Deposit::class);
    }

    public function check($id)
    {
        // This will return the difference in hours 
        return RareCase::findOrFail($id)->created_at->diffInHours(Carbon::now(), false);
    }
}
