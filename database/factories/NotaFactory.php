<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Nota>
 */
class NotaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           'titulo'=>fake()->title,
           'contenido'=>fake()->text,
           'categoria'=>fake()->randomElement([
               'Escuela',
               'Trabajo',
               'Hogar',
               'Personal',
           ]),
           'created_at'=>fake()->dateTimeBetween('2023-01-01', 'now'),
           'user_id'=>fake()->numberBetween(1,10),
           'color'=>fake()->hexColor('#212529'),
           'etiqueta'=>fake()->title,
           //
        ];
    }

}
