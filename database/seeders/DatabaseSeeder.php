<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Plan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'token'       => Str::uuid(),
            'first_name' => 'Test',
            'last_name'  => 'User',
            'email'      => 'test@example.com',
        ]);

        Plan::create([
            'label' => 'Bronze',
            'name' => 'bronze',
            'description' => 'Qualquer coisa',
            'price_monthly' => 5,
            'price_yearly' => 50,
            'stripe_price_monthly_id' => 'price_1NR0ZkDWJ2xEgC6g574s1wy7',
            'stripe_price_yearly_id' => 'price_1NR0ZkDWJ2xEgC6gCSwOtrGC',
        ]);

        Plan::create([
            'label' => 'Silver',
            'name' => 'silver',
            'description' => 'Qualquer coisa',
            'price_monthly' => 10,
            'price_yearly' => 100,
            'stripe_price_monthly_id' => 'price_1NR0ifDWJ2xEgC6gagZVK9Uz',
            'stripe_price_yearly_id' => 'price_1NR0ifDWJ2xEgC6g8MiD2PHa',
        ]);

        Plan::create([
            'label' => 'Gold',
            'name' => 'gold',
            'description' => 'Qualquer coisa',
            'price_monthly' => 20,
            'price_yearly' => 200,
            'stripe_price_monthly_id' => 'price_1NR0jgDWJ2xEgC6gGuc3enk8',
            'stripe_price_yearly_id' => 'price_1NR0jgDWJ2xEgC6g6gTtBfFn',
        ]);
    }
}
