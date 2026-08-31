<?php

namespace Database\Factories;

use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Habit;
/**
 * @extends Factory<Model>
 */
class HabitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $habits = [
            'Ler a Bíblia',
            'Ler 10 páginas',
            'Beber bastante água',
            'Fazer exercicios físicos',
        ];
        return [
            'user_id' => 1,
            'name' => $this->faker->unique()->randomElement($habits),
        ];
    }
}
