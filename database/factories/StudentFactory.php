<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Student::class;

    public function definition(): array
    {
        return [
            'fname' => fake()->firstName(),
            'lname' => fake()->lastName(),
            'age' => random_int(17, 25),
            'path_img' => fake()->imageUrl(640, 480, 'people', true)
        ];
    }
}
