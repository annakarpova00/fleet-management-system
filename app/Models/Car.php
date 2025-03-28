<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Car extends Model
{
    use HasFactory;

    protected $fillable = ['number', 'driver_name'];

        public function fleets()
    {
        return $this->belongsToMany(Fleet::class, 'car_fleet', 'car_id', 'fleet_id');
    }

}
