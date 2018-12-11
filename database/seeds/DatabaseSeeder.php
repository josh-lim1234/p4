<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(CuisineTableSeeder::class);
        $this->call(RestaurantTableSeeder::class);
        $this->call(DietTableSeeder::class);
        $this->call(PhotoTableSeeder::class);
        $this->call(DietPhotoTableSeeder::class);
        $this->call(CuisineRestaurantTableSeeder::class);        
    }
}
