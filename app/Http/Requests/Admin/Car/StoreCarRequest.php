<?php

namespace App\Http\Requests\Admin\Car;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->role == 'ADMIN';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255', Rule::unique('cars')],
            'brand_id' => ['required', 'integer', Rule::exists('brands', 'id')],
            'type_id' => ['required', 'integer', Rule::exists('types', 'id')],
            'price' => ['required', 'integer'],
            'rating' => ['required', 'numeric', 'max:5']
        ];
    }
}
