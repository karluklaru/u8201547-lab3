<?php

namespace App\Http\Api\V1\Modules\Trains\Resources;

use App\Http\Api\V1\Modules\Trips\Resources\TripResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TrainResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'train_id' => $this->id,
            'departure_station' => $this->departure_station,
            'arrival_station' => $this->arrival_station,
            'departure_time' => $this->departure_time,
            'arrival_time' => $this->arrival_time,
            'cars_number' => $this->cars_number,
            'trips' => TripResource::collection($this->whenLoaded('trips')),
        ];
    }
}
