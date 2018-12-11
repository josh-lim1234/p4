<?php

use Illuminate\Database\Seeder;

class DietPhotoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $photos = App\Photo::all();
        $diets = App\Diet::all();
        foreach ($photos as $photo) {
            foreach ($diets as $diet) {
                $photo->diets()->save($diet);
            }
        }
    }
}
