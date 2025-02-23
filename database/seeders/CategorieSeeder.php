<?php


namespace Database\Seeders;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Categories;


class CategorieFactory extends Factory
{
    protected $model = Categories::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->word(),
            // Add other fields as needed
        ];
    }
}
