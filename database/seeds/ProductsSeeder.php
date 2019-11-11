<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
        	[
	        	'name' => 'Brochures',
	        	'description' => 'This is a brochure',
	        	'status' => true
        	],
        	[
        		'name' => 'Business Forums',
        		'description' => 'This is a business forum',
        		'status' => true
        	],
        	[
        		'name' => 'Flyers',
        		'description' => 'This is a flyers',
        		'status' => true
        	],
        	[
        		'name' => 'Business Cards',
        		'description' => 'This is a business card',
        		'status' => true
        	],
        	[
        		'name' => 'stickers',
        		'description' => 'this is a sticker',
        		'status' => true
        	],
        	[
        		'name' => 'post cards',
        		'description' => 'this is a post cards',
        		'status' => true
        	],
        ];

        foreach($products as $product){
        	Product::create([
        		'name' => $product['name'],
        		'description' => $product['description'],
        		'status' => $product['status']
        	]);
        }
    }
}
