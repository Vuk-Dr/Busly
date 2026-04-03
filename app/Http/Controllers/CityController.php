<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function search(Request $request)
    {
        $keyword = $request->keyword;

        if(empty($keyword)){
            return response()->json([]);
        }

        $cities = City::where('name', 'like', '%' . $keyword . '%')
                        ->orderBy('name')
                        ->limit(10)
                        ->get();

        $formatted_cities = [];
        foreach ($cities as $city) {
            $formatted_cities[] = [
                'id' => $city->id,
                'text' => $city->name
            ];
        }

        return response()->json($formatted_cities);
    }
}
