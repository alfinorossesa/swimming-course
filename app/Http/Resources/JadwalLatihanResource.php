<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class JadwalLatihanResource extends JsonResource
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
            'hari' => $this->hari,
            'jam' => $this->jam,
            'lokasi' => $this->lokasi,
        ];
    }

    public function with($request)
    {
        return ['message' => 'sukses'];
    }
}
