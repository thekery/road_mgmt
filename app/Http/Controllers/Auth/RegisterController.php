<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
    $request->validate([
        'name' => 'required|string|max:20',
        'email' => 'required|string|email|max:30|unique:users',
        'password' => 'required|string|min:8|max:25|confirmed',
    ]);

    try {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    } catch (\Exception $e) {
        return redirect()->back()->withInput($request->only('name', 'email'))->withErrors(['email' => 'Email already exists']);
    }

    return redirect()->back()->with('success', 'Registration successful.');
}


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
