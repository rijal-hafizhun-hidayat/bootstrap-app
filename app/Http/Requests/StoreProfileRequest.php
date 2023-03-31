<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProfileRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'username'      => 'required|string',
            'newUsername'   => 'required|string'
        ];
    }

    public function messages(){
        return [
            'username.required'     => 'form username wajib di isi',
            'username.string'       => 'harus dalam bentuk string',
            'newUsername.required'  => 'form username baru wajib di isi',
            'newUsername.string'    => 'harus dalam bentuk string'
        ];
    }
}
