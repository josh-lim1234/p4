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
        ['American', 'Get inspired by Stateside favourites, from burgers and hotdogs to pancakes and pies.', 'https://www.lemonsforlulu.com/wp-content/uploads/2018/06/Pizza-Burger-2-720x720.jpg'],
        ['Chinese', 'Memorable oriental dishes such as sea bass and ginger.', 'https://i.pinimg.com/originals/9c/3d/49/9c3d49974b2369aca17b04860e68640d.jpg'],
        ['Thai', 'Sweet and sour Thai curries, noodles and rice.', 'https://www.wokandskillet.com/wp-content/uploads/2015/04/green-curry-with-chicken-720x720.jpg'],
        ['Japanese', 'The distinctive dishes of Japansese cuisine are healthy, light and fresh - try out sushi, sashimi and noodles.', 'https://www.foodandhome.co.za/wp-content/uploads/2017/02/Pattypan-and-bulgur-wheat-sushi-with-mango-chilli-dip.jpg'],
        ['Italian', 'Popular Italian-style dishes such as pasta and cacciatore.', 'https://content3.jdmagicbox.com/comp/ahmedabad/z3/079pxx79.xx79.170819192747.w6z3/catalogue/american-food-house-bodakdev-ahmedabad-fast-food-9x5eclu86k.jpg'],
        ['Indian', 'Spicy Eastern recipes such as masala chicken.', 'https://mustbeyummie.com/wp-content/uploads/2015/06/naan13.jpg'],
    ];

    $count = count($cuisines);

    foreach ($cuisines as $key => $cuisineData) {
        $cuisine = new Cuisine();

        $cuisine->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
        $cuisine->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
        $cuisine->name = $cuisineData[0];
        $cuisine->description = $cuisineData[1];
        $cuisine->image = $cuisineData[2];

        $cuisine->save();
        $count--;
    }
}
}
