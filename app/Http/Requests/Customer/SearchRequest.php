<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class SearchRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check();
    }

    public function rules(): array
    {
        return [
            'dpi' => [
                'nullable',
                'string',
                'digits_between:6,15',
                'required_without_all:nit,full_name,birthday',
            ],

            'nit' => [
                'nullable',
                'string',
                'max:20',
                'required_without_all:dpi,full_name,birthday',
            ],

            'full_name' => [
                'nullable',
                'string',
                'min:3',
                'max:150',
                'required_without_all:dpi,nit,birthday',
            ],

            'birthday' => [
                'nullable',
                'date',
                'before:today',
                'required_without_all:dpi,nit,full_name',
            ],
        ];
    }

    public function attributes(): array
    {
        return [
            'dpi'       => 'DPI',
            'nit'       => 'NIT',
            'full_name' => 'nombre completo',
            'birthday'  => 'fecha de nacimiento',
        ];
    }

    public function messages(): array
    {
        return [
            'required_without_all' =>
                'Debe llenar al menos uno de los campos para realizar la búsqueda.',

            'birthday.before' =>
                'La :attribute no puede ser una fecha futura.',
        ];
    }
}
