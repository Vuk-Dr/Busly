<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Carrier extends Model
{
    public function city(){
        return $this->belongsTo(City::class);
    }
    public function routes(){
        return $this->hasMany(Route::class);
    }
}
