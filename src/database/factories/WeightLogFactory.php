<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\WeightLog;

class WeightLogFactory extends Factory
{
    protected $model = WeightLog::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'date' => $this->faker->date(),
            'weight' => $this->faker->randomFloat(1, 40, 150), // 40kgから150kgの範囲
            'calories' => $this->faker->numberBetween(100, 500), // 100から500の範囲
            'exercise_time' => $this->faker->time(),
            'exercise_content' => $this->faker->sentence(),
        ];
    }
}
