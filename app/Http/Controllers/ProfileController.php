<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function homePage()
    {
        $user = auth()->user();
        return view('profile', compact('user'));
    }
    public function showProfile()
    {
        $user = auth()->user();
        
        return view('edit-profile', compact('user'));
    }
    public function updateProfile(Request $request)
    {
        $userId = auth()->id();
        $validated = $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'tgl' => 'required|date',
        ]);
        $currentUser = User::findOrFail($userId);
        $currentUser->update($request->all());
        return redirect('/home/edit-profile')->with('success_update', 'Your profile has been updated!');
    }

    public function destroy(User $user, Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $user->delete();
        return redirect('/login');
    }
}
