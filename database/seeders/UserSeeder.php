<?php

namespace Database\Seeders;

use Faker\Generator;
use Illuminate\Container\Container;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * The current Faker instance.
     *
     * @var \Faker\Generator
     */
    protected $faker;

    /**
     * Create a new seeder instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->faker = $this->withFaker();
    }

    /**
     * Get a new Faker instance.
     *
     * @return \Faker\Generator
     */
    protected function withFaker()
    {
        return Container::getInstance()->make(Generator::class);
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $number = 1;

        for ($i = 0; $i < 50; $i++) {
            DB::table('users')->insert([
                'name' => $this->faker->word(),
                'email' => $this->faker->email(),
                'group_id' => $number,
                'year_id' => $number,
                'created_at' => $this->faker->dateTimeBetween('now', ),
                'updated_at' => $this->faker->dateTimeBetween('now',),
            ]);
        }
    }
}
