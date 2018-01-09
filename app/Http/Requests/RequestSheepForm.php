<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestSheepForm extends FormRequest
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
            'title'         => 'required',
            'price'         => 'required|numeric|min:1',
            'description'   => 'required',
            'users'         => 'required',
            'users.*'       => 'numeric'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Titre obligatoire',
            'description.required'  => 'Description obligatoire',
            'users.required' => 'La dépense doit etre partagé au moins par une personne',
            'price.numeric' => "Prix obligatoire"
        ];
    }
}
