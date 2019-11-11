<?php

use Illuminate\Database\Seeder;
use App\OrderStatus;

class OrdersStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OrderStatus::create(['status' => 'pending', 'class' => 'label label-warning']);
        OrderStatus::create(['status' => 'in process', 'class' => 'label label-primary']);
        OrderStatus::create(['status' => 'shipping', 'class' => 'label label-info']);
        OrderStatus::create(['status' => 'delivered', 'class' => 'label label-success']);
    }
}
