<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Priorities;
use App\Models\Task;
use App\Models\TaskAttachment;
use App\Models\TaskComment;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
        // User::factory(4)->create(),
        // Priorities::factory(3)->create(),
        // Category::factory(5)->create(),
        // Task::factory(10)->create(),
        // TaskComment::factory(10)->create(),
        // TaskAttachment::factory(10)->create()
        ]);
        

       
    }
}
