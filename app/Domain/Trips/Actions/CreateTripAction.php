<?php

namespace App\Domain\Trips\Actions;

use App\Domain\Trips\Models\Trip;

class CreateTripAction 
{
    public function execute(array $fields) : Trip
    {
        $trip = new Trip($fields);
        $trip->save();
        return $trip;
    }
}