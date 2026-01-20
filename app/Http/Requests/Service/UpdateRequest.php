<?php

namespace App\Http\Requests\Service;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check();
    }

    public function rules(): array
    {
        return [
            'category_id' => [
                'required',
                'integer',
                'exists:service_categories,id',
            ],

            'name' => [
                'required',
                'string',
                'min:3',
                'max:255',
            ],

            'subtitle' => [
                'nullable',
                'string',
                'min:3',
                'max:255',
            ],

            'icon' => [
                'nullable',
                'string',
                'max:50',
            ],

            'description' => [
                'required',
                'string',
                'min:10',
            ],

            'price' => [
                'required',
                'numeric',
                'min:0',
                'max:999999.99',
            ],

            'is_active' => [
                'sometimes',
                'boolean',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'category_id.required' => 'Debe seleccionar una categoría.',
            'category_id.integer' => 'La categoría seleccionada no es válida.',
            'category_id.exists' => 'La categoría seleccionada no existe.',

            'name.required' => 'El nombre del servicio es obligatorio.',
            'name.string' => 'El nombre del servicio debe ser texto.',
            'name.min' => 'El nombre del servicio debe tener al menos :min caracteres.',
            'name.max' => 'El nombre del servicio no puede exceder :max caracteres.',

            'subtitle.string' => 'El subtítulo debe ser texto.',
            'subtitle.min' => 'El subtítulo debe tener al menos :min caracteres.',
            'subtitle.max' => 'El subtítulo no puede exceder :max caracteres.',

            'icon.string' => 'El icono debe ser texto.',
            'icon.max' => 'El icono no puede exceder :max caracteres.',

            'description.required' => 'La descripción del servicio es obligatoria.',
            'description.string' => 'La descripción debe ser texto.',
            'description.min' => 'La descripción debe tener al menos :min caracteres.',

            'price.required' => 'El precio es obligatorio.',
            'price.numeric' => 'El precio debe ser un número válido.',
            'price.min' => 'El precio no puede ser negativo.',
            'price.max' => 'El precio excede el límite permitido.',

            'is_active.boolean' => 'El estado del servicio no es válido.',
        ];
    }
}
