<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentValidate extends FormRequest
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
            'name' => 'required|string|max:255',  
            'position' => 'required|string|max:255',  
            'admission_date' => 'required|date',  
            'salary' => 'required|numeric|min:0',  
            'employee_stats' => 'required|string|max:50', 
            'PIS_PASEP' => 'required|string|size:11', 
        ];
    }
}
