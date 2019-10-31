<?php

use Illuminate\Database\Seeder;
use App\DocsStatus;

class DocsStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [

        	['name' => 'New', 'class' => 'label label-primary'],
        	['name' => 'In process', 'class' => 'label label-info'],
            ['name' => 'Shipping', 'class' => 'label label-warning'],
        	['name' => 'Approve', 'class' => 'label label-success'],
        	['name' => 'Delivered', 'class' => 'label label-success'],
            ['name' => 'Cancelled', 'class' => 'label label-danger'],
        	['name' => 'Disapprove', 'class' => 'label label-danger'],

        ];

        foreach ($statuses as $status) {
        	DocsStatus::create(['name' => $status['name'], 'class' => $status['class']]);
        }
    }
}
