<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StorePhotoRequest extends Request
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
            'path' => 'required|url',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'path.required' => 'Adres URL nie może pozostać pusty',
            'path.url'  => 'Nieprawidłowy adres URL',
        ];
    }
}
