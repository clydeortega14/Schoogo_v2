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
        OrderStatus::create(['status' => 'pending', 'class' => 'badge badge-warning']);
        OrderStatus::create(['status' => 'in process', 'class' => 'badge badge-primary']);
        OrderStatus::create(['status' => 'shipping', 'class' => 'badge badge-info']);
        OrderStatus::create(['status' => 'delivered', 'class' => 'badge badge-success']);
    }
}
