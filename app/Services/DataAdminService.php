<?php

namespace App\Services;

use App\Models\User;

class DataAdminService
{
    public function storeData($request)
    {
        return User::create([
            'nama' => $request->nama,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'isAdmin' => true
        ]);
    }

    public function updateData($user, $request)
    {
        return $user->update([
            'nama' => $request->nama,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'isAdmin' => true
        ]);
    }
}