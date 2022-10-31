<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PharmacyRequest extends FormRequest
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
            'title' => ['required', 'max:10', 'string'],
            'first_name' =>  ['required','max:50', 'string'],
            'last_name' =>  ['required','max:50', 'string'],
            'gender' => ['required'],
            'phone' => ['required','max:11', 'string'],
            // 'email' => ['required', 'email', 'unique:users,email'],
            'address'=> ['required','max:50', 'string'],
            'education'=> ['required', 'string'],
            'specialization'=> ['required', 'string'],
            'speciality'=> ['required', 'string'],
            'language'=> ['required',  'string'],
            'bio'=> ['required', 'string', 'max:150'],
            'image' => ['image']

        ];
    }
}
