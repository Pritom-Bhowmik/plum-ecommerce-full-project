<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Exception;

class AuthController extends Controller
{
    //

    public function index()
    {
        if (Auth::guard('web')->check()) {
            return redirect()->intended(route('backend.dashboard'))->withError("You are already logged in as Administrator, you need to log out before logging in as different user.");
        }
        return view('backend.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string'
        ]);

        try {

            $credentials = $request->only(['email', 'password']);

            $remember = $request->input('remember');

            if (Auth::guard('web')->attempt($credentials, $remember)) {

                return redirect()->intended(route('backend.dashboard'))->withSuccess('Signed in');
            }

            return redirect()->route('backend.login')->withError('Login credentials are not valid')->withInput();
        } catch (\Exception $e) {

            return redirect()->route('backend.login')->withError($e->getMessage());
        }
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('backend.login')->withSuccess('You have successfully logged out.');
    }
}
