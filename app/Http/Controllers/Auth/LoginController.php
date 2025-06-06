<?php

namespace App\Http\Controllers\Auth;

use App\Events\ActivityLogEvent;
use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ], [
            'username.required' => 'Username wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            ActivityLog::create([
                'user_id' => Auth::id(),
                'description' => ActivityLog::MESSAGE['login'],
                'type' => $request->method(),
            ]);
            return redirect()->intended('/');
        }

        return redirect()->route('login')->withErrors(['errors' => 'Username atau Password Salah']);
    }
}
