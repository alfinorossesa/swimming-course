<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\DataPerkembanganSiswaRequest;
use App\Http\Resources\PerkembanganLatihanResource;
use App\Models\DataPerkembanganSiswa;
use Illuminate\Http\Request;

class PerkembanganSiswaController extends Controller
{
    public function index()
    {
        $dataPerkembangan = DataPerkembanganSiswa::latest()->get();

        return PerkembanganLatihanResource::collection($dataPerkembangan);
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
                'tanggal_latihan' => 'format yyyy-mm-dd',
            ], 500);
        }
    }
}
