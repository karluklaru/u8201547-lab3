<?php

namespace App\Http\Api\V1\Modules\Trips\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTripRequest extends FormRequest
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
            'departure_date' => ['required', 'date'],
            'train_id' => ['required', 'numeric', 'min:1'],
            'ticket_count' => ['required', 'numeric', 'min:60'],
            'ticket_price' => ['required', 'numeric', 'min:100000'],
        ];
    }
}
