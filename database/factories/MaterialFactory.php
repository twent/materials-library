<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\MaterialType;
use Illuminate\Database\Eloquent\Factories\Factory;

class MaterialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type' => $this->faker->randomElement(MaterialType::keys()),
            'category_id' => $this->faker->randomElement(Category::pluck('id')),
            'title' => $this->faker->realTextBetween(12, 34),
            'authors' => $this->faker->realTextBetween(23, 37),
            'description' => $this->faker->realTextBetween(128, 512),
        ];
    }
}
