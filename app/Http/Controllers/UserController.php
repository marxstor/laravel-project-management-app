<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserType;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // get the id of the current user logged in
        $currentUserId = auth()->user()->id;

        $users = User::with('user_type')
                ->where('id', '!=', $currentUserId)
                ->get();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate incoming request
        $validateData = $request->validate([
            'fname' => 'required',
            'mname' => 'nullable',
            'lname' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'user_type' => 'required',
        ]);

        // Create the user
        $user = User::create([
            'name' => $validateData['fname'] . ' ' . $validateData['lname'], // Assuming name is full name
            'email' => $validateData['email'],
            'password' => Hash::make($validateData['password']),
        ]);

        // Create the user type and associate it with the created user
        UserType::create([
            'user_type' => $validateData['user_type'],
            'user_id' => $user->id, 
        ]);

        return redirect()->route('users.index')->with('success', 'User successfully created');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);

        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);

        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'user_type' => 'required',
        ]);

        $user = User::find($id);

        $user->update([
            'name' => $validateData['name'], // Assuming name is full name
            'email' => $validateData['email'],
        ]);

        // Create the user type and associate it with the created user
        $user->user_type->update([
            'user_type' => $validateData['user_type'],
        ]);

        return redirect()->route('users.index')->with('success', 'User information successfully updated');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
