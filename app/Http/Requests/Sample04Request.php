<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Sample04Request extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if($this->path() == 'Sample04'){
            return true;

        }else{
            return false;

        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'name'  => ['required'],
            'email' => ['required','email'],
        ];
    }

    //for error message in japanese
    #[Override]
    public function messages(){
        return[
            'name.required' => '名前入力していません',
            'email.required' => 'メールアドレスは入力していません',
            'email.email' => 'メールアドレスは正しく入れてません',

        ];

    }
}
