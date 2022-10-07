<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\DataPelatihRequest;
use App\Http\Resources\PelatihResource;
use App\Models\DataPelatih;
use App\Services\DataPelatihService;
use Illuminate\Http\Request;

class PelatihController extends Controller
{
    protected $dataPelatihService;
    public function __construct(DataPelatihService $dataPelatihService)
    {
        $this->dataPelatihService = $dataPelatihService;
    }

    public function index()
    {
        $pelatih = DataPelatih::latest()->get();

        return PelatihResource::collection($pelatih);
    }

    public function update(DataPelatihRequest $request, $id)
    {
        try {
            $dataPelatih = DataPelatih::find($id);
            $data = $this->dataPelatihService->updateData($dataPelatih, $request);

            return response()->json($data, 200);
        } catch (\Throwable $th) {
            if ($dataPelatih == null) {
                return response()->json([
                    'data not found',
                ], 404);
            }

            return response()->json([
                'error' => 'data tidak valid',
            ], 500);
        }
    }
}
