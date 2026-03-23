<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;
use App\Models\User;


class RegisterController extends Controller
{
    public function index(){
        return view('register');
    }

    public function store(RegisterRequest $request){
        $user = User::query()->create([
            'name' => $request->input('name'),
            'cognome'=> $request->input('cognome'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),

        ]); 
        
        Auth::login($user);    
    
        return redirect()->route('site.dashboard');
    
    }
}
