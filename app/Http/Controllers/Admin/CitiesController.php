<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateCityRequest;
use App\Http\Requests\Admin\UpdateCityRequest;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;


class CitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cities = City::paginate(10);

        return view('pages.admin.cities.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.cities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateCityRequest $request)
    {
        try{
            $city = new City();
            $city->name = $request->name;

            $image = $request->image;

            $filename = $image->store('uploads/cities', 'public');
            $filename = explode('/', $filename)[2];

            $city->image = $filename;
            $city->save();

            return redirect()->route('admin.cities.index')->with('success','City created successfully');
        }catch(\Exception $exception){
            Log::error($exception->getMessage());
            return redirect()->route('admin.cities.index')->with('error','Error creating city');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $city = City::find($id);

        if(!$city){
            return redirect()->route('admin.cities.index')->with('error','City not found');
        }

        return view('pages.admin.cities.edit', compact('city'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCityRequest $request, string $id)
    {
        try{
            $city = City::find($id);
            if(!$city){
                return redirect()->route('admin.cities.index')->with('error','City not found');
            }
            $city->name = $request->name;
            if($request->image) {
                Storage::disk('public')->delete('uploads/cities/'.$city->image);

                $filename = $request->image->store('uploads/cities', 'public');
                $filename = explode('/', $filename)[2];
                $city->image = $filename;
            }
            $city->save();
            return redirect()->route('admin.cities.index',['page' => $request->page])
                ->with('success','City updated successfully');
        }catch(\Exception $exception){
            Log::error($exception->getMessage());
            return redirect()->route('admin.cities.index',['page' => $request->page])
                ->with('error','Error updating city');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $city = City::find($id);

            if(!$city){
                return redirect()->route('admin.cities.index')->with('error','City not found');
            }
            $msg = 'Can\'t delete this city because it’s still used by ';
            if($city->carriers()->count() > 0){
                return redirect()->route('admin.cities.index')->with('error',$msg.'carriers');
            }
            if($city->route_stops()->count() > 0){
                return redirect()->route('admin.cities.index')->with('error',$msg.'routes');
            }
            $city->delete();
            return redirect()->route('admin.cities.index')->with('success','City deleted successfully');
        }
        catch (\Exception $exception){
            Log::error($exception->getMessage());
            return redirect()->route('admin.cities.index')->with('error','Error deleting city');
        }
    }
}
