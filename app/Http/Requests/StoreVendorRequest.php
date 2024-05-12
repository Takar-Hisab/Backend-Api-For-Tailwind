<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class StoreVendorRequest extends FormRequest
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
            'name' => ['required'],
            'email' => ['required', 'email', 'email:rfc,dns', Rule::unique('users', 'email')],
            'type' => ['required', Rule::in(['vendor'])],
            'phone' => ['required', 'regex:/^(?:\+88|88)?(01[3-9]\d{8})$/', Rule::unique('users', 'phone')],
            'password' => ['nullable', 'min:8']
        ];
    }

    protected function prepareForValidation(): void
    {
        $password = implode('', Arr::random(range(0, 9), 6));
        $this->merge([
            'password' => Hash::make($password)
        ]);
    }


}
