<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class carsRequest extends FormRequest
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
        $validations = [
            'car' => 'required',
            'model' => 'required',
            'year' => 'required',

        ];
        return $validations;
    }

    public function messages()
    {
        $messages = [
            'car-input.required' => 'Parameter \'car\' is required',
            'model-input.required' => 'Parameter \'model\' is required',
            'year-input.required' => 'Parameter \'year\' is required',

        ];
        return $messages;
    }
}
