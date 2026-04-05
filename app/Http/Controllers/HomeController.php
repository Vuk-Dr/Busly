<?php

namespace App\Http\Controllers;


use App\Models\Carrier;
use App\Models\Route;
use App\Models\RouteStop;

class HomeController extends Controller
{
    public function index()
    {
        $carriers = Carrier::withCount('routes')
            ->orderBy('routes_count', 'desc')
            ->limit(10)->get();
        $routes = Route::withCount('departures')
            ->with('routeStops')
            ->orderBy('departures_count', 'desc')
            ->limit(3)->get();

        $routes->map(function ($route) {
           $image = $route->lastStop()->city->image;

           $duration = $route->routeStops->sum('duration');

            $hours = floor($duration / 60);
            $minutes = $duration % 60;
            $durationText = $hours > 0 ? "{$hours}h {$minutes}m" : "{$minutes}m";

            $route->image = $image;
            $route->duration = $durationText;

           return $route;
        });
        $todayDate = date("Y-m-d");

        return view('pages.client.home', compact('carriers', 'routes', 'todayDate'));
    }
}
