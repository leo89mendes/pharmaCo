<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Empty all the data from it and then re populate it with what we tell them to do.
        Role::truncate();

        Role::create(['name'=>'admin']);
        Role::create(['name'=>'author']);
        Role::create(['name'=>'user']);
    }
}
