<?php

namespace Database\Factories;

use App\Models\Contato;
use Faker\Provider\pt_BR\Address;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContatoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contato::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->name,
            'endereco' => $this->faker->address,
            'email' => $this->faker->unique()->safeEmail,
            'codigo_pais' => '55',
            'codigo_cidade' => '16',
            'telefone' => $this->faker->unique()->randomNumber(9, true),
            'foto' => $this->faker->imageUrl(360, 360, 'animals'),
        ];
    }
}
