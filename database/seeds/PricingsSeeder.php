<?php

use Illuminate\Database\Seeder;
use App\Pricings;
class PricingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pricings = [
        	
        	[
        		'size' => 1,
        		'quantity' => 50,
        		'price' => 350.00
        	],
        	[
        		'size' => 1,
        		'quantity' => 100,
        		'price' => 650.00
        	],
        	[
        		'size' => 1,
        		'quantity' => 300,
        		'price' => 900.00
        	],
        	[
        		'size' => 2,
        		'quantity' => 25,
        		'price' => 450.00
        	],
        	[
        		'size' => 2,
        		'quantity' => 75,
        		'price' => 550.00
        	],
        	[
        		'size' => 2,
        		'quantity' => 150,
        		'price' => 800.00
        	],
        	[
        		'size' => 3,
        		'quantity' => 50,
        		'price' => 1000.00
        	],
        	[
        		'size' => 3,
        		'quantity' => 100,
        		'price' => 1800.00
        	],
        	[
        		'size' => 3,
        		'quantity' => 300,
        		'price' => 2500.00
        	],
        	[
        		'size' => 4,
        		'quantity' => 50,
        		'price' => 750.00
        	],
        	[
        		'size' => 4,
        		'quantity' => 100,
        		'price' => 950.00
        	],
        	[
        		'size' => 4,
        		'quantity' => 300,
        		'price' => 1500.00
        	],
        	[
        		'size' => 5,
        		'quantity' => 50,
        		'price' => 400.00
        	],
        	[
        		'size' => 5,
        		'quantity' => 100,
        		'price' => 600.00
        	],
        	[
        		'size' => 5,
        		'quantity' => 100,
        		'price' => 800.00
        	],
        	[
        		'size' => 6,
        		'quantity' => 50,
        		'price' => 780.00
        	],
        	[
        		'size' => 6,
        		'quantity' => 100,
        		'price' => 1200.00
        	],
        	[
        		'size' => 6,
        		'quantity' => 300,
        		'price' => 1500.00
        	],
        	[
        		'size' => 7,
        		'quantity' => 50,
        		'price' => 650.00
        	],
        	[
        		'size' => 7,
        		'quantity' => 100,
        		'price' => 990.00
        	],
        	[
        		'size' => 7,
        		'quantity' => 300,
        		'price' => 1450.00
        	],
        	[
        		'size' => 8,
        		'quantity' => 50,
        		'price' => 570.00
        	],
        	[
        		'size' => 8,
        		'quantity' => 100,
        		'price' => 880.00
        	],
        	[
        		'size' => 8,
        		'quantity' => 300,
        		'price' => 1130.00
        	],
        	[
        		'size' => 9,
        		'quantity' => 50,
        		'price' => 267.00
        	],
        	[
        		'size' => 9,
        		'quantity' => 100,
        		'price' => 490.00
        	],
        	[
        		'size' => 9,
        		'quantity' => 300,
        		'price' => 720.00
        	],

        ];

        foreach ($pricings as $price) {
        	Pricings::create([
        		'size' => $price['size'],
        		'quantity' => $price['quantity'],
        		'price' => $price['price']
        	]);
        }
    }
}
