<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProjectsRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'description' => 'string|nullable',
            'user_id' => 'integer|nullable|exists:users,id'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O nome do projeto é obrigatório.',
            'name.string' => 'O nome do projeto deve ser uma string válida.',
            'name.max' => 'O nome do projeto não pode ter mais que 255 caracteres.',

            'description.string' => 'A descrição deve ser um texto válido.',
            'description.nullable' => 'A descrição pode ser deixada em branco.',

            'user_id.integer' => 'O campo usuário deve ser um número inteiro.',
            'user_id.exists' => 'O usuário selecionado não existe no sistema.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        // Para API, retorna JSON com erro 422
        throw new HttpResponseException(response()->json([
            'success' => false,
            'errors' => $validator->errors()
        ], 422));
    }
}
