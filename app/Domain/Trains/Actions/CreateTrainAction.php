<?php

namespace App\Domain\Trains\Actions;

use App\Domain\Trains\Models\Train;

class CreateTrainAction 
{
    public function execute(array $fields) : Train
    {
        $train = new Train($fields);
        $train->save();
        return $train;
    }
}