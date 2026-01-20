<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
        return Auth::check();
    }

    public function attributes(): array
    {
        return [
            'dpi' => 'DPI',
            'nit' => 'NIT',
            'full_name' => 'nombre completo',
            'birthday' => 'fecha de nacimiento',
        ];
    }

    public function rules(): array
    {
        return [
            'dpi' => [
                'required',
                'digits:13',
                'unique:customers,dpi',
            ],

            'nit' => [
                'nullable',
                'string',
                'regex:/^[A-Z0-9]+$/i',
                'unique:customers,nit',
            ],

            'full_name' => [
                'required',
                'string',
                'min:5',
                'max:200',
            ],

            'birthday' => [
                'required',
                'date',
                'before:today',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'dpi.required' => 'El DPI es obligatorio.',
            'dpi.digits' => 'El DPI debe tener exactamente 13 dígitos.',
            'dpi.unique' => 'El DPI ya está registrado.',

            'nit.string' => 'El NIT debe ser texto.',
            'nit.regex' => 'El NIT debe contener solo caracteres alfanuméricos.',
            'nit.unique' => 'El NIT ya está registrado.',

            'full_name.required' => 'El nombre completo es obligatorio.',
            'full_name.string' => 'El nombre completo debe ser texto.',
            'full_name.min' => 'El nombre completo debe tener al menos :min caracteres.',
            'full_name.max' => 'El nombre completo no puede superar los :max caracteres.',

            'birthday.required' => 'La fecha de nacimiento es obligatoria.',
            'birthday.date' => 'La fecha de nacimiento no es válida.',
            'birthday.before' => 'La fecha de nacimiento debe ser anterior al día de hoy.',
        ];
    }
}
