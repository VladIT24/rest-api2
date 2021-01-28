<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'category_id' => $this->faker->numberBetween(1,5),
            'count' => $this->faker->numberBetween(1,100),
            'price' => $this->faker->randomFloat(null,100, 100000),
            'description' => $this->faker->paragraph(3)
        ];
    }
}
