<?php

namespace Database\Factories;

use App\Models\DailyLog;
use Illuminate\Database\Eloquent\Factories\Factory;

class DailyLogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DailyLog::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 10),
            'log' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'day' => $this->faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d'),

        ];
    }
}
