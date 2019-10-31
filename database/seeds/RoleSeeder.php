<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [

        	['name' => 'admin', 'class' => 'label label-success'],
        	['name' => 'member', 'class' => 'label label-primary'],
        ];

        foreach($roles as $role){

        	Role::create(['name' => $role['name'], 'class' => $role['class']]);
        }
    }
}
