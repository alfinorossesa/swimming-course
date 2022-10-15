<?php

namespace App\Http\Controllers;

use App\Http\Requests\DataAdminRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class DataAdminController extends Controller
{
    public function profile(User $user)
    {
        return view('admin.data-admin.profile', compact('user'));
    }

    public function updateProfile(Request $request, User $user)
    {
        $attr = $request->validate([
            'nama' => 'required|min:3',
            'username' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required'
        ]);

        $user->update($attr);

        return redirect()->back()->with('success', 'Profile Berhasil Diupdate!');
    }

    public function gantiPassword(User $user)
    {
        return view('admin.data-admin.gantiPassword', compact('user'));
    }

    public function updatePassword(DataAdminRequest $request, User $user)
    {
        if (Hash::check($request->password_lama, $user->password)) {
            $user->update($request->only('password'));

            return redirect()->back()->with('success', 'Password Berhasil Diupdate!');
        }

        throw ValidationException::withMessages([
            'password_lama' => 'password do not match'
        ]);
    }
}
