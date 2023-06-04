<?php

namespace App\Http\Api\V1\Modules\Trips\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTripRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $id = (int) $this->route('id');
        return [
            'departure_date' => ['nullable', 'date'],
            'train_id' => ['nullable', 'numeric', 'min:1'],
            'ticket_count' => ['nullable', 'numeric', 'min:60'],
            'ticket_price' => ['nullable', 'numeric', 'min:100000'],
        ];
    }
}
