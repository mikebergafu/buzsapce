<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class VerifyCodeRequest extends FormRequest
{
    /**
     * @return array<string, array<int, mixed>>
     */
    public function rules(): array
    {
        $rules = [
            'identifier' => ['required', 'string'],
            'code' => ['required', 'string', 'size:6'],
            'device_name' => ['required', 'string', 'max:255'],
        ];

        if (! $this->isEmail()) {
            $rules['country_code'] = ['required', 'string', 'max:5', 'regex:/^\+\d{1,4}$/'];
        }

        return $rules;
    }

    public function isEmail(): bool
    {
        return filter_var($this->input('identifier'), FILTER_VALIDATE_EMAIL) !== false;
    }

    public function normalizedIdentifier(): string
    {
        if ($this->isEmail()) {
            return strtolower(trim($this->input('identifier')));
        }

        return $this->input('country_code') . $this->input('identifier');
    }
}
