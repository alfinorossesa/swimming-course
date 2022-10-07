<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PerkembanganLatihanResource extends JsonResource
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
            'pelatih' => $this->pelatih->nama,
            'tanggal_latihan' => $this->tanggal_latihan,
            'lokasi' => $this->lokasi,
            'keterangan' => $this->keterangan,
        ];
    }
}
