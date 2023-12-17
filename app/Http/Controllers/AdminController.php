<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('pages.admin.index', compact('users'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('pages.admin.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'admin' => 'boolean', 
        ]);

        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'admin' => $request->has('admin') ? 'True' : 'False',
            
        ]);

        return redirect('/admin/users')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/admin/users')->with('success', 'User deleted successfully.');
    }
}