<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ProductsSeeder::class);
        $this->call(CategoriesSeeder::class);
        $this->call(SizesSeeder::class);
        $this->call(PricingsSeeder::class);
        $this->call(OrdersStatusSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UsersSeeder::class);
    }
}
