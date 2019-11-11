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

        $users = [

            [
                'firstname' => 'Administrator', 
                'lastname' => 'admin cpanel', 
                'email' => 'admin@cpanel.com',
                'username' => 'admin',
                'password' => Hash::make('password'),
                'contact' => '09153185249',
                'address' => 'Secret Town, Developers Home',
                // 'role_id' => 1,
                'status' => true
            ],
            [
                'firstname' => 'Clyde', 
                'lastname' => 'Ortega', 
                'email' => 'member@example.com',
                'username' => 'member',
                'password' => Hash::make('password'),
                'contact' => '09153185249',
                'address' => 'Secret Town, Developers Home',
                // 'role_id' => 2,
                'status' => true
            ],

        ];

        foreach($users as $user){

            User::create([

                'firstname' => $user['firstname'],
                'lastname' => $user['lastname'],
                'email' => $user['email'],
                'username' => $user['username'],
                'password' => $user['password'],
                'contact' => $user['contact'],
                'address' => $user['address'],
                // 'role_id' => $user['role_id'],
                'status' => $user['status'],
            ]);
        }
    }
}
