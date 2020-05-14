<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveRolesRequest extends FormRequest
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
            'title' => 'required',
        ];

        if($this->method() !== 'PUT')
        {
            $rules['name'] = 'required|unique:bouncer_roles';
        };

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'El identificador del rol es obligatorio',
            'name.unique' => 'Este identificador ya está registrado',
            'title.required' => 'El nombre del rol es obligatorio'
        ];
    }
}
