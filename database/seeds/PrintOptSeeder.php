<?php

use Illuminate\Database\Seeder;
use App\PrintOption;

class PrintOptSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PrintOption::create(['option' => 'Colored', 'price' => 50.00]);
        PrintOption::create(['option' => 'B & W', 'price' => 20.00]);
        PrintOption::create(['option' => 'Blank', 'price' => 0.00]);
    }
}
