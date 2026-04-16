<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function create()
        {
            return view('pages.users.createUser');
        }

    public function store(Request $request)
    {
         $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required',
            'password' => 'required',
        ]);
        \App\Models\User::create($validated);
        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function delete($id)
    {
        $user =User::find($id);
        if ($user) {
            $user->delete();
            return redirect('/user')->with('success', 'User deleted succesfully.');
        } else {
            return redirect('/user')->with('error', 'User not found.');
        }
    }
    public function edit($id)
    {
        $user = User::find($id);
        return view('pages.users.editUser', compact('user'));
    }
    public function update(Request $request, $id)
    {
         $validated = $request->validate([
           'name' => 'required|string|max:255',
            'email' => 'required',
            'password' => 'required',
        ]);
        $user = \App\Models\User::findorFail($id);
        $user->update($validated);
        return redirect()->route('users.index')->with('success', 'User updated successfully.');
        return redirect()->route('users.index')->with('error', 'Failed to update user.');
    }
    public function index(Request $request)
    {
        $keyword = $request->input('search');
        if ($keyword != '') {
            $user = User::where('name', 'LIKE', '%' . $keyword . '%')->paginate(5);
        } else {$user = User::orderby('id')->paginate(5);
        }
        return view('pages.users.indexUser', compact('user'));
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('pages.users.showUser', compact('user'));
    }
}
