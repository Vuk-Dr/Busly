<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateCarrierRequest;
use App\Http\Requests\Admin\CreateCityRequest;
use App\Http\Requests\Admin\UpdateCarrierRequest;
use App\Models\Carrier;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CarriersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carriers = Carrier::with('city')->paginate(10);

        return view('pages.admin.carriers.index', compact('carriers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities = City::all();
        return view('pages.admin.carriers.create' , compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateCarrierRequest $request)
    {
        try{
            $carrier = new Carrier();
            $carrier->name = $request->name;
            $carrier->email = $request->email;
            $carrier->phone = $request->phone;
            $carrier->city_id = $request->city;
            $image = $request->image;

            $filename = $image->store('uploads/carriers', 'public');
            $filename = explode('/', $filename)[2];

            $carrier->image = $filename;
            $carrier->save();

            return redirect()->route('admin.carriers.index')->with('success','Carrier created successfully');
        }catch(\Exception $exception){
            Log::error($exception->getMessage());
            return redirect()->route('admin.carriers.index')->with('error','Error creating carrier');
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
        $carrier = Carrier::find($id);
        if(!$carrier){
            return redirect()->route('admin.carriers.index')->with('error','Carrier not found');
        }
        $cities = City::all();
        return view('pages.admin.carriers.edit', compact('carrier','cities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCarrierRequest $request, string $id)
    {
        try{
            $carrier = Carrier::find($id);
            if(!$carrier){
                return redirect()->route('admin.carriers.index')->with('error','Carrier not found');
            }
            $carrier->name = $request->name;
            $carrier->email = $request->email;
            $carrier->phone = $request->phone;
            $carrier->city_id = $request->city;

            if($request->image) {
                \Storage::disk('public')->delete('uploads/carriers/'.$carrier->image);

                $filename = $request->image->store('uploads/carriers', 'public');
                $filename = explode('/', $filename)[2];
                $carrier->image = $filename;
            }
            $carrier->save();
            return redirect()->route('admin.carriers.index',['page' => $request->page])
                            ->with('success','Carrier updated successfully');
        }catch(\Exception $exception){
            Log::error($exception->getMessage());
            return redirect()->route('admin.carriers.index',['page' => $request->page])
                ->with('error','Error updating carrier');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $carrier = Carrier::find($id);
            if(!$carrier){
                return redirect()->route('admin.carriers.index')->with('error', 'Carrier not found');
            }
            $carrier->delete();
            return redirect()->route('admin.carriers.index')->with('success', 'Carrier deleted successfully');
        }catch(\Exception $exception){
            Log::error($exception->getMessage());
            return redirect()->route('admin.carriers.index')->with('error', 'Error deleting carrier');
        }
    }
}
