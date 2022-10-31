<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientRequest extends FormRequest
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
            'first_name' =>  ['required','max:50', 'string'],
            'last_name' =>  ['required','max:50', 'string'],
            'gender' => ['required'],
            'phone' => ['required','max:11', 'string'],
            'email' => ['email'],
            'address'=> ['required','max:50', 'string'],
            'height'=> ['string'],
            'blood_group'=> ['string'],
            'image' => ['image']
        ];
    }
}
