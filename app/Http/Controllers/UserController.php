<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show($id)
    {
        $user = User::find($id);
        return view('pages.detaildestinasi1', compact('user'));
    }


    public function create()
        {
            return view('pages.createUser');
        }

    public function store(Request $request)
    {
        User::create($request->all());
        return redirect('/user')->with('success', 'User created succesfully.');
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
        return view('pages.editUser', compact('user'));
    }
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if ($user) {
            $user->update($request->all());
            return redirect('/user')->with('success', 'User Updated Succesfully');
        } else {
            return redirect('/user')->with('error', 'User not found');
        }
    }
    public function index(Request $request)
    {
        $keyword = $request->input('search');
        if ($keyword != '') {
            $user = User::where('name', 'LIKE', '%' . $keyword . '%')->paginate(5);
        } else {$user = User::orderby('id')->paginate(5);
        }
        return view('pages.indexUser', compact('user'));
    }
}
