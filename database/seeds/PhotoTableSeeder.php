		<?php

		use Illuminate\Database\Seeder;
		use App\Photo;

		class PhotoTableSeeder extends Seeder
		{
		    /**
		     * Run the database seeds.
		     *
		     * @return void
		     */
		public function run()
		{
		     $photos = [
		        ['Crispy Fried Chicken', 1, 1, '', 'https://caribbeansoulbrooklyn.files.wordpress.com/2012/09/13282821_xxl.jpg'],
		        ['Bak Kut Teh', 1, 1, 'normal', 'https://i.hungrygowhere.com/business/9c/8a/12/00/klang-bak-kut-teh.jpg'],
		        ['Sushi', 1, 2, 'normal', 'https://www.thespruceeats.com/thmb/zXLb_CpfArfgjM-J_4BW2LeTd_4=/4288x2848/filters:no_upscale():max_bytes(150000):strip_icc()/183341110-56a541b93df78cf772875a55.jpg'],
		        ['Green Curry', 1, 3, 'normal', 'https://img.taste.com.au/Y3OSiJEI/taste/2016/11/thai-green-chicken-curry-106836-1.jpeg'],
		        ['Pasta', 2, 3, 'normal', 'https://img.taste.com.au/4QzWvygL/taste/2016/11/gluten-free-pasta-with-napoletana-sauce-100170-1.jpeg'],	
		        ['Butter Chicken', 2, 1, 'normal', 'https://img.taste.com.au/AbiWkcA0/taste/2016/11/easy-butter-chicken-74432-1.jpeg'],
		        ['Pad Thai', 2, 2, 'normal', 'https://img.taste.com.au/KQ-uZ5Tk/w720-h480-cfill-q80/taste/2016/11/chicken-pad-thai-94082-1.jpeg'],		       
		    ];

		    $count = count($photos);

		    foreach ($photos as $key => $photoData) {
		        $photo = new Photo();

		        $photo->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
		        $photo->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
		        $photo->title = $photoData[0];
		        $photo->user_id = $photoData[1];
		        $photo->image = $photoData[4];	
		        $photo->description = $photoData[0];	
		        $photo->restaurant_id = $photoData[2];	        		         
		        $photo->save();
		        $count--;
		    }
		}
		}
