<?php

namespace Database\Seeders;

use App\Models\Departure;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DepartureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 0; $i < 10; $i++){
            $faker = Faker::create();
            $departure = new Departure();
            $departure->route_id = rand(1,5);
            $departure->time = $faker->time('H:i');
            $departure->one_time = $faker->boolean(30);
            $departure->date = $departure->one_time ? $faker->date() : null;
            $departure->active = $faker->boolean(70);
            $departure->save();
        }
    }
}
