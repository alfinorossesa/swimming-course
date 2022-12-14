<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DataPembayaranRequest extends FormRequest
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
        $rules = [
            'siswa_id' => 'required',
            'tanggal_bayar' => 'required',
            'jumlah_bayar' => 'required|digits_between:1,9',
            'bukti_pembayaran' => 'required|file|image'
        ];

        if (request()->isMethod('PUT')) {
            $rules['bukti_pembayaran'] = '';
        }
        
        return $rules;
    }
}
