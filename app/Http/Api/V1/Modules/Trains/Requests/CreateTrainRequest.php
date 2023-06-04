<?php

namespace App\Http\Api\V1\Modules\Trains\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTrainRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'departure_station' => ['required', 'string'],
            'arrival_station' => ['required', 'string'],
            'departure_time' => ['required', 'string'],
            'arrival_time' => ['required', 'string'],
            'cars_number' => ['required', 'numeric', 'min:5'],
        ];
    }
}
