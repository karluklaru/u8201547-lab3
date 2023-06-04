<?php

namespace App\Http\Api\V1\Modules\Trips\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TripResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'departure_date' => $this->departure_date,
            'train_id' => $this->train_id,
            'ticket_count' => $this->ticket_count,
            'ticket_price' => $this->ticket_price,
        ];
    }
}
