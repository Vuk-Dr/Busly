<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    protected $fillable = ['name', 'image'];

    public function carriers(){
        return $this->hasMany(Carrier::class);
    }
    public function route_stops(){
        return $this->hasMany(RouteStop::class);
    }
}
