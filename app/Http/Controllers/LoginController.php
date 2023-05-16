<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display login page.
     *
     * @return Renderable
     */
    public function show()
    {
        return view('auth.login');
    }
    /**
     * Handle account login request
     *
     * @param LoginRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function login(LoginRequest $request)
    {
        // $credentials = Arr::only($request->validated(), ['email', 'password']);
        $credentials = ($request->validated());
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard')->with('success', 'Login avec succes');
        }
        return back()->with('error', 'Identifiants invalides');
    }

    public function dashboard()
    {
        $user = auth()->user();
        return view('home', compact('user'));
    }
}
