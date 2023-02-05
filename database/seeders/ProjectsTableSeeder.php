<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->insert([
            [ 
                'id' => 1,
                'title' => 'project 1',
                'description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,",
                'created_by' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 2,
                'title' => 'project 2',
                'description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,",
                'created_by' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 3,
                'title' => 'project 3',
                'description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,",
                'created_by' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
