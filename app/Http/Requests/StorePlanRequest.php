<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePlanRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'price' => ['required'],
            'maxProduct' => ['required', 'integer'],
            'maxInvoice' => ['required', 'integer'],
            'maxUser' => ['required', 'integer'],
            'storageLimit' => ['required', 'integer'],
            'status' => ['boolean'],
            'description' => ['nullable']
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'max_product' => $this->maxProduct,
            'max_users' => $this->maxUser,
            'max_invoice' => $this->maxInvoice,
            'storage_limit' => $this->storageLimit,
        ]);
    }
}
