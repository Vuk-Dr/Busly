<?php

namespace Database\Seeders;

use App\Models\Carrier;
use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarrierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        $cities = City::all();
        foreach ($cities as $city) {
            for ($i = 0; $i < rand(3,8); $i++) {
                $carrier = new Carrier();
                $carrier->name = $faker->company();
                $carrier->email = $faker->email();
                $carrier->phone = $faker->phoneNumber();
                $carrier->city_id = $city->id;
                $filename = \Str::random(40) . '.png';
                \Storage::disk('public')->put('uploads/carriers/'.$filename, \File::get('public/assets/test-image2.png'));
                $carrier->image = $filename;
                $carrier->save();
            }
        }
    }
}
