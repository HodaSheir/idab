<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->insert([
            [
                'id' => 1,
                'user_id' => 1,
                'project_id' => 2,
                'task_title' => 'task 1',
                'task_desc' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,",
                'assigned_by' => 3,
                'created_by' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 2,
                'user_id' => 2,
                'project_id' => 3,
                'task_title' => 'task 2',
                'task_desc' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,",
                'assigned_by' => 3,
                'created_by' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
