<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\DataPerkembanganSiswaRequest;
use App\Http\Resources\PerkembanganLatihanResource;
use App\Models\DataPelatih;
use App\Models\DataPerkembanganSiswa;
use App\Models\DataSiswa;
use Illuminate\Http\Request;

class PerkembanganSiswaController extends Controller
{
    public function index()
    {
        $dataPerkembangan = DataPerkembanganSiswa::latest()->get();

        return PerkembanganLatihanResource::collection($dataPerkembangan);
    }

    public function bySiswa($id)
    {
        $dataPerkembangan = DataPerkembanganSiswa::where('siswa_id', $id)->orWhere('tanggal_latihan', $id)->get();

        return PerkembanganLatihanResource::collection($dataPerkembangan);
    }

    public function store(DataPerkembanganSiswaRequest $request)
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

            $perkembanganSiswa = DataPerkembanganSiswa::create($request->all());

            return new PerkembanganLatihanResource($perkembanganSiswa);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'error',
                'tanggal_latihan' => 'format yyyy-mm-dd',
            ], 500);
        }
    }

    public function update(DataPerkembanganSiswaRequest $request, $id)
    {
        try {
            $dataPerkembanganSiswa = DataPerkembanganSiswa::find($id);
            $dataPerkembanganSiswa->update($request->all());

            return response()->json($dataPerkembanganSiswa, 200);
        } catch (\Throwable $th) {
            if ($dataPerkembanganSiswa == null) {
                return response()->json([
                    'data not found',
                ], 404);
            }

            return response()->json([
                'message' => 'error',
                'tanggal_latihan' => 'format yyyy-mm-dd',
            ], 500);
        }
    }
}
