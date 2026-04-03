<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

            for ($i = 0; $i < 12; $i++) {
                $city = new City();
                $city->name = $faker->city();

                $filename = \Str::random(40) . '.png';
                \Storage::disk('public')->put('uploads/cities/'.$filename, \File::get('public/assets/test-image.png'));

                $city->image = $filename;
                $city->save();
            }

    }
}
