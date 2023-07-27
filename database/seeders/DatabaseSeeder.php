<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'token' => Str::uuid(),
            'first_name' => 'Test',
            'last_name' => 'User',
            'email' => 'test@example.com',
        ]);

        \App\Models\User::factory(10)->create();


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

        // TODO:  implementar admin, gerente, atendente, cliente

        // Role admin
        $roleAdmin = Role::create([
            'name' => 'admin',
            'label' => 'Administrador'
        ]);
        $permissionAdmin = Permission::create([
            'name' => 'delete_user',
            'label' => 'Deletar usuário'
        ]);
        $roleAdmin->givePermissionTo($permissionAdmin);

        // Role seller
        $roleSeller = Role::create([
            'name' => 'seller',
            'label' => 'Vendedor'
        ]);
        $permissionSeller = Permission::create([
            'name' => 'ship_product',
            'label' => 'Despachar produto'
        ]);
        $roleSeller->givePermissionTo($permissionSeller);


        $user1 = User::first();
        $user1->assignRole('admin');

        $user2 = User::find(2);
        $user2->assignRole('seller');
    }
}
