<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Departure;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DeparturesController extends Controller
{
    //
    public function index(Request $request)
    {
        try{
            $departureCityId = $request->departure;
            $arrivalCityId = $request->arrival;
            $searchDate = $request->date;

            $departures = Departure::whereHas('route', function ($routeQuery) use ($departureCityId, $arrivalCityId) {
                $routeQuery->whereHas('routeStops', function ($arrivalStopQuery) use ($departureCityId, $arrivalCityId) {
                    $arrivalStopQuery->where('city_id', $arrivalCityId)
                                    ->where('order', '>', function ($departureStopSubQuery) use ($departureCityId) {
                            $departureStopSubQuery->select('order')
                                ->from('route_stops')
                                ->whereColumn('route_id', 'routes.id')
                                ->where('city_id', $departureCityId);
                        });
                });
            })->where(function ($query) use ($searchDate) {
                $query->where('one_time', 0)
                    ->orWhere(function ($q) use ($searchDate) {
                        $q->where('one_time', 1)
                            ->whereDate('date', $searchDate);
                    });
            })->where('active', 1)->with([
                'route.carrier',
                'route.routeStops' => function ($query) {
                    $query->orderBy('order', 'asc');
                },
                'route.routeStops.city'
            ])->paginate(10);

            $departures->map(function ($departure) use ($departureCityId, $arrivalCityId) {
                $segmentPrice = 0;
                $minutesToDeparture = 0;
                $segmentDurationMinutes = 0;
                $calculatePrice = false;
                $isPricingFinished = false;

                $timeline = [];
                $currentTime = Carbon::parse($departure->time);
                $inJourney = false;

                foreach ($departure->route->routeStops as $index => $stop) {

                    if ($stop->city_id == $departureCityId) {
                        $calculatePrice = true;
                    }

                    if ($calculatePrice && !$isPricingFinished) {
                        if ($stop->city_id != $departureCityId) {
                            $segmentPrice += $stop->price;
                            $segmentDurationMinutes += $stop->duration;
                        }
                    } elseif (!$calculatePrice) {
                        $minutesToDeparture += $stop->duration;
                    }

                    if ($index > 0) {
                        $currentTime->addMinutes($stop->duration);
                    }

                    $isStart = ($stop->city_id == $departureCityId);
                    $isEnd = ($stop->city_id == $arrivalCityId);

                    if ($isStart) $inJourney = true;

                    if ($isStart || $isEnd) {
                        $textClass = 'text-primary';
                    } elseif ($inJourney) {
                        $textClass = '';
                    } else {
                        $textClass = 'text-body-tertiary';
                    }

                    $timeline[] = (object) [
                        'time' => $currentTime->format('H:i'),
                        'city_name' => $stop->city->name,
                        'class' => $textClass,
                    ];

                    if ($isEnd) {
                        $inJourney = false;
                        $isPricingFinished = true;
                    }
                }

                $segmentDepartureTime = Carbon::parse($departure->time)->addMinutes($minutesToDeparture);
                $segmentArrivalTime = $segmentDepartureTime->copy()->addMinutes($segmentDurationMinutes);

                $hours = floor($segmentDurationMinutes / 60);
                $minutes = $segmentDurationMinutes % 60;
                $durationText = $hours > 0 ? "{$hours}h {$minutes}m" : "{$minutes}m";

                $departure->segment_price = $segmentPrice;
                $departure->segment_departure_time = $segmentDepartureTime->format('H:i');
                $departure->segment_arrival_time = $segmentArrivalTime->format('H:i');
                $departure->duration_text = $durationText;

                $departure->start_city_name = $departure->route->routeStops->firstWhere('city_id', $departureCityId)->city->name;
                $departure->end_city_name = $departure->route->routeStops->firstWhere('city_id', $arrivalCityId)->city->name;

                $departure->timeline = $timeline;

                return $departure;
            });
            $departureCity = City::find($departureCityId);
            $arrivalCity = City::find($arrivalCityId);

            return view('pages.departures', compact('departures', 'departureCity', 'arrivalCity', 'searchDate'));
        }catch(\Exception $e){
            \Log::error($e->getMessage());
            return redirect()->route('home.index')->with('error', 'Something went wrong');
        }
    }
}
