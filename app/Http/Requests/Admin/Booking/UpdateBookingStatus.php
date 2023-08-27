<?php

namespace App\Http\Requests\Admin\Booking;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBookingStatus extends FormRequest
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
            'booking_status' => ['required', 'string', Rule::in('Pending', 'On Delivery', 'On Rent', 'Finished', 'Cancel')],
            'payment_status' => ['required', 'string', Rule::in('Pending', 'Success', 'Failed')]
        ];
    }
}
