<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Alumno>
 */
class AlumnoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // generamos 8 digitos
        $dni = fake()->randomNumber(8);
        // cojo el codigo de la A
        $letra = chr(ord('A') +$dni%23);

        return [

            'nombre'=>fake()->firstName(),
            'apellido'=>fake()->lastName(),
            'direccion'=>fake()->address(),
            'dni'=> "$dni-$letra"


        ];
    }
}
