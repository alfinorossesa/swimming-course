<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\DataPembayaranRequest;
use App\Services\DataPembayaranService;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    protected $dataPembayaranService;
    public function __construct(DataPembayaranService $dataPembayaranService)
    {
        $this->dataPembayaranService = $dataPembayaranService;
    }

    public function store(DataPembayaranRequest $request)
    {
        try {
            $pembayaran = $this->dataPembayaranService->storeData($request);

            return response()->json($pembayaran, 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => [
                    'tanggal_lahir' => 'format yyyy-mm-dd',
                ]
            ], 500);
        }
    }
}
