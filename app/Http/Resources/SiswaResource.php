<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SiswaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nama' => $this->nama,
            'tempat_lahir' => $this->tempat_lahir,
            'tanggal_lahir' => $this->tanggal_lahir,
            'jenis_kelamin' => $this->jenis_kelamin,
            'nama_ortu' => $this->nama_ortu,
            'alamat' => $this->alamat,
            'no_telp' => $this->no_telp,
            'data_pembayaran_kursus' => $this->dataPembayaranSiswa(),
            'data_perkembangan_siswa' => $this->perkembanganLatihanSiswa()
        ];
    }
}
