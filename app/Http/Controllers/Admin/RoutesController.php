<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateRouteRequest;
use App\Models\BasePrice;
use App\Models\Carrier;
use App\Models\City;
use App\Models\Price;
use App\Models\Route;
use App\Models\RouteStop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoutesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $routes = Route::with('carrier')->paginate(20);

        return view('pages.admin.routes.index', compact('routes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities = City::all()->sortBy('name');
        $carriers = Carrier::all()->sortBy('name');
        return view('pages.admin.routes.create', compact('cities', 'carriers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRouteRequest $request)
    {
        try{
            $carrier_id = $request->carrier_id;
            $seats = $request->seats;
            $stops = $request->stops;
            $base_price = $request->base_price;

            DB::beginTransaction();
            $route = new Route();
            $route->carrier_id = $carrier_id;
            $route->seats = $seats;
            $route->price = $base_price;
            $route->save();

            foreach ($stops as $s) {
                $stop = new RouteStop();
                $stop->route_id = $route->id;
                $stop->city_id = $s['city'];
                $stop->order = $s['order'];
                if($stop->order > 1){
                    $stop->duration = $s['duration'];
                    $stop->price = $s['price'];
                }
                $stop->save();
            }
            DB::commit();
            return redirect()->route('admin.routes.index')->with('success', 'Route created successfully');
        }
        catch (\Throwable $e){
            DB::rollBack();
            \Log::error($e->getMessage());
            return redirect()->route('admin.routes.create')->with('error', 'Error creating route');
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $route = Route::with('routeStops')->find($id);
        if(!$route){
            return redirect()->route('admin.routes.index')->with('error', 'Route not found');
        }
        $carriers = Carrier::all()->sortBy('name');
        $cities = City::all()->sortBy('name');

        return view('pages.admin.routes.edit', compact('route', 'cities', 'carriers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateRouteRequest $request, string $id)
    {
        try{
            $route = Route::with('routeStops')->find($id);
            if(!$route){
                return redirect()->route('admin.routes.index')->with('error', 'Route not found');
            }
            DB::beginTransaction();
            $route->carrier_id = $request->carrier_id;
            $route->seats = $request->seats;
            $route->price = $request->base_price;
            $route->save();

           // $stops = $route->routeStops()->delete();

            $stops = $request->stops;
            foreach ($stops as $s) {
                /*
                if(\Arr::has($s, 'id')){
                    $stop = RouteStop::find($s['id']);
                }else{
                    $stop = new RouteStop();
                    $stop->route_id = $route->id;
                }
                $stop->city_id = $s['city'];
                $stop->order = $s['order'];
                if($stop->order > 1){
                    $stop->duration = $s['duration'];
                    $stop->price = $s['price'];
                }
                */
                $s->save();
            }
            DB::commit();
            return redirect()->route('admin.routes.index', ['page' => $request->page])
                ->with('success', 'Route updated successfully');
        }catch (\Throwable $e){
            DB::rollBack();
            \Log::error($e->getMessage());
            return redirect()->route('admin.routes.edit', $id)->with('error', 'Error updating route');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
