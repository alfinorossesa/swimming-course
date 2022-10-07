<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DataPelatihRequest extends FormRequest
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
            'nama' => 'required|min:5|max:100',
            'no_telp' => 'required|digits_between:11,13',
            'alamat' => 'required',
            'foto' => 'required',
            'username' => 'required|min:5|unique:users,username',
            'password' => 'required|min:8'
        ];

        if (request()->isMethod('PUT')) {
            $rules['foto'] = '';
            $rules['username'] = '';
        }
        
        return $rules;
    }
}
