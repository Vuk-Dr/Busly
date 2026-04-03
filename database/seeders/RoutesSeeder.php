<?php

namespace Database\Seeders;

use App\Models\BasePrice;
use App\Models\Price;
use App\Models\Route;
use App\Models\RouteStop;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class RoutesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $route = new Route();
        $route->carrier_id = rand(1, 10);
        $route->seats = rand(40, 60);
        $route->price = rand(50,400);
        $route->save();

        foreach (range(1, 5) as $i) {
            $rs = new RouteStop();
            $rs->route_id = $route->id;
            $rs->city_id = $i;
            $rs->order = $i;
            if($rs->order > 1){
                $rs->duration = rand(20,180);
                $rs->price = rand(30,200);
            }
            $rs->save();
        }

    }
}
