<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user= User::query()->first();

        if ($user === null) {
            $user = User::factory()->create([
                'name' => 'System Administrator',
                'email' => 'admin@gmail.com',
            ]);
        }

        Customer::factory()
            ->count(20)
            ->create([
                'created_by' => $user->id,
            ]);
    }
}
