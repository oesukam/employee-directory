<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateEmployeeRequest extends Request
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
            'department_id' => 'integer',
            'name' => 'required|between:3,20',
            'job_title' => 'min:3',
            'cellphone' => 'unique:employees|phone|max:20',
            'email' => 'required|unique:employees|email|max:255',
            'photo'=>'image|mimes:jpeg,jpg,bmp,png,gif',
        ];
    }
}
