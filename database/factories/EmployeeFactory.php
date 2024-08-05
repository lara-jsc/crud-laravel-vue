<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'user_id' => \App\Models\User::factory(),
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone_number' => $this->faker->phoneNumber(),
            'hire_date' => $this->faker->date(),
            'position' => $this->faker->randomElement(['Manager', 'Developer', 'Designer']),
            'department' => $this->faker->randomElement(['IT','HR', 'Engineering', 'Marketing']),
            'status' => $this->faker->randomElement(['Active', 'Inactive','Terminated']),
        ];
    }
}