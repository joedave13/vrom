<?php

namespace App\Http\Requests\User\Booking;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'start_date' => ['required', 'string'],
            'end_date' => ['required', 'string'],
            'address' => ['required', 'string'],
            'city' => ['required', 'string', 'max:255'],
            'zip_code' => ['nullable', 'string', 'max:15']
        ];
    }
}
