<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class FornecedorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [

            'nome' => 'required|max:80|min:5',
            'cnpj' => 'required|max:11|min:11|unique:fornecedors,cnpj',
            'email' => 'required|email|unique:fornecedors,email',
            'password' => 'required',
            'telefone' => 'required|max:15|min:10',
            'ocupacao' => 'required|max:80|min:5'
            
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'sucess' => false,
            'error' => $validator->errors()
        ]));
    }


    public function messages()
    {
        return [

            'nome.required' => 'O campo nome é obrigatorio',
            'nome.max' => 'O campo nome deve ter no maximo 80 caracteres',
            'nome.min' => 'O campo nome deve ter no minimo 5 caracteres',
            'cnpj.required' => 'O campo CNPJ é obrigatorio',
            'cnpj.max' => 'CNPJ deve ter no maximo 11 caracteres',
            'cnpj.min' => 'CNPJ deve ter no maximo 11 caracteres',
            'cnpj.unique' => 'CNPS já cadastrado no sistema',
            'telefone, required' => 'O numero de telefone é obrigatorio',
            'telefone.max' => 'O numero de telefone deve conter no maximo 15',
            'telefone.min' => 'O numero de telefone é deve conter no minimo 10',
            'email.required' => 'O Email é obrigatorio',
            'email.email' => 'formato de email invalido',
            'email.unique' => 'O Email já cadastrado',
            'password.required' => 'Senha obrigatoria',
            'ocupacao.required' => 'O campo ocupacao é obrigatorio',
            'ocupacao.max' => 'O campo ocupacao deve ter no maximo 80 caracteres',
            'ocupacao.min' => 'O campo ocupacao deve ter no minimo 5 caracteres',
            


        ];
    }
}
