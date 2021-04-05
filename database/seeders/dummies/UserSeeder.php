<?php

namespace Database\Seeders\Dummies;

use Illuminate\Database\Seeder;
// use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Str;
// use Illuminate\Support\Carbon;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create 1 user with fix email address.
        User::factory()->hasEvents(2)
        ->create([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
        ]);
        
        // Create 10 users, each of the user has 2 events.
        // Event will be created based on EventFactory settings.
        
        User::factory()->count(10)
        ->hasEvents(2)
        ->create();
    }
}
