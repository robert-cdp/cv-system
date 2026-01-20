<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check();
    }

    public function rules(): array
    {
        return [
            'type' => [
                'required',
                Rule::in([
                    'email',
                    'cellphone',
                    'phone',
                    'whatsapp',
                    'other',
                ]),
            ],

            'value' => 'required|string|max:255',

            'is_primary' => 'nullable|boolean',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'is_primary' => $this->boolean('is_primary'),
        ]);
    }
}
