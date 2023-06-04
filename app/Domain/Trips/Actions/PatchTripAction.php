<?php

namespace App\Domain\Trips\Actions;

use App\Domain\Trips\Models\Trip;

class PatchTripAction 
{
    public function execute(int $trip_id, array $fields) : Trip {        
        $trip = Trip::query()->findOrFail($trip_id);
        $trip->update($fields);
        $trip->save();
        return $trip;
    }
}