<?php

namespace App\Domain\Trains\Actions;

use App\Domain\Trains\Models\Train;

class DeleteTrainAction 
{
    public function execute(int $train_id)
    {
        Train::where('id', $train_id)->delete();
    }
}