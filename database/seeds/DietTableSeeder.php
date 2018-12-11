<?php

use Illuminate\Database\Seeder;
use App\Diet;

class DietTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
public function run()
{
     $diets = [
        ['Normal'],
        ['Halal'],
        ['Kosher'],
        ['Vegetarian'],
        ['Vegan'],
        ['Lactose Intolerance'],
        ['Gluten free'],
        ['Diabetic'],
        ['Low Carbs'],
    ];

    $count = count($diets);

    foreach ($diets as $key => $dietData) {
        $diet = new Diet();

        $diet->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
        $diet->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
        $diet->name = $dietData[0];
        $diet->save();
        $count--;
    }
}
}
