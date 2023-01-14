<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'start',
        'end',
        'day',
        'slot_id',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function slot()
    {
        return $this->belongsTo(User::class);
    }
}
