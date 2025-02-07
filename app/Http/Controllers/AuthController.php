<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect('/');
        }
        return view('auth.login');
    }

    // Handle the login request
    public function login(Request $request)
    {
        if (Auth::check()) {
            return redirect('/');
        }

        // Validate the input
        $request->validate([
            'login' => 'required|string',
            'password' => 'required|string',
        ]);

        // Check if the login field is email or phone
        $fieldType = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';

        // Attempt authentication
        if (Auth::attempt([$fieldType => $request->login, 'password' => $request->password])) {
            // Get the authenticated user
            $user = Auth::user();

            // Check if the user is banned
            if ($user->banned == 1) {
                // Log the user out if banned
                Auth::logout();

                // Redirect back with a banned user error message
                return back()->withErrors([
                    'login' => 'Your account has been deleted recently. Please contact support.',
                ]);
            }

            // Regenerate session and redirect to the intended page
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        // Redirect back with an error message if authentication fails
        return back()->withErrors([
            'login' => 'The provided credentials do not match our records.',
        ]);
    }


    // Handle logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function showDeleteAccount()
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        return view('auth.delete_account');
    }

    public function destroy(Request $request)
    {
        // Validate the password
        $request->validate([
            'password' => 'required',
        ]);

        // Check if the provided password matches the authenticated user's password
        if (!Hash::check($request->password, Auth::user()->password)) {
            return back()->withErrors([
                'password' => 'The provided password does not match your current password.',
            ]);
        }

        // Get the authenticated user
        $user = Auth::user();

        // Handle tokens deletion before logging out the user
        if ($user) {
            // Revoke all tokens if the user is authenticated
            $user->tokens->each(function ($token) {
                $token->delete();
            });

            // Optionally, update user data to mark as banned
            $user->phone = $user->phone . '_banned';
            $user->email = $user->email . '_banned';
            $user->banned = 1;
            $user->save();

            // After deleting tokens, log the user out
            Auth::logout();
        }

        // Invalidate the session and regenerate CSRF token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect the user
        return redirect('/')->with('success', 'Your account has been successfully deleted.');
    }
}
