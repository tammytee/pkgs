<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Package>
 */
class PackageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tracking_number' => fake()->randomElement([
                '9214490285384593960678',
                '4204322992748927005303010231236283',
                'YT2304721292018731',
                '9214490289730320286973',
            ]),
        ];
    }
}
