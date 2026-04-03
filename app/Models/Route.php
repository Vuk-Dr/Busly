<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Route extends Model
{
    public function getName(){
        return $this->firstStop()->city->name . ' - ' . $this->lastStop()->city->name;
    }
    public function getDurationFormatted(){
        $minutes = $this->routeStops()->sum('duration');
        return sprintf('%02d:%02d', floor($minutes / 60), $minutes % 60);
    }
    public function totalPrice(){
        return $this->price + $this->routeStops()->sum('price');
    }
    public function firstStop(){
        return $this->routeStops()->first();
    }
    public function lastStop(){
        return $this->routeStops()->orderBy('order','desc')->first();
    }
    public function routeStops(){
        return $this->hasMany(RouteStop::class);
    }
    public function departures(){
        return $this->hasMany(Departure::class);
    }
    public function carrier(){
        return $this->belongsTo(Carrier::class);
    }
}
