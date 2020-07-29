<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Republic;


class RepublicRequest extends FormRequest
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
            'zipCode' => 'required',
            'city' => 'required|string',
            'street' => 'required|string',
            'number' => 'required',
            'totalBathroom' => 'required',
            'haveBackyard' => 'required',
            'acceptPets' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Insira um nome.' ,
            'zipCode.required' => 'Insira um cep.' ,
            'city.required' => 'Insira uma cidade.' ,
            'street.required' => 'Insira uma rua' ,
            'number.required' => 'Insira um número' ,
            'totalBathroom.required' => 'Insira um número de banheiros' ,
        ];
    }
}
