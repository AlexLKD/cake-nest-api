<?php

namespace Database\Seeders;

use App\Models\Cupcake;
use App\Models\Order;
use App\Models\User;
use Database\Factories\CupcakeFactory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Order::factory(2)->create(['user_id' => 11]);
        // Cupcake::factory(9)->create();
    }
}
