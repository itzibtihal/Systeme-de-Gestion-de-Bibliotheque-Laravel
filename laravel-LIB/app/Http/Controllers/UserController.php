<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
{
    $users = User::where('is_admin', null)->get();
    $user = User::find(Auth::id());
    return view('usersadmin.index', compact('users', 'user'));
}


    public function create()
    {
        return view('usersadmin.create');
    }

    public function store(UserRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect()->route('usersadmin.index')->with('success', 'User created successfully!');
    }

    public function show(User $user)
    {
        return view('usersadmin.show', compact('user'));
    }

    public function edit(User $user)

    {
        $user = User::all();
        return view('usersadmin.edit', compact('user'));
    }
    
    public function update(UserRequest $request, User $user)
{
    $validatedData = $request->validated();

   
    if (isset($validatedData['password'])) {
        $validatedData['password'] = Hash::make($validatedData['password']);
    }

    $user->update($validatedData);

    return redirect()->route('usersadmin.index')->with('success', 'User updated successfully!');
}
    


    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('usersadmin.index')->with('success', 'User deleted successfully!');
        
    }
}
