<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressValidate extends FormRequest
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
            
            'cep' => 'required|digits:8',
            'street' => 'required|string|max:255', 
            'number' => 'required|integer', 
            'city' => 'required|string|max:255',  
            'state' => 'required|string|max:255',
            
        ];
    }
}
