<?php
/**
 * Created by: Juan Martín Espitia
 */

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'price' => 100,
            'photo' => $this->faker->imageUrl(),
            'category' => $this->faker->word,
            'auctioned' => $this->faker->boolean,
            'buyerId' => null,
            'sellerId' => User::factory(),
            'orderId' => null,
        ];
    }
}
