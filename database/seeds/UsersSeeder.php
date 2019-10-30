<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(['email' => 'admin@example.com', 'password' => Hash::make('admin123')]);
        User::create([
        	'firstname' => 'guest', 
        	'lastname' => 'guest', 
        	'email' => 'guest@example.com', 
        	'password' => Hash::make('admin123'),
        	'contact' => '09153185249',
        	'address' => 'San Roque Talisay City, Cebu'
        ]);
    }
}
