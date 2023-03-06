<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'      => 'required|string',
            'username'  => 'required|string',
            'role'      => 'required|integer|max:1',
            'password'  => 'required|string'
        ];
    }

    public function messages(){
        return [
            'name.required'     => 'form nama wajib di isi',
            'name.string'       => 'form nama wajib di isi dengan string',
            'username.required' => 'form username wajib di isi',
            'username.string'   => 'form username wajib di isi dengan string',
            'role.required'     => 'form role wajib di pilih',
            'role.string'       => 'form role error',
            'role.max'          => 'isi form role melebihi ketentuan',
            'password.required' => 'form password wajib di isi',
            'password.string'   => 'form password wajib di isi dengan string',
        ];
    }
}
