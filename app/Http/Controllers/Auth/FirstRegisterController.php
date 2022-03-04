<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class FirstRegisterController extends Controller
{
    use RegistersUsers;

    public function index()
    {
        return view('auth.first_register');
    }

    public function register(Request $request)
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

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login.index');
    }
}
