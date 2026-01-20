<?php

namespace App\Http\Requests\Service\Category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check();
    }

    public function attributes(): array
    {
        return [
            'name' => 'nombre de la categoría',
            'icon' => 'icono',
            'description' => 'descripción',
        ];
    }

    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'min:3',
                'max:255',
                Rule::unique('service_categories', 'name')
                    ->ignore($this->route('slug'), 'slug'),
            ],

            'icon' => [
                'nullable',
                'string',
                'max:100',
            ],

            'description' => [
                'nullable',
                'string',
                'min:10',
                'max:500',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El nombre de la categoría es obligatorio.',
            'name.string' => 'El nombre de la categoría debe ser texto.',
            'name.min' => 'El nombre de la categoría debe tener al menos :min caracteres.',
            'name.max' => 'El nombre de la categoría no puede exceder :max caracteres.',
            'name.unique' => 'Ya existe otra categoría con este nombre.',

            'icon.string' => 'El icono debe ser texto.',
            'icon.max' => 'El icono no puede exceder :max caracteres.',

            'description.string' => 'La descripción debe ser texto.',
            'description.min' => 'La descripción debe tener al menos :min caracteres.',
            'description.max' => 'La descripción no puede exceder :max caracteres.',
        ];
    }
}
