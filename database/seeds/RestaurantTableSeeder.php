		<?php

		use Illuminate\Database\Seeder;
		use App\Restaurant;

		class RestaurantTableSeeder extends Seeder
		{
		    /**
		     * Run the database seeds.
		     *
		     * @return void
		     */
		public function run()
		{
		     $restaurants = [
		        ['The Bird Southern Table and Bar', 'Southern cuisine is who we are, and many folks know us for our Lewellyn\'s Fine Fried Chicken. Our world famous chicken recipe calls for the best bird around. Our labor of love begins with a 27 hour brining process, then we dredge it in our secret recipe of spices and flour, followed by the final step of frying to perfection. It is our humble honor to welcome you to our table.', ''],
		        ['Song Fa Bak Kut Teh', 'Johor Road, Singapore, year 1969 - Beads of perspiration gathered at Yeo Eng Song\'s brow as he served another bowl of piping hot Bak Kut Teh to the table beside his pushcart stall. The Bak Kut Teh is running out, the founder of Song Fa thought. It is time to retrieve his meats from the chiller at his friend\'s liquor stall down the road....

					And so, these were the humble beginnings of Song Fa Bak Kut Teh.

					Today, while we do not operate from a pushcart anymore, our iconic pushcart embodies our belief to bring you an original Bak Kut Teh dining experience where you can enjoy our fall-off-the-bone tender pork ribs and flavourful, peppery, spice-infused hot broth in an elaborate 1960s\' roadside dining atmosphere.

					It is at Song Fa, where one can relive the heritage of good old Bak Kut Teh in it\'s truest sense.', 'Chinese'],
		        ['En Sushi', 'A causual dining japanese restaurant serving one of the most authentic classic of japanese cuisine. We are also proud to be serving the most affordable bara-charashi don in town.
					', 'Japanese'],
		    ];

		    $count = count($restaurants);

		    foreach ($restaurants as $key => $restaurantData) {
		        $restaurant = new Restaurant();

		        $restaurant->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
		        $restaurant->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
		        $restaurant->name = $restaurantData[0];
		        $restaurant->description = $restaurantData[1];

		        $restaurant->save();
		        $count--;
		    }
		}
		}
