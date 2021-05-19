<?php

use Illuminate\Database\Seeder;
use App\User;  

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('users')->delete();
         $users = [            
            ['id'=>'1',
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin')],

            ['id'=>'2',
            'name' => 'abc',
            'email' => 'abc@gmail.com',
            'password' => bcrypt('abc')],

            ['id'=>'3',
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('user')],

            ['id'=>'4',
            'name' => 'xyz',
            'email' => 'xyz@gmail.com',
            'password' => bcrypt('xyz')],



        ];
        
    
        foreach ($users as $user) {
            User::create($user);
        }
    }
        
}
