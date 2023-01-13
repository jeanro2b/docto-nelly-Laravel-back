<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Reservation;

class Slot extends Model
{
    use HasFactory, Reservation;

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
