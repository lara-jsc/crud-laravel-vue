<?php

namespace Database\Factories;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ServiceRecord>
 */
class ServiceRecordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
      
            'service_type' => $this->faker->randomElement(['Type 1', 'Type 2', 'Type 3']),
            'service_date' => $this->faker->date,
            'duration' => $this->faker->numberBetween(1, 24),
            'result' => $this->faker->randomElement(['Pending', 'Completed', 'In Progress']),
            'description' => $this->faker->sentence,
            'notes' => $this->faker->paragraph,
            'employee_id' => 11,
        ];
    }
}
