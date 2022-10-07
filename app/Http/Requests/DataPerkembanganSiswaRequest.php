<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DataPerkembanganSiswaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'pelatih_id' => 'required',
            'siswa_id' => 'required',
            'tanggal_latihan' => 'required',
            'lokasi' => 'required',
            'keterangan' => 'required'
        ];
    }
}
