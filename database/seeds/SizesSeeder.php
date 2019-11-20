<?php

use Illuminate\Database\Seeder;
use App\Size;

class SizesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sizes = [
        	//Business Cards, 1-side, foil and transparent
        	[
        		'product_id' => 1,
        		'category_id' => null,
        		'size' => '3.5in x 2in'
        	],
        	[
        		'product_id' => 1,
        		'category_id' => null,
        		'size' => '2in x 3.5in'
        	],

        	//Marketing Collaterals
        	  // flyer 1-side
        	[
        		'product_id' => 2,
        		'category_id' => 4,
        		'size' => '8.5in x 11in'
        	],
        	[
        		'product_id' => 2,
        		'category_id' => 4,
        		'size' => '5.5in x 2.5in'
        	],
        	//Brochures tri-fold
        	[
        		'product_id' => 2,
        		'category_id' => 5,
        		'size' => '8.5in x 15in'
        	],
        	[
        		'product_id' => 2,
        		'category_id' => 5,
        		'size' => '6.3in x 11in'
        	],
        	//Posters
        	[
        		'product_id' => 3,
        		'category_id' => 5,
        		'size' => '5.5in x 11in'
        	],
        	//office forums
        	[
        		'product_id' => 3,
        		'category_id' => null,
        		'size' => '9.2in x 8.4in'
        	],
        	[
        		'product_id' => 3,
        		'category_id' => null,
        		'size' => '4.4in x 5.5in'
        	],
        ];

        foreach ($sizes as $size) {
        	Size::create([
        		'product_id' => $size['product_id'],
        		'category_id' => $size['category_id'],
        		'size' => $size['size']
        	]);
        }
    }
}
