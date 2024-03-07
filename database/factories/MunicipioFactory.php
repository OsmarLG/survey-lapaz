<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Municipio;

class MunicipioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => 'LA PAZ',
            'status' => true,
            'estado_id' => 1,
        ];
    }

    /**
     * Define a state for the "Santa Cruz" municipality.
     *
     * @return Factory
     */
    public function losCabos()
    {
        return $this->state(function (array $attributes) {
            return [
                'nombre' => 'LOS CABOS',
                'status' => true,
                'estado_id' => 1,
            ];
        });
    }
    public function loreto()
    {
        return $this->state(function (array $attributes) {
            return [
                'nombre' => 'LORETO',
                'status' => true,
                'estado_id' => 1,
            ];
        });
    }
    public function comondu()
    {
        return $this->state(function (array $attributes) {
            return [
                'nombre' => 'COMONDU',
                'status' => true,
                'estado_id' => 1,
            ];
        });
    }
    public function mulege()
    {
        return $this->state(function (array $attributes) {
            return [
                'nombre' => 'MULEGE',
                'status' => true,
                'estado_id' => 1,
            ];
        });
    }
}