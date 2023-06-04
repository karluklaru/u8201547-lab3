<?php

namespace App\Http\Api\V1\Modules\Trains\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Api\V1\Modules\Trains\Resources\TrainResource;
use App\Domain\Trains\Models\Train;
use App\Http\Api\V1\Modules\Trains\Requests\CreateTrainRequest;
use App\Domain\Trains\Actions\CreateTrainAction;
use App\Domain\Trains\Actions\DeleteTrainAction;
use App\Domain\Trains\Actions\PatchTrainAction;
use App\Http\Api\V1\Modules\Trains\Requests\UpdateTrainRequest;

class TrainController extends Controller
{
    public function getTrains() {
        return TrainResource::collection(Train::all());
    }
    
    public function getTrainById(int $train_id) : TrainResource {
        return new TrainResource(Train::query()->findOrFail($train_id));
    }

    public function addTrain(CreateTrainRequest $request, CreateTrainAction $action) : TrainResource {
        return new TrainResource($action->execute($request->validated()));
    }

    public function deleteTrain(int $train_id, DeleteTrainAction $action) {
        $action->execute($train_id);
    }

    public function updateTrain(int $train_id, UpdateTrainRequest $request, PatchTrainAction $action) {
        return new TrainResource($action->execute($train_id, $request->validated()));
    }

}
