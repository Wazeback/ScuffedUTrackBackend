<?php
namespace Database\Seeders;

use Illuminate\Container\Container;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator;

class IssueTableSeeder extends Seeder
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
            DB::table('issues')->insert([
                'title' => $this->faker->word(),
                'description' => $this->faker->paragraph(3),
                'state' => $number,
                'user_id' => $number,
                'sprint_id' => $number,
                'priority_id' => $number,
                'subject_id' => $number,
                'created_at' => $this->faker->dateTimeBetween('now', ),
                'updated_at' => $this->faker->dateTimeBetween('now',),
                'duedate' => $this->faker->dateTimeBetween('now', ),
                'status_id' => $number,
                'estimation' => '2',
                'spenttime' => '4h',
            ]);
        }
    }
}
