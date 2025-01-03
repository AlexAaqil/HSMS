<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserLevelsSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(ClassesSeeder::class);
        $this->call(ClassSectionsSeeder::class);
        $this->call(ParentsSeeder::class);
        $this->call(StudentsSeeder::class);
        $this->call(ParentStudentSeeder::class);
    }
}
