<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function index() {
        return view('Auth.login');
    }
    
    /**
     * 
     * gerer la connection des utilisateurs!
     */

    public function authenticate(Request $request) {
        $credentials = $request->validate([
            'username' => 'required|max:20|min:5',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors(['message' => 'Je vous reconnais pas!']);
    }
}
