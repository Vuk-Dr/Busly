<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Route extends Model
{
    public function name(){
        return $this->firstStop()->city->name . ' - ' . $this->lastStop()->city->name;
    }
    public function duration(){
        return $this->routeStops()->sum('duration');
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
