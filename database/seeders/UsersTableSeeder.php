<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
           [  
                'id' => 1,
                'name' => 'Admin Admin',
                'email' => 'admin@black.com',
                'password' => Hash::make('secret'),
                'manager' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 2,
                'name' => 'Ahmed Ali',
                'email' => 'ahmed@gmail.com',
                'password' => Hash::make(12345678),
                'manager' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 3,
                'name' => 'test',
                'email' => 'test@gmail.com',
                'password' => Hash::make(12345678),
                'manager' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
