<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeValidate extends FormRequest
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
            'profile_pic'=>'required|mimes:jpeg,jpg,png|max:2048',
            'curriculum'=>'required|mimes:pdf|max:2048',
            'name' => 'required|string|max:255',
            'cpf' => 'required|unique:employees|digits:11',
            'rg' => 'required|unique:employees',
            'birth_date' => 'required|date',
            'email' => 'required|email|unique:employees',
            'phone' => 'required|integer|unique:employees',
            'gender' => 'required|string',
            'marital_status' => 'required|string',
            'children' => 'required|integer',
            'address_id' => 'required|exists:addresses,id',
        ];
    }
}
