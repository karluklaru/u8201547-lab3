<?php

namespace App\Domain\Trips\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\TripFactory;

class Trip extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function train() {
        return $this->belongsTo(Train::class);
    }

    public static function factory() : TripFactory {
        return TripFactory::new();
    }
}
