<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;

class AccountSettingController extends Controller
{
    public function index()
    {
        return view('pages.account-setting.index', [
            'title' => 'Akun Saya'
        ]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'username' => [
                'required',
                Rule::unique('users')->ignore(Auth::user()->id),
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore(Auth::user()->id),
            ],
            'password' => 'required|min:6',
        ], [
            'name.required' => 'Nama Lengkap wajib diisi',
            'username.required' => 'Username wajib diisi',
            'username.unique' => 'Username sudah digunakan',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Email tidak valid',
            'email.unique' => 'Email sudah digunakan',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 6 karakter',
        ]);
        $validated['password'] = Hash::make($request->password);

        User::find(Auth::user()->id)->update($validated);
        Alert::success('Berhasil', 'Berhasil update akun', 'success');
        ActivityLog::create([
            'user_id' => Auth::id(),
            'description' => ActivityLog::MESSAGE['update'] . 'akun',
            'type' => $request->method(),
        ]);
        return redirect()->back();
    }
}
