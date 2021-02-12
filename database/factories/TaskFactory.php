<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Task;
use DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $client = Client::find($this->faker->numberBetween(1, 20));
        $charge =  $this->faker->randomElement([15, 25, 30]);
        $margin = $charge * .22;
        return [
            'date_time' => $this->faker->dateTimeBetween('-3 weeks'),
            'client_id' => $client->id,
            'provider_id' => $this->faker->numberBetween(1, 10),
            'address' => $client->address,
            'client_charge' => $charge,
            'prestopp_margin' => $margin,
            'provider_vat' => ($charge - $margin) * .12,
            'state' => $this->faker->randomElement([1, 2, 3]),
        ];
    }
}
