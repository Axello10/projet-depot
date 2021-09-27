<?php

namespace App\Http\Controllers\App;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('app.users.read')
                ->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Auth::user());
        $deposits = Deposit::all();
        return view('Auth.new')
                ->with('deposits', $deposits);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Auth::user());
        // to register a new user!
        $request->validate([
            'username' => 'required|max:20|min:5|unique:users',
            'fullname' => 'required|unique:users',
            'password' => 'required|min:5',
            'deposit_id' => 'required'
        ]);

        $request['password'] = bcrypt($request->password);

        User::create($request->all());

        Auth::loginUsingId($request->id, true);

        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $this->authorize('view', Auth::user());

        return view('app.users.one')
                ->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('update', Auth::user());

        return view('app.users.update')
                ->with('user', $user)
                ->with('deposits', Deposit::all())
                ->with('roles', Role::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->authorize('update', Auth::user());

        $request->validate([
            'username' => 'required|max:20|min:5',
            'fullname' => 'required',
            'password' => 'min:5',
            'deposit_id' => 'required'
        ]);

        $request['password'] = bcrypt($request->password);

        $user->update($request->all());

        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->authorize('delete', Auth::user());
    }
}
