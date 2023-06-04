<?php

namespace App\Domain\Trips\Actions;

use App\Domain\Trips\Models\Trip;

class DeleteTripAction 
{
    public function execute(int $trip_id)
    {
        Trip::where('id', $trip_id)->delete();
    }
}