<?php

use Illuminate\Database\Seeder;

class CuisineRestaurantTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $restaurants = App\Restaurant::all();
        $cuisines = App\Cuisine::all();
        foreach ($restaurants as $restaurant) {
            foreach ($cuisines as $cuisine) {
                $restaurant->cuisines()->save($cuisine);
            }    	
        }
    }
}
