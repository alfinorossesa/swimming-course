<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\DataJadwalLatihanRequest;
use App\Http\Resources\JadwalLatihanResource;
use App\Models\DataJadwalLatihan;
use App\Models\DataPelatih;
use App\Models\DataSiswa;
use Illuminate\Http\Request;

class JadwalLatihanController extends Controller
{
    public function index()
    {
        $dataJadwalLatihan = DataJadwalLatihan::latest()->get();

        return JadwalLatihanResource::collection($dataJadwalLatihan);
    }

    public function store(DataJadwalLatihanRequest $request)
    {
        try {
            if (DataSiswa::find($request->siswa_id) == null) {
                return response()->json([
                    'message' => 'error',
                    'siswa_id' => 'siswa not found' 
                ], 404);
            }
            
            if (DataPelatih::find($request->pelatih_id) == null) {
                return response()->json([
                    'message' => 'error',
                    'pelatih_id' => 'pelatih not found' 
                ], 404);
            }
            $jadwalLatihan = DataJadwalLatihan::create($request->all());


            return new JadwalLatihanResource($jadwalLatihan);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'error',
                'hari' => 'format yyyy-mm-dd',
            ], 500);
        }
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
