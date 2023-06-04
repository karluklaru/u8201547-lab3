<?php

namespace App\Domain\Trains\Actions;

use App\Domain\Trains\Models\Train;

class PatchTrainAction 
{
    public function execute(int $train_id, array $fields) : Train {        
        $train = Train::query()->findOrFail($train_id);
        $train->update($fields);
        $train->save();
        return $train;
    }
}