<?php

use Illuminate\Database\Seeder;
use App\Categories;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
        	//Business Cards
        	[
        		'product_id' => 1,
        		'name' => 'Business Card, 1-side'
        	],
        	[
        		'product_id' => 1,
        		'name' => 'Foil Business Cards'
        	],
        	[
        		'product_id' => 1,
        		'name' => 'Transparent Business Cards'
        	],
        	//Marketing Collaterals
        	[
        		'product_id' => 2,
        		'name' => 'Flyers 1-side'
        	],
        	[
        		'product_id' => 2,
        		'name' => 'Brochures, Tri-fold'
        	],
        	[
        		'product_id' => 2,
        		'name' => 'Posters'
        	],
        	//Office Forums
        	[
        		'product_id' => 3,
        		'name' => 'Loose Business Forums'
        	],
        	[
        		'product_id' => 3,
        		'name' => 'Carbon Forms'
        	],
        	[
        		'product_id' => 3,
        		'name' => 'Carbonless Forms'
        	],
        ];

        foreach ($categories as $category) {
        	Categories::create([
        		'product_id' => $category['product_id'],
        		'name'	=> $category['name']
        	]);
        }
    }
}
