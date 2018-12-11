<?php

use Illuminate\Database\Seeder;
use App\Cuisine;

class CuisineTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
public function run()
{
     $cuisines = [
        ['American', 'Get inspired by Stateside favourites, from burgers and hotdogs to pancakes and pies.'],
        ['Chinese', 'Memorable oriental dishes such as sea bass and ginger.'],
        ['Japanese', 'The distinctive dishes of Japansese cuisine are healthy, light and fresh - try out sushi, sashimi and noodles.'],
        ['Thai', 'Sweet and sour Thai curries, noodles and rice.'],
        ['Italian', 'Popular Italian-style dishes such as pasta and cacciatore.'],
        ['Indian', 'Spicy Eastern recipes such as masala chicken.'],
    ];

    $count = count($cuisines);

    foreach ($cuisines as $key => $cuisineData) {
        $cuisine = new Cuisine();

        $cuisine->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
        $cuisine->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
        $cuisine->name = $cuisineData[0];
        $cuisine->description = $cuisineData[1];

        $cuisine->save();
        $count--;
    }
}
}
