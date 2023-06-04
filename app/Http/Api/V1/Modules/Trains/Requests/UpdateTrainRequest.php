<?php

namespace App\Http\Api\V1\Modules\Trains\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTrainRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'departure_station' => ['nullable', 'string'],
            'arrival_station' => ['nullable', 'string'],
            'departure_time' => ['nullable', 'string'],
            'arrival_time' => ['nullable', 'string'],
            'cars_number' => ['nullable', 'numeric', 'min:5'],
        ];
    }
}
