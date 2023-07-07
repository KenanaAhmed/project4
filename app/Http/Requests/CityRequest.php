<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CityRequest extends FormRequest
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
            'name'=>'required|max:100|unique:cities,name',
            'photo'=>'image',
             ];
    }
    public function messages()
    {
        return $messages=[
            'name.require'=>"you should to input name",
            'name.unique'=>"oh no you should be unique",
        ];
    }
}
