<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Client::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $postes = ['Développeur Web','Développeur Mobile','Architecte','Musicien','Designer','Photographe','PDG iSOFT'];
        return [
            'name' => $this->faker->name,
            'poste' => $postes[rand(0,6)],
            'tel' => $this->faker->phoneNumber,
            'email'=> $this->faker->unique()->safeEmail()
        ];
    }
}
