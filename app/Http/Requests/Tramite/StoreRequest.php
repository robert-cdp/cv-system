<?php

namespace App\Http\Requests\Tramite;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check();
    }

    public function rules(): array
    {
        return [
            'service_id' => 'required|exists:services,id',

            'email' => 'required|string|max:150',
            'password' => 'required|string|min:4',

            'field_additional_1' => 'nullable|string',
            'field_additional_2' => 'nullable|string',

            'status' => 'nullable|in:completo,pendiente',
            'comment' => 'nullable|string',
        ];
    }

    public function attributes(): array
    {
        return [
            'service_id' => 'servicio',
            'email' => 'correo electrónico',
            'password' => 'contraseña',
            'field_additional_1' => 'información adicional 1',
            'field_additional_2' => 'información adicional 2',
            'status' => 'estado',
            'comment' => 'comentario',
        ];
    }

    public function messages(): array
    {
        return [
            'service_id.required' => 'Debe seleccionar un :attribute.',
            'service_id.exists'   => 'El :attribute seleccionado no es válido.',

            'email.required' => 'El :attribute es obligatorio.',
            'email.max'      => 'El :attribute no puede superar los :max caracteres.',

            'password.required' => 'La :attribute es obligatoria.',
            'password.min'      => 'La :attribute debe tener al menos :min caracteres.',

            'status.in' => 'El :attribute seleccionado no es válido.',
        ];
    }
}
