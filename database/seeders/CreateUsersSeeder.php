<?php

namespace Database\Seeders;
use App\User;
use Illuminate\Database\Seeder;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
    }
}
