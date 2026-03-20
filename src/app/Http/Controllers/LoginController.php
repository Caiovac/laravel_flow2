<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\LoginRequest;
 
class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function authenticate(LoginRequest $loginRequest) : RedirectResponse{
        $credentials = $loginRequest->validated();

        if (Auth::attempt($credentials)) {
            $loginRequest->session()->regenerate();
            return redirect()->intended(route('site.dashboard'));
        }

        return back()->withErrors([
            'email' => 'Le credenziali fornite non sono corrette.',
        ])->onlyInput('email');
    }

    public function logout(Request $request) : RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('site.login'));
    }
}