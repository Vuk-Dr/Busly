<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \DB::beginTransaction();
        $this->call(RoleSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(CarrierSeeder::class);
        $this->call(RoutesSeeder::class);
        $this->call(DepartureSeeder::class);
        \DB::commit();
    }
}
