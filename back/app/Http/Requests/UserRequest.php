<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\User;

class UserRequest extends FormRequest
{
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
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
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'cpf' => 'required|unique:users,cpf',
            'dateOfBirth' => 'required',
            'phoneNumber' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Insira um nome.' ,
            'email.email' => 'Insira um email válido.' ,
            'email.unique' => 'Este email já está sendo utilizado.' ,
            'password.required' => 'Insira uma senha.' ,
        ];
    }
}
