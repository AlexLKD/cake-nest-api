<?php

namespace Database\Factories;

use App\Models\Cupcake;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // return [
        //     'user_id' => User::factory()
        // ];
        return [
            'user_id' => function () {
                return User::factory()->create()->id;
            },
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Order $order) {
            $cupcakes = Cupcake::inRandomOrder()->limit(rand(1, 5))->get();
            foreach ($cupcakes as $cupcake) {
                $quantity = rand(1, 5);
                $totalPrice = $cupcake->price * $quantity;
                $order->cupcakes()->attach($cupcake, ['quantity' => $quantity, 'total_price' => $totalPrice]);
            }
        });
    }    

}
