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
	        	'name' => 'Business Cards',
	        	'description' => 'this is a business card',
	        	
        	],
        	[
        		'name' => 'Marketing Collaterals',
        		'description' => 'this is a marketing collaterals',
        		
        	],
        	[
        		'name' => 'Office Forums',
        		'description' => 'This is an office forums',
        		
        	],
        ];

        foreach($products as $product){
        	Product::create([
        		'name' => $product['name'],
        		'description' => $product['description'],
        	]);
        }
    }
}
