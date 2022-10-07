<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\DataSiswaRequest;
use App\Models\DataPelatih;
use App\Models\DataSiswa;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(DataSiswaRequest $request)
    {
        try {
            $siswa = DataSiswa::create($request->all());

            return response()->json([
                'message' => 'register sukses',
                'siswa' => $siswa
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => [
                    'tanggal_lahir' => 'format yyyy-mm-dd',
                    'username' => 'username harus unique',
                ]
            ], 500);
        }
    }

    public function login(Request $request)
    {
        try {
            $request->validate([
                'username' => 'required',
                'password' => 'required'
            ]);
    
            if (auth()->guard('web')->attempt($request->only('username', 'password'))) {
                $user = User::where('username', $request->username)->first();
    
                $token = $user->createToken('admin_login')->plainTextToken;
    
                return response()->json([
                    'message' => 'sukses',
                    'user' => $user,
                    'role' => 'admin',
                    'token' => $token
                ], 200);
            }
    
            if (auth()->guard('siswa')->attempt($request->only('username', 'password'))) {
                $user = DataSiswa::where('username', $request->username)->first();
    
                $token = $user->createToken('siswa_login')->plainTextToken;
    
                return response()->json([
                    'message' => 'sukses',
                    'user' => $user,
                    'role' => 'siswa',
                    'token' => $token
                ], 200);
            }
    
            if (auth()->guard('pelatih')->attempt($request->only('username', 'password'))) {
                $user = DataPelatih::where('username', $request->username)->first();
    
                $token = $user->createToken('siswa_login')->plainTextToken;
    
                return response()->json([
                    'message' => 'sukses',
                    'user' => $user,
                    'role' => 'pelatih',
                    'token' => $token
                ], 200);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'error' => 'Username dan Password yang anda masukkan salah.',
            ], 500);
        }
    }

    public function logout(Request $request)
    {
        $user = $request->user();
        $user->currentAccessToken()->delete();

        return response()->json([
            'message' => 'logout berhasil'
        ], 200);
    }

}
