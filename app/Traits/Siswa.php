<?php

namespace App\Traits;

use App\Http\Resources\PembayaranResource;
use App\Http\Resources\PerkembanganLatihanResource;
use App\Models\DataPembayaran;
use App\Models\DataPerkembanganSiswa;

trait Siswa
{
    public function dataPembayaranSiswa()
    {
        $dataPembayaran = DataPembayaran::where('siswa_id', $this->id)->latest()->get();

        return PembayaranResource::collection($dataPembayaran);
    }

    public function perkembanganLatihanSiswa()
    {
        $dataPerkembangan = DataPerkembanganSiswa::where('siswa_id', $this->id)->latest()->get();

        return PerkembanganLatihanResource::collection($dataPerkembangan);
    }
}