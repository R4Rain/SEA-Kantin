<?php

namespace Database\Seeders;

use App\Models\Canteen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Item;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // Item::factory(10)->create();


        // Canteen Balance Init
        $balance = Canteen::first();
        if (!$balance) {
            Canteen::create([
                'balance' => 0
            ]);
        }
    }
}
