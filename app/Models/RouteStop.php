<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RouteStop extends Model
{
    public function route(){
        return $this->belongsTo(Route::class);
    }
    public function city(){
        return $this->belongsTo(City::class);
    }
}
