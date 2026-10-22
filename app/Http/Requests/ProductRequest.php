<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        // PATCH boleh parsial, POST/PUT wajib lengkap
        $required = $this->isMethod('patch') ? 'sometimes' : 'required';

        return [
            'name'        => [$required, 'string', 'min:3', 'max:255'],
            'price'       => [$required, 'integer', 'min:0'],
            'description' => ['nullable', 'string'],
        ];
    }
}