<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Fleet extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'address', 'schedule'];

    public function cars()
    {
        return $this->belongsToMany(Car::class, 'car_fleet', 'fleet_id', 'car_id')->withTimestamps();
    }
}
