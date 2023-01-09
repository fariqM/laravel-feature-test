<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function loginAction(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        try {
            $user = User::where('email', $request->username)->orWhere('username', $request->username)->firstOrFail();
        } catch (\Throwable $th) {
            return redirect()->back()->withInput()->with('login_error', 'Credential does not match the record');
        }

        if (Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return redirect()->to('home');
        } else {
            return redirect()->back()->withInput()->with('login_error', 'Credential does not match the record');
        }
    }

    public function logoutAction(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
