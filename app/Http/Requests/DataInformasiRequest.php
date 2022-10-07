<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DataInformasiRequest extends FormRequest
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
            'judul_info' => 'required',
            'detail_info' => 'required',
            'foto' => 'required'
        ];

        if (request()->isMethod('PUT')) {
            $rules['foto'] = '';
        }
        
        return $rules;
    }
}
