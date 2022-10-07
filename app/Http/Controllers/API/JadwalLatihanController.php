<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\DataJadwalLatihanRequest;
use App\Http\Resources\JadwalLatihanResource;
use App\Models\DataJadwalLatihan;
use Illuminate\Http\Request;

class JadwalLatihanController extends Controller
{
    public function index()
    {
        $dataJadwalLatihan = DataJadwalLatihan::latest()->get();

        return JadwalLatihanResource::collection($dataJadwalLatihan);
    }

    public function update(DataJadwalLatihanRequest $request, $id)
    {
        try {
            $jadwalLatihan = DataJadwalLatihan::find($id);
            $jadwalLatihan->update($request->all());

            return response()->json($jadwalLatihan, 200);
        } catch (\Throwable $th) {
            if ($jadwalLatihan == null) {
                return response()->json([
                    'data not found',
                ], 404);
            }

            return response()->json([
                'hari' => 'format yyyy-mm-dd',
            ], 500);
        }
    }
}
