<?php

namespace Database\Seeders;

use App\Models\Group;
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

        $this->call(IssueTableSeeder::class);
        $this->call(GroupSeeder::class);
        $this->call(SprintSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(YearSeeder::class);
        $this->call(SubjectSeeder::class);
        $this->call(StatusSeeder::class);
    }
}
