<?php

namespace Database\Factories;

use App\Models\student;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\user;
use App\Models\Major;
use App\Models\SchoolClass;

/**
 * @extends Factory<student>
 */
class StudentFactory extends Factory
{
    protected $Model = student::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nis' => fake()->unique()->numerify("####"),
            'name' => fake()->name(),
            'gender' => fake()->randomElement(['Laki-laki', 'Perempuan']),
            'user_id' => user::factory(),
            'major_id' => Major::inRandomOrder()->first()->id,
            'class_id' => SchoolClass::inRandomOrder()->first()->id,
        ];
    }
}
