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
            'major' => fake()->randomElement(['AKL', 'TKJ', 'BiD']),
            'class' => fake()->randomElement([
                '10 AKL',
                '11 AKL',
                '11 TKJ 1',
                '11 TKJ 2',
                '10 BiD',
                '12 TKJ 1',
                '12 TKJ 2',
                '12 TKJ 3',
            ]),
        ];
    }
}
