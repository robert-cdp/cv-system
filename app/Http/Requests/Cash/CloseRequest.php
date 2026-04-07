<?php

namespace App\Http\Requests\Cash;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CloseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check();
    }

    public function rules(): array
    {
        return [
            'closing_amount' => 'nullable|numeric|min:0',
        ];
    }
}
