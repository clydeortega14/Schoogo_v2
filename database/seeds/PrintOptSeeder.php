<?php

use Illuminate\Database\Seeder;
use App\PaperSize;
use App\PrintType;

class PrintOptSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Paper Size
    	PaperSize::create(['size' => 'Long', 'price' => 1.50]);
    	PaperSize::create(['size' => 'Short', 'price' => 1.00]);

    	//Paper Type
    	PrintType::create(['type' => 'Colored', 'price' => 2.00]);
    	PrintType::create(['type' => 'Black and White', 'price' => 1.00]);
    }
}
