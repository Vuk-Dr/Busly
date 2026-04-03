<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Departure extends Model
{
    use softDeletes;
    public function route(){
        return $this->belongsTo(Route::class);
    }
    public function tickets(){
        return $this->hasMany(Ticket::class);
    }
}
