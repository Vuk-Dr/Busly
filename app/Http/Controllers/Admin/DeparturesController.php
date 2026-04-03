<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateDepartureRequest;
use App\Models\Departure;
use App\Models\Route;
use Illuminate\Http\Request;

class DeparturesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departures = Departure::with('route')->paginate(15);

        return view('pages.admin.departures.index', compact('departures'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $routes = Route::all();
        return view('pages.admin.departures.create', compact('routes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateDepartureRequest $request)
    {
        try{
            $departure = new Departure();
            $departure->route_id = $request->route_id;
            if($request->one_time){
                $departure->date = $request->date;
            }
            $departure->one_time = (bool)$request->one_time;
            $departure->active = (bool)$request->active;
            $departure->time = $request->time;
            $departure->save();
            return redirect()->route('admin.departures.index')->with('success','Departure created successfully');
        }catch (\Exception $exception){
            \Log::error($exception->getMessage());
            return redirect()->route('admin.departures.index')->with('error','Error creating departure');
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
        $departure = Departure::find($id);
        if(!$departure){
            return redirect()->route('admin.departures.index')->with('error','Departure not found');
        }
        $routes = Route::all();
        return view('pages.admin.departures.edit', compact('departure','routes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateDepartureRequest $request, string $id)
    {
        try{
            $departure = Departure::find($id);
            if(!$departure){
                return redirect()->route('admin.departures.index')->with('error','Departure not found');
            }
            $departure->route_id = $request->route_id;
            $departure->active = (bool)$request->active;
            $departure->one_time = (bool)$request->one_time;
            $departure->time = $request->time;
            if($request->one_time){
                $departure->date = $request->date;
            }
            $departure->save();
            return redirect()->route('admin.departures.index',['page' => $request->page])
                ->with('success','Departure updated successfully');
        }catch (\Exception $exception){
            \Log::error($exception->getMessage());
            return redirect()->route('admin.departures.index',['page' => $request->page])
                            ->with('error','Error updating departure');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $departure = Departure::find($id);
            if(!$departure){
                return redirect()->route('admin.departures.index')->with('error','Departure not found');
            }
            if($departure->tickets()->where('date', '>=', date('Y-m-d'))->exists()){
                return redirect()->route('admin.departures.index')->with('error','Can\'t delete departure because it already have sold tickets');
            }
            $departure->delete();
            return redirect()->route('admin.departures.index')->with('success','Departure deleted successfully');
        }catch (\Exception $exception){
            \Log::error($exception->getMessage());
            return redirect()->route('admin.departures.index')->with('error','Error deleting departure');
        }

    }
}
