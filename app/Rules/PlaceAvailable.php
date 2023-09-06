<?php

namespace App\Rules;

use App\Models\User;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class PlaceAvailable implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if(Auth::user()->role_id == 2) {
            $caissier = User::where('deposit_id', $value)
                ->where('role_id', 3)
                ->first();
            if ($caissier) {
                return 0;
            }
        } else if (Auth::user()->role_id == 1) {
            $gerant = User::where('deposit_id', $value)
                ->where('role_id', 2)
                ->first();
            if ($gerant) {
                return 0;
            }
        }
        return 1;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "un utilisateur avec ce role est disponible sur ce depot. veuillez le supprimer ou le modifiez";
    }
}
