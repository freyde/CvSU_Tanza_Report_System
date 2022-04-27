<?php

namespace Database\Seeders;

use App\User;
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
        // \App\Models\User::factory(10)->create();
        $user = [
            [
                'name'=>'admin',
                'email'=>'admin@cvsu.edu.ph',
                'role'=>'admin',
                'password'=> bcrypt('admin1234'),
                'department'=>'DIT',
                'designation'=>'none'
            ],
            [
                'name'=>'user',
                'email'=>'user@cvsu.edu.ph',
                'role'=>'user',
                'password'=> bcrypt('user1234'),
                'department'=>'DAS',
                'designation'=>'none'
            ],
        ];
  
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
