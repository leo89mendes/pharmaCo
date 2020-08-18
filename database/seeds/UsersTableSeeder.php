<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        //table that links the role to the user
        DB::table('role_user')->truncate();

        $adminRole = Role::where('name', 'admin')->first();
        $authorRole = Role::where('name', 'author')->first();
        $userRole = Role::where('name', 'user')->first();
        
        $admin = User::create([
            'name' => 'Admin User',
            'username' => 'adminuser', 
            'email' => 'admin@admin.com',
            'password'=>Hash::make('password')
        ]);

        $author = User::create([
            'name' => 'Author User',
            'username' => 'authoruser',
            'email' => 'author@author.com',
            'password'=>Hash::make('password')
        ]);

        $user = User::create([
            'name' => 'Generic User',
            'username' => 'genericuser',
            'email' => 'user@admin.com',
            'password'=>Hash::make('password')
        ]);
        
        $admin->roles()->attach($adminRole);  
        $author->roles()->attach($authorRole);
        $user->roles()->attach($userRole);
    }
    
}
