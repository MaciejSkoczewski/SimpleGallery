<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreAlbumRequest extends Request
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
            'name' => 'required|max:50',
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
            'name.required' => 'Nazwa albumu nie może zostać pusta',
            'name.max'  => 'Nazwa albumu nie może zawierać więcej niż 50 znaków',
        ];
    }
}
