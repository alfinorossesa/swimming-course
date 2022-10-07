<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\InformasiResource;
use App\Models\DataInformasi;
use Illuminate\Http\Request;

class InformasiController extends Controller
{
    public function index()
    {
        $dataInformasi = DataInformasi::latest()->get();

        return InformasiResource::collection($dataInformasi);
    }
}
