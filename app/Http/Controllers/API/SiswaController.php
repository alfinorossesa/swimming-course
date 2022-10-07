<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\DataSiswaRequest;
use App\Http\Resources\SiswaResource;
use App\Models\DataSiswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = DataSiswa::latest()->get();

        return SiswaResource::collection($siswa);
    }

    public function show($id)
    {
        $dataSiswa = DataSiswa::find($id);

        if ($dataSiswa == null) {
            return response()->json('data not found', 404);
        }

        return new SiswaResource($dataSiswa);
    }

    public function update($id, DataSiswaRequest $request)
    {
        try {
            $dataSiswa = DataSiswa::find($id);
            $dataSiswa->update($request->all());

            return response()->json([
                'siswa' => $dataSiswa,
                'messsage' => 'sukses'
            ], 200);
        } catch (\Throwable $th) {
            if ($dataSiswa == null) {
                return response()->json([
                    'data not found',
                ], 404);
            }

            return response()->json([
                'message' => [
                    'tanggal_lahir' => 'format yyyy-mm-dd',
                ]
            ], 500);
        }
    }
}
