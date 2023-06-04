<?php

namespace App\Http\Api\V1\Modules\Trips\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Api\V1\Modules\Trips\Resources\TripResource;
use App\Domain\Trips\Models\Trip;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Api\V1\Modules\Trips\Requests\CreateTripRequest;
use App\Domain\Trips\Actions\CreateTripAction;
use App\Domain\Trips\Actions\DeleteTripAction;
use App\Domain\Trips\Actions\PatchTripAction;
use App\Http\Api\V1\Modules\Trips\Requests\UpdateTripRequest;

class TripController extends Controller
{
    public function getTrains() {
        return TripResource::collection(Trip::all());
    }
    
    public function getTripById(int $train_id) : TripResource {
        return new TripResource(Trip::query()->findOrFail($train_id));
    }

    public function addTrip(CreateTripRequest $request, CreateTripAction $action) : TripResource {
        return new TripResource($action->execute($request->validated()));
    }

    public function deleteTrip(int $train_id, DeleteTripAction $action) {
        $action->execute($train_id);
    }

    public function updateTrip(int $train_id, UpdateTripRequest $request, PatchTripAction $action) {
        return new TripResource($action->execute($train_id, $request->validated()));
    }

}
