<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'asc')->get();

        return view('admin.users', ['users' => $users]);
    }

    public function showDetail(Request $request)
    {
        $id = $request->id;
        $userData = User::where('id', $id)->first();
        $user = [
            'id' => $id,
            'name' => $userData->name,
            'email' => $userData->email,
        ];

        return view('admin.user_detail', $user);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|regex:/^[a-zA-Z0-9]+$/',
            'email' => 'required|max:255|email|unique:users',
            'password' => 'required|max:255|min:8|regex:/^[a-zA-Z0-9]+$/',
        ],
        [
            'name.regex' => ':attributeは半角英数字で入力してください。',
            'password.regex' => ':attributeは半角英数字で入力してください。',
        ]
        );

        $user = User::find($request->id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->update();

        return redirect()->route('users.index');
    }
}
