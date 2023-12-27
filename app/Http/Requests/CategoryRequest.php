<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:100',
                Rule::unique(table: 'categories', column:'name')->ignore(id: request('category'), idColumn:'id')]
        ];
    }

    public function messages(){
        return [
            'name.required' => "Nombre de la categoria es requerido",
            'name.string' => "El nombre debe ser una cadena de texto",
            'name.max' => "El nombre no puede tener más de 100 caracteres",
            'name.unique' => "La categoria ya existe"
        ];
    }
}
