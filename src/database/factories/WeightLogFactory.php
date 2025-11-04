<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\WeightLog;

class WeightLogFactory extends Factory
{
    protected $model = WeightLog::class;

    public function definition()
    {
        return [
            'user_id' => 1,
            'date' => $this->faker->date(),
            'weight' => $this->faker->randomFloat(1, 40, 60),
            'calories' => $this->faker->numberBetween(1500, 3000),
            'exercise_time' => $this->randomExerciseTime(),
            'exercise_content' => $this->faker->sentence(3),
        ];
    }

    protected function randomExerciseTime()
    {
        $hours = $this->faker->numberBetween(0, 4);
        $minutes = $this->faker->numberBetween(0, 59);
        $seconds = $this->faker->numberBetween(0, 59); 
        return sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);
    }
}
