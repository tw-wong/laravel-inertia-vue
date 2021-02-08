<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Create list of master data here
        $dateTime =  Carbon::today()->addDays(rand(1, 365));
        DB::table('events')->insert([
            'title' => 'Title: ' . Str::random(10),
            'description' => 'Desc: ' .  Str::random(100), 
            'date_time' => $dateTime, 
        ]);
    }
}
