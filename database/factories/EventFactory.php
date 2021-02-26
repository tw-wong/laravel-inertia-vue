<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;


class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {        
        $dateTime = Carbon::today()->addDays(rand(1, 365));
        return [
            'title' => $this->faker->name(),
            'description' => $this->faker->text(),
            'date' => $this->faker->dateTimeBetween('now', '+ 6 months'),
        ];
    }
}
