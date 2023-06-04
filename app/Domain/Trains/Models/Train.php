<?php

namespace App\Domain\Trains\Models;

use Database\Factories\TrainFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Train extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function trips() {
        return $this->hasMany(Trip::class);
    }

    public static function factory() : TrainFactory {
        return TrainFactory::new();
    }
        
    
}
